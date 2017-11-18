<?php


require 'PHP/session.php';

if(isset($_SESSION['logged_user'])) {
    ?>
    <!DOCTPYPE html>
    <html>
    <head>
        <meta charset="utf-9">
        <title>
            De Chat
        </title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css"
              integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb"
              crossorigin="anonymous">
    </head>
    <body>
    <div class="container-fluid" id="headlinetop">
        <div class="row">
            <div class="col-md-12"></div>
        </div>
    </div>
    <div class="container-fluid" id="header">
        <div class="row">
            <div class="col-md-12 "><h1>De Chats</h1></div>
        </div>
    </div>
    <div class="container-fluid" id="headlinetop">
        <div class="row">
            <div class="col-md-12"></div>
        </div>
    </div>

    <br/>
        <form method="get">
        <div class="row">
            <div class="col-md-3"><input class="but mychats" type="submit" name="mychats" value="My chats"></div>
            <div class="col-md-3"><input  onclick="change_location('http://dechat/php/users/users.php')"class="but users" type="button" name="users" value="Users"></div>
            <div class="col-md-3"><input  onclick="change_location('http://dechat/php/user/user.php')" class="but me" type="button" name="me" value="Me">></div>
            <div class="col-md-3"><input  class="but quit" type="submit" name="quit" value="Quit"></div>

        </div>
        </form>
    </div>


    <style>

        #header {

            color: #00ff09;
            padding: 10px;
            background-color: #585858;
            height: 10%;

        }

        body {
            background-color: #1b163a;
        }

        #headlinetop {
            background-color: #28254b;
            height: 3%;
        }
        .but{

            font-size: 110%;
            width: 100%;

        }


    </style>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"
            integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh"
            crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"
            integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ"
            crossorigin="anonymous"></script>

    <script language="JavaScript">



        function change_location (link) {

            window.location.replace(link);

        }

    </script>

    </body>
    </html>
    <?php
}
else{

    header('location:/php/log_in/log_in.php');

}

if(isset($_GET['quit'])) {
    session_destroy();
    echo '<script>window.location.replace("http://dechat/");</script>';
    echo 123;
}
?>