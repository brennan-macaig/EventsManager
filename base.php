<?php
    /*
     _____                 _         __  __                                   
     | ____|_   _____ _ __ | |_ ___  |  \/  | __ _ _ __   __ _  __ _  ___ _ __ 
     |  _| \ \ / / _ \ '_ \| __/ __| | |\/| |/ _` | '_ \ / _` |/ _` |/ _ \ '__|
     | |___ \ V /  __/ | | | |_\__ \ | |  | | (_| | | | | (_| | (_| |  __/ |   
     |_____| \_/ \___|_| |_|\__|___/ |_|  |_|\__,_|_| |_|\__,_|\__, |\___|_|   
                                                          |___/           
    base.php written by Brennan Macaig                                                      
    Copyright (C) 2015 Brennan Macaig and Sant Bani School
    Licensed under the MIT Open Source License
    
    */
    
    // START SESSION
    session_start();
    
    /*
    ======================
    | Database Usernames |
    ======================
    MUST BE CHANGED TO BE FUNCTIONAL!
    !! WARNING !!
    */
    $dbhost = "<host>";
    $dbname = "<dbname>";
    $dbuser = "<username>";
    $dbpass = "<userpass>";
    
    /*
    =======================
    | Database Connection |
    =======================
    */
    mysql_connect($dbhost, $dbuser, $dbpass) or die("MySQL Error: " . mysql_error());
    mysql_select_db($dbname) or die("MySQL Error: " . mysql_error());
  
// <---- EOF
?>
