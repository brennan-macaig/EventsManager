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
            if (isset($_POST['gradeMin']) && isset($_POST['gradeMax']) && isset($_POST['date']) && isset($_POST['chckbx1']) && isset($_POST['chckbx2']) && isset($_POST['note'])) {
        		$gradeMin = mysql_real_escape_string($_POST['gradeMin']);
        		$gradeMax = mysql_real_escape_string($_POST['gradeMax']);
                $date = mysql_real_escape_string($_POST['date']);
                $chckbx1 = mysql_real_escape_string($_POST['chckbx1']);
                $chckbx2 = mysql_real_escape_string($_POST['chckbx2']);
                $note = mysql_real_escape_string($_POST['note']);
                
                $testQuery = mysql_query("SELECT 1 FROM session_of_".$id." LIMIT 1;");
                
                if (!$testQuery) {
                    $newQuery = mysql_query("CREATE TABLE session_of_".$id." (
                        'ID' INT(25) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                        'gradeMin' INT(15) NOT NULL,
                        'gradeMax' INT(15) NOT NULL,
                        'date' DATE NOT NULL,
                        'chckbx1' TINYINT(2) NOT NULL,
                        'chckbx2' TINYINT(2) NOT NULL,
                        'note' VARCHAR(180) NOT NULL
                    )");
                }
                
        		$registerQuery = mysql_query("INSERT INTO session_of_".$id." (gradeMin, gradeMax, date, chckbx1, chckbx2, note) VALUES ('".$gradeMin."', '".$gradeMax."', '".$date."', '".$chckbx1."', '".$chckbx2."', '".$note."')");

        		if ($registerQuery) {
        		    echo "<script> window.location.replace('/manager/editSession?success=create')</script>";
        		} else {
        		    echo "<script> window.location.replace('/manager/newSession?failure=create')</script>";
        		}
    		} else {
                ?>
            <form method="post" action="../manager/newSession" name="registerform" id="registerform">
                <div class="form-control">
                    <h2>Grade Range</h2>
                    <p class="help-block">What grade level(s) do you want to be included?</p>
                    <label class="col-sm-2 control-label">Minimum</label>
                    <div class="col-sm-10">
                       <select class="form-control" for="gradeMin" name="gradeMin">
                            <option value="0">K</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                        </select>
                    </div>
                    <label class="col-sm-2 control-label">Maximum</label>
                    <div class="col-sm-10">
                        <select class="form-control" for="gradeMax" name="gradeMax">
                            <option value="0">K</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                        </select>
                    </div>
                </div>
                <div class="form-control">
                    <h2>Time &amp; Date settings</h2>
                    <p class="help-block">
                        These settings are needed for reminders, auto emailing, and timers.
                        <strong>PLEASE NOTE: Deadlines are automatically assigned 2 weeks before start date.</strong>
                    </p>
                    <label class="col-sm-2 control-label">Start Date</label>
                    <div class="col-sm-10"><input type="date" class="form-control" name="date" id="date"></div>
                </div>
                <div class="form-control">
                    <h2>Basic Settings</h2>
                    <p class="help-block">
                        Write yourself a note, allow email sending, and teacher self-submission.
                    </p>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="chckbx1" id="chckbx1" class="form-control">Allow teacher emailing
                            <input type="checkbox" name="chckbx2" id="chckbx2" class="form-control">Allow submission sending
                        </label>
                    </div>
                    <label class="col-sm-2 control-label">Leave a note (max. 180 Characters)</label>
                    <div class="col-sm-10"><input type="text" name="note" id="note" class="form-control"></div>
                </div>
                <div class="form-control">
                    <input type="submit" name="register" id="register" class="btn btn-primary" value="Submit" />
                </div>
            </form>
            <?php } ?>
        </div>
        <?php
        } else {
                echo "<meta http-equiv='refresh' content='/' />";
                echo "<script> window.location.replace('/')</script>";
                // Whoops! Not logged in.
            }?>
    </body>
</html>