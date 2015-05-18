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
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <p><strong>Hurrah!</strong> An event was successfully added to the database.</p>
                    </div>
                    <?php
                    break;
                case "addTeacher":
                    ?><div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <p><strong>Yay!</strong> We were able to add that teacher to our database. Hurray!</p>
                    </div>
                    <?php
                    break;
                case "deleteEvent":
                    ?>
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <p><strong>Woo-Hoo!</strong> Event was successfully deleted from the database. You're welcome!</p>
                    </div>
                    <?php
                    break;
                case "delTeacher":
                    ?>
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <p><strong>Boo-yah!</strong> We successfully removed that teacher from the database.</p>
                    </div>
                    <?php break;
                case "addStudent":
                    ?>
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <p><strong>Woot-Woot!</strong> We've added a student to the database without a hitch.</p>
                    </div>
                    <?php break;
                case "delStudent":
                    ?>
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <p><strong>Hip-hip... Hurrah!</strong> That student was removed from the database without a problem.</p>
                    </div>
                    <?php break;
                case "delArea":
                    ?>
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <p><strong>That's the spirit!</strong> You correctly removed an area from the database.</p>
                    </div>
                    <?php break;
                case "addArea":
                    ?>
                     <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <p><strong>Yippie!</strong> We've added that area to the database properly.</p>
                    </div>
                    <?php break;
            }
            switch ($_GET['failure']) {
                case "addEvent":
                    ?>
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <p><strong>Oh noes!</strong> Something went terribly wrong, and we couldn't add your event to the database. Sorry about that. Error code: NO_INSERT1</p>
                    </div>
                    <?php break;
                case "addTeacher":
                    ?>
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <p><strong>Darn!</strong> We couldn't add the teacher to the database. I tried weally hard, but I don't think it worked.</p>
                    </div>-
                    <?php
                    break;
                case "deleteEvent":
                    ?>
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <p><strong>Fiddlesticks!</strong> I couldn't delete the event from the database. I don't really know why.</p>
                    </div>
                    <?php
                    break;
                case "delTeacher":
                    ?>
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span arai-hidden="true">&times;</span></button>
                        <p><strong>Oh snap!</strong> For whatever reason I can't remove that teacher from the database. Oh well....</p>
                    </div>
                    <?php break;
                case "delStudent":
                    ?>
                    <div class="alert alert-danger alert-dismissible" role="alert">
                         <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span arai-hidden="true">&times;</span></button>
                         <p><strong>Gosh darn!</strong> We couldn't delete that student from the system. Too bad.</p>
                    </div>
                    <?php break;
                case "addStudent":
                    ?>
                    <div class="alert alert-danger alert-dismissible" role="alert">
                         <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span arai-hidden="true">&times;</span></button>
                         <p><strong>Do you want the bad news first?</strong> Sure you do. We couldn't add a student to the database. That's kind of sad, actually.</p>
                    </div>
                    <?php
                case "addArea":
                    ?>
                    <div class="alert alert-danger alert-dismissible" role="alert">
                         <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span arai-hidden="true">&times;</span></button>
                         <p><strong>Uhh... about that...</strong> I can't add that area to our database of areas...</p>
                    </div>
                    <?php
                break;
                case "delArea":
                    ?>
                    <div class="alert alert-danger alert-dismissible" role="alert">
                         <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span arai-hidden="true">&times;</span></button>
                         <p><strong>Mmmhmm... I see....</strong> It doesn't look like you can delete that area yet... oh well...</p>
                    </div>
                    <?php
                break;
            }
        ?>
            <div class="container">
                <h1>Events Manager</h1>
                <p><strong>Welcome to events manager!</strong> This is the launch page. From here, you can create a new event, or using the ones listed below repeat "session" of that event! Please note, that if this is your first time it is highly recommended that you follow the <a href="../help/start">first timers guide</a>. Otherwise, use these buttons to perform some administrative tasks that effect ALL events, or use the buttons below to run a new session of those events.</p>
                <div class="btn-group" role="group" aria-label="Actions">
                   <a class="btn btn-primary" role="button" href="addEvent">Create New Event</a>
                        <div class="btn-group" role="group" aria-label="list dropdown">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                List...
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="../manager/listTeacher">Teachers</a></li>
                                <li><a href="../manager/listStudent">Students</a></li>
                                <li><a href="../manager/listArea">Areas</a></li>
                            </ul>
                        </div>
                    <div class="btn-group" role="group" aria-label="Add Stuff">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            Add...
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="../manager/addStudent">Student</a></li>
                            <li><a href="../manager/addTeacher">Teacher</a></li>
                            <li><a href="../manager/addArea">Areas</a></li>
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
                                <td><?php echo implode('</td><td>', $tablerow);?>
                                </td><td><div class="btn-group" role="group" aria-label="Actions"><?php
                                echo "<a class='btn btn-success' role='button' href='../manager/continueWorking?id=".$tablerow['ID']."'>New Session</a>";
                                echo "<a class='btn btn-success' role='button' href='../manager/continueWorking?id=".$tablerow['ID']."'>Continue Working</a>";
                                echo "<a class='btn btn-warning' role='button' href='../manager/modEventSettings?id=".$tablerow['ID']."'>Settings</a>";
                                echo "<button type='button' class='btn btn-danger' data-toggle='modal' data-target='#mdlid".$tablerow['ID']."'>Delete</button><div class='modal fade' id='mdlid".$tablerow['ID']."' tabindex='-1' role='dialog' aria-labelledby='Delete Modal' aria-hidden='true'><div class='modal-dialog'><div class='modal-content'><div class='modal-header'><button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button><h4 class='modal-title' id='modalLabel'>Are you sure?</h4></div><div class='modal-body'><p><strong>Are you sure?</strong> By pressing \"DELETE\" below you understand that there are risks to what you're about to do. Things may unexpectedly break and data may be lost. <strong>This is not able to be undone</strong>. Please proceede with caution.</p></div><div class='modal-footer'><button type='button' class='btn btn-success' data-dismiss='modal'>Return to Safety</button><a class='btn btn-danger' role='button' href='../manager/delete?id=".$tablerow['ID']."'>I understand the risks, continue anyways.</a></div></div></div></div>";
                                ?>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <? }  else { ?>
                    <div class="alert alert-info" role="alert">
                        <p><strong>Whoops.</strong> Looks like you have not created any events yet. You should do that, otherwise events will not appear here!</p> 
                    </div>
                    <?php } ?>
                </div>
            <hr>
            <footer>
               <div style="display:table-cell;vertical-align:bottom;">
                  <div style="margin-left:auto;margin-right:auto;">
                        <p>&copy; Copyright Brennan Macaig and Sant Bani School 2015. See <a href="/license.php">the license</a> for more info.</p>    
                   </div>
                </div>
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
