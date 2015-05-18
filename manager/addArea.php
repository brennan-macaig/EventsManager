<?php
    /*
     _____                 _         __  __                                   
     | ____|_   _____ _ __ | |_ ___  |  \/  | __ _ _ __   __ _  __ _  ___ _ __ 
     |  _| \ \ / / _ \ '_ \| __/ __| | |\/| |/ _` | '_ \ / _` |/ _` |/ _ \ '__|
     | |___ \ V /  __/ | | | |_\__ \ | |  | | (_| | | | | (_| | (_| |  __/ |   
     |_____| \_/ \___|_| |_|\__|___/ |_|  |_|\__,_|_| |_|\__,_|\__, |\___|_|   
                                                          |___/           
    addTeacher.php written by Brennan Macaig                                                      
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

        <title>Add Area | Events Manager</title>
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
                <h1>Add Area</h1>
                <p><strong>Add an Area.</strong> This is where you can add an area for all events to use! You can add a room, the playing field, playground, busses, anything!</p>
            </div>
        </div>
           <?php
    		if (isset($_POST['rName']) && isset($_POST['capacity']) && isset($_POST['note'])) {
        		$rName = mysql_real_escape_string($_POST['rName']);
        		$capacity = mysql_real_escape_string($_POST['capacity']);
                $note = mysql_real_escape_string($_POST['note']);

        		$registerQuery = mysql_query("INSERT INTO rooms (Name, Capacity, Description) VALUES ('".$rName."', '".$capacity."', '".$note."')");

        		if ($registerQuery) {
        		    echo "<script> window.location.replace('../manager/index?success=addArea')</script>";
        		} else {
        		    echo "<script> window.location.replace('../manager/index?failure=addArea')</script>";
        		}
    		} else {

?>
    	<!-- CONTENT CONTAINER -->
    	<div class="container">
    		<form method="post" action="/manager/addArea.php" name="registerform" id="registerform" class="form-horizontal">
        		<div class="form-group">
                    <label for="roomName" class="col-sm-2">Area Name:</label>
                    <div class="col-sm-10">
                        <input type="text" name="rName" id="rName">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2">Capacity: </label>
                    <div class="col-sm-10">
                        <select class="form-control" name="capacity">
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
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                            <option value="17">17</option>
                            <option value="18">18</option>
                            <option value="19">19</option>
                            <option value="20">20</option>
                            <option value="0">20+</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Brief Description</label>
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
            		    <input type="submit" name="register" id="register" class="btn btn-default" value="Submit" />
        		</div>
    		</form>
    	</div>
	<?php } ?>
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
