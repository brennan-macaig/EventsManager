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
            <?php
            switch ($_GET['success']) {
                case "addEvent":
                    ?>
                    <div class="alert alert-success" role="alert">
                        <p><strong>Hurrah!</strong> An event was successfully added to the database.</p>
                    </div>
                    <?php
                    break;
            }
            switch ($_GET['failure']) {
                case "addEvent":
                    ?>
                    <div class="alert alert-danger" role="alert">
                        <p><strong>Oh noes!</strong> Something went terribly wrong, and we couldn't add your event to the database. Sorry about that. Error code: NO_INSERT1</p>
                    </div>
                    <?php break;
            }
        ?>
            <div class="container">
                <h1>Event Manager</h1>
                <p><strong>Welcome to events manager!</strong> This is the launch page. From here, you can create a new event, or using the ones listed below repeat "session" of that event! Please note, that if this is your first time it is highly recommended that you follow the <a href="../help/start">first timers guide</a>. Otherwise, use these buttons to perform some administrative tasks that effect ALL events, or use the buttons below to run a new session of those events.</p>
                <div class="btn-group" role="group" aria-label="Actions">
                   <a class="btn btn-primary" role="button" href="addEvent">Create New Event</a>
                    <div class="btn-group" role="group" aria-label="Print Dropdown">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            Print...
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Print Signups</a></li>
                            <li><a href="#">Print Lists</a></li>
                        </ul>
                    </div>
                    <div class="btn-group" role="group" aria-label="Add Dropdown">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdwon" aria-expanded="false">
                            Add New...
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Student</a></li>
                            <li><a href="#">Teacher</a></li>
                        </ul>
                    </div>
                    <div class="btn-group" role="group" aria-label="Remove Dropdown">
                    <button type="button" class="btn btn-danger dropdown-toggler" data-toggle="dropdown" aria-expanded="false">
                        Remove...
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Student</a></li>
                        <li><a href="#">Teacher</a></li>
                    </ul>
                </div>
                </div>
                
            </div>
        </div>
            <!-- CONTENT CONTAINER -->
            <div class="container">
            <hr>
                <!-- Example row of columns -->
                <div class="row">
                    <table class="table table-striped table-bordered">
                        <?php
                            $query = "SELECT * FROM events";
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
                                <td><?php echo implode('</td><td>', $tablerow);?></td><td><div class="btn-group" role="group" aria-label="Actions"><a class="btn btn-primary" role="button" href="#">New Session</a><a class="btn btn-success" role="button" href="#">Continue Latest</a><a class="btn btn-warning" role="button" href="#">Settings</a><?php echo "<a class='btn btn-danger' role='button' href='/manager/delete?id=".$content['id']."'>Delete</a>"; ?>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <? }  else { ?>
                    <div class="alert alert-warning" role="alert">
                        <p><strong>Whoops.</strong> Looks like you have not created any events yet. You should do that, otherwise events will not appear here! If you have created event types and they are not displaying, please refer error code <strong>ERR_NO_EVENTS1</strong> to the system admin.</p> 
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
