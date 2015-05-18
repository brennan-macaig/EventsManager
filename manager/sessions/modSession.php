<?php
    /*
     _____                 _         __  __                                   
     | ____|_   _____ _ __ | |_ ___  |  \/  | __ _ _ __   __ _  __ _  ___ _ __ 
     |  _| \ \ / / _ \ '_ \| __/ __| | |\/| |/ _` | '_ \ / _` |/ _` |/ _ \ '__|
     | |___ \ V /  __/ | | | |_\__ \ | |  | | (_| | | | | (_| | (_| |  __/ |   
     |_____| \_/ \___|_| |_|\__|___/ |_|  |_|\__,_|_| |_|\__,_|\__, |\___|_|   
                                                          |___/           
    modSession.php written by Brennan Macaig                                                      
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

        <title>Modify Session | Events Manager</title>
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
                    <a class="navbar-brand" href="../index">Events Manager</a>
                </div>
            </div>
        </nav>
        <div class="jumbotron">
            <div class="container">
                <h1>Working On Session</h1>
                <p><strong>Oh boy!</strong> Isn't this so exciting?! We're getting to work! Use the options below to modify the session how you please.</p>
            </div>
        </div>
        <div class="container">
            <hr>
            <div class="row">
                <div class="col-md-4">
                    <h2>Email and Email Settings</h2>
                    <p>Email is fun, right? Or at least it was. With this option you can send mass email to remind teachers of what they need to send in, or you can ask them nicely to send in their information, or check who's sent in their information already!</p>
                    <p><a class="btn btn-primary" href="#" role="button">Do this &rarr;</a></p>
                </div>
                <div class="col-md-4">
                    <h2>Manually add Options</h2>
                    <p>Got a teacher that doesn't like technology, or sent you stuff on good old paper? Don't worry about it. From here you can manually add options to the database.</p>
                    <p><a class="btn btn-primary" href="#" role="button">Do this &rarr;</a></p>
                </div>
                <div class="col-md-4">
                    <h2>Print Stuff</h2>
                    <p>It's that time - you need to print the sign-up sheets, or maybe you need to print the assigned topics. You can do that from here.</p>
                    <p><a class="btn btn-success" href="#" role="button">Do this &rarr;</a></p>
                </div>
            </div>
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