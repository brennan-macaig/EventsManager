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
    include('../base.php');
    
?>

<!DOCTYPE html>
<html>
    <head>
        <!-- THESE TAGS COME FIRST -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- OTHER TAGS -->

        <title>Home | Events Manager</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/loginstyle.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="/css/bootstrap.css" media="screen" />
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
				<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
				<!--[if lt IE 9]>
						<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
						<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
				<![endif]-->

    </head>
    <body>
       
        <?php
            if(!empty($_SESSION['LoggedIn']) && !empty($_SESSION['Username'])) {
                // Show the event code.
        ?>
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Events Manager</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="/logout.php">Logout</a></li>
                    </ul>
                </div><!--/.navbar-collapse -->
            </div>
        </nav>
        <div class="jumbotron">
            <div class="container">
                <h1>Event Manager</h1>
                <p>Welcome to Events Manager. This is the "default page" of the site, or home page. Here you can see quick status about various events, timers until the next ones, and you can start the primary actions of the program. To start, simply select one of the functions below.</p>
            </div>
        </div>
            <div class="container">
                <!-- Example row of columns -->
                <div class="row">
                    <table class="table table-striped">
                        <?php
                            $query = "SELECT * FROM events";
                            $result = mysql_query($query);
                            $content = array();            
                
                            $num = mysql_num_rows($results);
                            if ($num > 0) {
                                while($row = mysql_fetch_assoc($result)) {
                                    $content[$row['ID']] = $row;
                                }
                            }
                            if ($num > 0) {
                        ?>
                        <thead>
                            <tr>
                                <th><?php echo implode('</th><th>', array_keys(current($content)));?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($content as $tablerow): ?>
                            <tr>
                                <td><?php echo implode('</td><td>', $tablerow);?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <? }  else { ?>
                    <div class="alert alert-danger" role="alert">
                        <p><strong>I tried weally hard, but something went wrong D:</strong> Have you created any events yet? If you haven't please use the button above to do so! <strong>But I have created an event</strong> oh no ):. We're sorry, but either the server isn't responding or we've lost your data. Try refreshing, and if this error persists tell your web admin about error code <strong>MYSQL_NORESP:2</strong>. Sworry! </p> 
                    </div>
                    <?php } ?>
                </div>
            <hr>
            <footer>
                <p>&copy; Copyright Brennan Macaig and Sant Bani School 2015. See <a href="/license.php">the license</a> for more info.</p>    
            </footer>
        </div>
    <?php
            } else {
                echo "<meta http-equiv='refresh' content='/' />";
                echo "<script> window.location.replace('/')</script>";
                // Whoops! Not logged in.
            }
    ?>
    </body>
</html>