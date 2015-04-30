<?php
    /*
     _____                 _         __  __                                   
     | ____|_   _____ _ __ | |_ ___  |  \/  | __ _ _ __   __ _  __ _  ___ _ __ 
     |  _| \ \ / / _ \ '_ \| __/ __| | |\/| |/ _` | '_ \ / _` |/ _` |/ _ \ '__|
     | |___ \ V /  __/ | | | |_\__ \ | |  | | (_| | | | | (_| | (_| |  __/ |   
     |_____| \_/ \___|_| |_|\__|___/ |_|  |_|\__,_|_| |_|\__,_|\__, |\___|_|   
                                                          |___/           
    addStudent.php written by Brennan Macaig                                                      
    Copyright (C) 2015 Brennan Macaig and Sant Bani School
    Licensed under the MIT Open Source License
    
    */
?>
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
        <nav class="navbar navbar-inverse navbar-fixed-top">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="/manager/index">Events Manager</a>
                    </div>
                    <div id="navbar" class="navbar-collapse collapse">
                        <ul class="nav navbar-nav">
                            <li><a href="logout">Logout</a></li>
                            <li class="active"><a href="../account">Account</a></li>
                        </ul>
                    </div><!--/.navbar-collapse -->
                </div>
            </nav>
            <div class="jumbotron">
                <div class="container">
                    <h1>Events Manager</h1>
                    <p><strong>License</strong> Let me keep the lawyer-speech aside for a second, and I'll try and describe the license of this software as best I can.</p>
                    <p>Sant Bani School and Brennan Macaig own this software in it's entirety. However, it is available for modification, adaptation, and complete reworking by anyone, anywhere. You can also republish, reproduce, recreate and re-use any part of this code or this code in it's entirety. I only ask that keep the copyright notices complete at the bottom of every single one of the pages.</p>
                    <p><strong>Alright, back to lawyer talk.</strong></p>
                </div>
            </div>
            <div class="container">
                <h2>The License:</h2>
                <pre>
                    The MIT License (MIT)

Copyright (c) 2015 Events Manager Developers

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
                </pre>
            </div>
    </body>
</html>