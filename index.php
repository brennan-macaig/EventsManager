<?php
    /*
     _____                 _         __  __                                   
     | ____|_   _____ _ __ | |_ ___  |  \/  | __ _ _ __   __ _  __ _  ___ _ __ 
     |  _| \ \ / / _ \ '_ \| __/ __| | |\/| |/ _` | '_ \ / _` |/ _` |/ _ \ '__|
     | |___ \ V /  __/ | | | |_\__ \ | |  | | (_| | | | | (_| | (_| |  __/ |   
     |_____| \_/ \___|_| |_|\__|___/ |_|  |_|\__,_|_| |_|\__,_|\__, |\___|_|   
                                                          |___/           
    index.php written by Brennan Macaig                                                      
    Copyright (C) 2015 Brennan Macaig and Sant Bani School
    Licensed under the MIT Open Source License
    
    */
    // Include the base.php file.
    include('base.php');
    
    
    
?>

<!DOCTYPE html>
<html>
    <head>
        <!-- THESE TAGS COME FIRST -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- OTHER TAGS -->

        <title>Login | Events Manager</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/loginstyle.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        
        
        <!-- Internet explorer is so bad that this is a thing we have to do. -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        
        <!-- END HEADER CODE -->
    </head>
    
    <body>
        <?php
            if(!empty($_SESSION['LoggedIn']) && !empty($_SESSION['Username'])) {
                // Are you logged in and going to the main page? If yes, we want to send you back to the managers page.
                echo "<meta http-equiv='refresh' content='manager.php' />";
            }
        ?>
        <!--
            The main code of the login form.
        -->
        <div class="container">
            <form method="post" action="index.php" name="loginform" class="form-signin">
                <fieldset>
                <h2 class="form-signin-heading">Please sign in</h2>
                <label for="username" class="sr-only">Username</label>
                <input type="username" id="username" class="form-control" placeholder="Username" name="username" required autofocus>
                <label for="password" class="sr-only">Password</label>
                <input type="password" id="password" class="form-control" placeholder="Password" name="password" required>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
                </fieldset>
            </form>
            <?php
            // Check the database to see if this person exists.
            if(!empty($_POST['username']) && !empty($_POST['password'])) {
                $username = mysql_real_escape_string($_POST['username']);
                $password = md5(mysql_real_escape_string($_POST['password']));
                
                // MySQL Query for the database.
                $checklogin = mysql_query("SELECT * FROM users WHERE Username = '".$username."' AND Password = '".$password."'");
                
                // Hurrah! You're logged in, I think. 
                if(mysql_num_rows($checklogin) == 1) {
                    $row = mysql_fetch_array($checklogin);
                    $email = $row['EmailAddress'];
                    
                    // Stored information in the session. The persons username, and their email. This is so we can adress them by email/username if needed.
                    $_SESSION['Username'] = $username;
                    $_SESSION['EmailAddress'] = $email;
                    $_SESSION['LoggedIn'] = 1;
         
                    echo "<div class='alert alert-success' role='alert'><p><strong>All good!</strong> Logging you in now... please wait.</div>";
                    echo "<script> window.location.replace('/manager/index')</script>";
                } 
                else {
                    echo "<div class='alert alert-danger' role='alert'><p><strong>Uh oh.</strong> I can't log you in. Please, try re-typing your username and password. If you continue to see this message, contact the system administrator(s).</div>";   
                }
            }
                ?>
        </div><!-- /.container -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="../../dist/js/bootstrap.min.js"></script>
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
    </body>
    <!-- END FILE -->
</html>
<!-- No. Seriously. You're done. -->