<?php
    /*
     _____                 _         __  __                                   
     | ____|_   _____ _ __ | |_ ___  |  \/  | __ _ _ __   __ _  __ _  ___ _ __ 
     |  _| \ \ / / _ \ '_ \| __/ __| | |\/| |/ _` | '_ \ / _` |/ _` |/ _ \ '__|
     | |___ \ V /  __/ | | | |_\__ \ | |  | | (_| | | | | (_| | (_| |  __/ |   
     |_____| \_/ \___|_| |_|\__|___/ |_|  |_|\__,_|_| |_|\__,_|\__, |\___|_|   
                                                          |___/           
    error.php written by Brennan Macaig                                                      
    Copyright (C) 2015 Brennan Macaig and Sant Bani School
    Licensed under the MIT Open Source License
    
    */
?>

<!DOCTYPE html>
<html>
    <head>
        <link href='http://fonts.googleapis.com/css?family=Lato:700' rel='stylesheet' type='text/css'>
        <link href='/css/error.css' rel='stylesheet' type='text/css'>
        <title>Error | Events Manager</title>
    </head>
    <body>
        <div class="container1">
            <div class="container2">
                <?php
                    switch ($_GET['error']) {
                        case 400:
                ?>
                <h1>400 &#9785;</h1>
                <h2>For whatever reason, something went terribly wrong.</h2>
                <h2>Apparently, that was a bad request.</h2>
                <p>Error code: 400_BAD_REQUEST</p>
                <?php break;
                        case 401:
                            ?>
                <h1>401 &#9785;</h1>
                <h2>For whatever reason, something went terribly wrong.</h2>
                <h2>Apparently, I don't want you to see that file.</h2>
                <p>Error code: 401_UNAUTHORIZED</p>
                <?php break;
                        case 403:
                        ?>
                <h1>403 &#9785;</h1>
                <h2>For whatever reason, something went terribly wrong.</h2>
                <h2>You're forbidden from seeing that file.</h2>
                <p>Error code: 403_FORBIDDEN</p>
                <?php break;
                        case 404:
                        ?>
                <h1>404 &#9785;</h1>
                <h2>For whatever reason, something went terribly wrong.</h2>
                <h2>I couldn't find the file you wanted.</h2>
                <p>Error code: 404_NOT_FOUND</p>
                <?php break;
                        default:
                        ?>
                <h1>Whoah &#9785;</h1>
                <h2>For whatever reason, somethign went terribly wrong.</h2>
                <h2>This error should be uncommon, and I don't really know what it is.</h2>
                <p>Error code: 4XX_UNKNOWN</p>
                <?php
                        break;
                    }
                        ?>
                <a href="/index">Go back to the login page.</a>
                <p>Alternatively, use the back arrow on your browser.</p>
            </div>
        </div>
    </body>
</html>