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

        <title>Continue Working | Events Manager</title>
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
                <h1>Continue Working</h1>
                <p><strong>Lets get back to work!</strong> Please select the session that you want to continue working from. Please note that only sessions from the selected event will be shown.</p>
            </div>
        </div>
        <div class="container">
            <?php
                if(($_GET['success'])) {
                    echo "<div class='alert alert-success' role='alert'><p><strong>〓D</strong> We did it! We added a session to the database! Now you can work on stuff! Yay!";
                }
                switch (($_GET['good'])) {
                    case "delSess":
                        echo "<div class='alert alert-success' role='alert'><p><strong>It worked!</strong>Awww yeah! It worked! We deleted the session.</p></div>";
                    break;
                }
                switch (($_GET['failure'])) {
                    case "delSess":
                        echo "<div class='alert alert-danger' role='alert'><p><strong>Boo!</strong>We couldn't delete the session from the database. Sorry :/</p</div>";
                        break;
                }
                
                if(($_GET['id'])) {
                    $id = ($_GET['id']);
            ?>
            <?php
                $query = "SELECT * FROM session_of_".$id;
                $result = mysql_query($query);
                $content = array();
                    
                $num = mysql_num_rows($result);
                if ($numb > 0) {
                     while($row = mysql_fetch_assoc($result)) {
                                $content[$row['ID']] = $row;
                     }
                }
                if ($num > 0) {
            ?>
            <table>
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
                        echo "<a class='btn btn-success' role='button' href='../manager/sessions/modSession?id=".$tablerow['ID']."'>Work on this session.</a>";
                        echo "<button type='button' class='btn btn-danger' data-toggle='modal' data-target='#mdlid".$tablerow['ID']."'>Delete</button><div class='modal fade' id='mdlid".$tablerow['ID']."' tabindex='-1' role='dialog' aria-labelledby='Delete Modal' aria-hidden='true'><div class='modal-dialog'><div class='modal-content'><div class='modal-header'><button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button><h4 class='modal-title' id='modalLabel'>Are you sure?</h4></div><div class='modal-body'><p><strong>Are you sure?</strong> By deleting this session you will be removing the ability to...</p><ul><li>Print Lists</li><li>Print Options</li><li>Keep options</li><li>Keep records</li></ul><p>That's a lot to give up. And remember: <strong>you cannot undo this action</strong></div><div class='modal-footer'><button type='button' class='btn btn-success' data-dismiss='modal'>That sounds bad! Get me out of here!</button><a class='btn btn-danger' role='button' href='../manager/sessions/delete?id=".$tablerow['ID']."&origID=".$id."'>I'm really sure about this.</a></div></div></div></div>";
                    ?>
                    </div>
                    </td>
                </tr>
            </tbody>
            </table>
            <? }  else { ?>
                    <div class="alert alert-info" role="alert">
                        <p><strong>ಠ_ಠ really?</strong> You're going to click the "continue working" button and not have any work to do? For real? You've gotta creat some sessions before you can try and use those sessions.</p>
                        <?php
                } } else {
                    ?>
                    <div class="alert alert-danger" role="alert">
                        <p><storng>What?</storng> You shouldn't be here, or a link was very malformed! If you're seeing this message it means I couldn't get some very important data from the URL of your page. If you're sure you didn't try to get here all on your own, report this error - including how you got here - right away.</p>
                    </div>
        </div>
         <?php
                }} else {
                echo "<meta http-equiv='refresh' content='/' />";
                echo "<script> window.location.replace('/')</script>";
                // Whoops! Not logged in.
            }
    ?>
    </body>
</html>