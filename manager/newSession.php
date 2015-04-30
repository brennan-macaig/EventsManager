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

        <title>New Session | Events Manager</title>
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
                if ($_GET['failure']) {
                    echo "<div class='alert alert-danger alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                        <p><strong>Time to try again.</strong> It looks like you might have left a few fields that you needed to fill in blank, or maybe I couldn't connect you to the database. At any rate, want to try this again?</p></div>";
                }
                
                $id = ($_GET['id']);
            ?>
            <div class="container">
                <h1>Create a new Session</h1>
                <p>You've got your students, you've got your teachers, and you have an event all ready to go. Now lets create a new session for it! This "wizard" will show you how to do everything from here on out.</p>
            </div>
        </div>
        <div class="container">
            
            <h1>Step 1: Basic Details</h1>
            <p>
                Please fill in this information correclty and accurately. You CANNOT change this information without starting over.
            </p>
            <?php
            if (isset($_POST['register']) && isset($_POST['nick']) && isset($_POST['start']) && isset($_POST['check1']) && isset($_POST['check2']) && isset($_POST['note'])) {
        		$nick = mysql_real_escape_string($_POST['nick']);
        		$start = mysql_real_escape_string($_POST['start']);
                $check1 = mysql_real_escape_string($_POST['check1']);
                $check2 = mysql_real_escape_string($_POST['check2']);
                $note = mysql_real_escape_string($_POST['note']);
                
                $evaluate = mysql_query("SELECT 1 FROM `session_of_".$id."`");
                
                if(!($evaluate !== FALSE)) {
                    $createTable = mysql_query("CREATE TABLE `session_of_".$id."` (
                        `ID` INT(25) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                        `Nick` VARCHAR(100) NOT NULL,
                        `Start` DATE NOT NULL,
                        `Deadlines` TINYINT(2) NOT NULL,
                        `Sendin` TINYINT(2) NOT NULL,
                        `Note` VARCHAR(180) NOT NULL
                        )");
                }
                
                $registerQuery = mysql_query("INSERT INTO `session_of_".$id."` (Nick, Start, Deadlines, Sendin, Note) VALUES ('".$nick."', '".$start."', '".$check1."', '".$check2."', '".$note."')");
                
                if ($registerQuery) {
                    echo "<script> window.location.replace('/manager/continueWorking?id=".$id."&success')</script>";
                } else {
                    echo "<script> window.location.replace('/manager/newSession?id=".$id."&failure')</script>";
                }
    		} else {
                ?>
            <?php echo "<form class='form-horizontal' method='post' action='/manager/newSession?id=".$id."' name='registerform' id='registerform'>"; ?>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Event Nickname</label>
                    <div class="col-sm-10">
                        <input type="text" placeholder="e.g. 'Fall 2014'" id="nick" name="nick">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Start Date</label>
                    <div class="col-sm-10">
                        <input type="date" placeholder="mm/dd/yyyy" id="start" name="start">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Check where Applicable</label>
                    <div class="col-sm-10">
                        <input type="checkbox" value="1" id="check1" name="check1">Use deadlines
                        <input type="checkbox" value="1" id="check2" name="check2">Allow send-ins
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Write yourself a note</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" rows="3" placeholder="No more than 180 characters please." onkeyup="textCounter(this,'counter',180);" name="note" id="note"></textarea>
                    </div>
                    <label class="col-sm-2 control-label">Characters Remaining: </label>
                    <div class="col-sm-10">
                    <input disabled maxlength="3" size="3" value="180" id="counter">
                    </div>
                    <script>
                        function textCounter(field,field2,maxlimit) {
                            var countfield = document.getElementById(field2);
                            if ( field.value.length > maxlimit ) {
                                field.value = field.value.substring( 0, maxlimit );
                                return false;
                            } else {
                                countfield.value = maxlimit - field.value.length;
                            }
                        }
                    </script>
                </div>
                <div class="form-group">
            		    <input type="submit" name="register" id="register" class="btn btn-default" value="All done" />
        		</div>
            </form>
            <?php } ?>
        </div>
        <hr>
            <footer>
                <p>&copy; Copyright Brennan Macaig and Sant Bani School 2015. See <a href="/license.php">the license</a> for more info.</p>    
            </footer>
        <?php
        } else {
                echo "<meta http-equiv='refresh' content='/' />";
                echo "<script> window.location.replace('/')</script>";
                // Whoops! Not logged in.
            }?>
    </body>
</html>