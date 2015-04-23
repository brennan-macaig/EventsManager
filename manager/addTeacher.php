<?php
    /*
     _____                 _         __  __                                   
     | ____|_   _____ _ __ | |_ ___  |  \/  | __ _ _ __   __ _  __ _  ___ _ __ 
     |  _| \ \ / / _ \ '_ \| __/ __| | |\/| |/ _` | '_ \ / _` |/ _` |/ _ \ '__|
     | |___ \ V /  __/ | | | |_\__ \ | |  | | (_| | | | | (_| | (_| |  __/ |   
     |_____| \_/ \___|_| |_|\__|___/ |_|  |_|\__,_|_| |_|\__,_|\__, |\___|_|   
                                                          |___/           
    addEvent.php written by Brennan Macaig                                                      
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
            <div class="container">
                <h1>Event Manager</h1>
                <p><strong>Create a new event.</strong> Welcome to the events creator! Please fill out the basic form below, and I'll automatically handle the rest for you! If you need help, please see our <a href="../help?page=create">documentation</a> on the subject.</p>
            </div>
        </div>
           <?php
    		if (isset($_POST['register']) && isset($_POST['name_ex']) && isset($_POST['lastname'])) {
        		$name = mysql_real_escape_string($_POST['name_ex']);
        		$lastname = mysql_real_escape_string($_POST['lastname']);

        		$registerQuery = mysql_query("INSERT INTO events (firstName, lastName) VALUES ('".$name."', '".$blocks."')");

        		if ($registerQuery) {
        		    echo "<script> window.location.replace('/manager/index?success=addEvent')</script>";
        		} else {
        		    echo "<script> window.location.replace('/manager/index?failure=addEvent')</script>";
        		}
    		} else {

?>
    	<!-- CONTENT CONTAINER -->
    	<div class="container">
    		<form method="post" action="/manager/addEvent.php" name="registerform" id="registerform">
        		<div class="form-group">
        		    <label for="name">Event Name</label>
            		    <input type="text" class="form-controll" id="name_ex"  name= "name_ex" placeholder="e.g. artblocks">
        		</div>
        	        <div class="form-group" name="blocks" id="blocks">
        	        <label for="names">Blocks</label>
        		    <select class="form-control" for="blocks" name="blocks" >
                	    <option value="1">1</option>
               		    <option value="2">2</option>
             		    <option value="3">3</option>
             		    <option value="4">4</option>
            		    <option value="5">5</option>
            		    <option value="6">6</option>
            		    <option value="7">7</option>
            		    <option value="8">8</option>
            		    </select>
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
