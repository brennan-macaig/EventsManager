<?php
    /*
     _____                 _         __  __                                   
     | ____|_   _____ _ __ | |_ ___  |  \/  | __ _ _ __   __ _  __ _  ___ _ __ 
     |  _| \ \ / / _ \ '_ \| __/ __| | |\/| |/ _` | '_ \ / _` |/ _` |/ _ \ '__|
     | |___ \ V /  __/ | | | |_\__ \ | |  | | (_| | | | | (_| | (_| |  __/ |   
     |_____| \_/ \___|_| |_|\__|___/ |_|  |_|\__,_|_| |_|\__,_|\__, |\___|_|   
                                                          |___/           
    listStudent.php written by Brennan Macaig                                                      
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

        <title>Teachers | Events Manager</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/loginstyle.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> 
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="/css/bootstrap.css" media="screen" />
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
                    <a class="navbar-brand" href="../manager/index">Events Manager</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="../logout">Logout</a></li>
                        <li class="active"><a href="../account">Account</a></li>
                        <li><a href="../license">License</a></li>
                    </ul>
                </div><!--/.navbar-collapse -->
            </div>
        </nav>
        <div class="jumbotron">
            <div class="container">
                <h1>Event Manager</h1>
                <p><strong>Listing teachers.</strong> See below so that I can fetch you a list of teachers that have been added to our system.</p>
            </div>
        </div>
         <div class="container">
            <hr>
                <!-- Example row of columns -->
                <div class="row">
                    <table class="table table-striped table-bordered">
                        <?php
                            $query = "SELECT * FROM students";
                            $result = mysql_query($query);
                            $content = array();            
                
                            $num = mysql_num_rows($result);
                            if ($num > 0) {
                                while($row = mysql_fetch_assoc($result)) {
                                    $content[$row['ID']] = $row;
                                }
                            }
                            if ($num > 0) {
                        ?>
                        <thead>
                            <tr>
                                <th><?php echo implode('</th><th>', array_keys(current($content)));?></th><th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($content as $tablerow): ?>
                            <tr>
                                <td><?php echo implode('</td><td>', $tablerow);
                                echo "</td><td><button type='button' class='btn btn-danger' data-toggle='modal' data-target='#mdlid".$tablerow['ID']."'>Delete</button><div class='modal fade' id='mdlid".$tablerow['ID']."' tabindex='-1' role='dialog' aria-labelledby='Delete Modal' aria-hidden='true'><div class='modal-dialog'><div class='modal-content'><div class='modal-header'><button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button><h4 class='modal-title' id='modalLabel'>Are you sure?</h4></div><div class='modal-body'><p><strong>Are you sure?</strong> By pressing \"DELETE\" below you understand that there are risks to what you're about to do. things may unexpectedly break and data may be lost. <strong>This is not able to be undone</strong>. Please proceede with caution.</p><p><strong>PLEASE NOTE:</strong> any event that contains this teacher will NOT work any more. Do NOT delete teachers unless you have a VERY GOOD reason.</p></div><div class='modal-footer'><button type='button' class='btn btn-success' data-dismiss='modal'>Return to Safety</button><a class='btn btn-danger' role='button' href='../manager/delStudent?id=".$tablerow['ID']."'>I understand the risks, continue anyways.</a></div></div></div></div></td>";?>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <? }  else { ?>
                    <div class="alert alert-info" role="alert">
                        <p><strong>Uhh... Huston?</strong> Maybe you haven't added any teachers yet! You should go do that if you want to be able to see anything here.<p> 
                    </div>
                    <div class="alert alert-danger" role="alert">
                        <p><strong>Did I make a mistake?</strong> Have you added stuff to the database already? If you have, please use <a href="../report?err=missingTeach">this link</a> to report an error to the system administrators.</p>
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
