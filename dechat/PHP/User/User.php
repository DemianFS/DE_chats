<?php
/**
 * Created by PhpStorm.
 * User: Dema
 * Date: 11.11.2017
 * Time: 3:41
 */




require 'D:\Dema\OSPanel\domains\dechat\PHP\session.php';

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
    <div class="container-fluid" id='info'>
        <div class="row">
            <div class="col-md-12">Login : <?php echo $_SESSION['logged_user']['login']?></div>
            <div class="col-md-12">Name : <?php echo $_SESSION['logged_user']['name']?></div>
            <div class="col-md-12">ID : <?php echo $_SESSION['logged_user']['ID']?></div>


        </div>
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
        #info {
            font-size: 150%;
            color: white;

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
    <br/><br/><br/>
    <div class="col-md-4"></div>
    <div class="col-md-4"  ><input onclick="back()" id="back" name="back" type="button"  value="Back" ></div>
    <div class="col-md-4"></div>


    <style>

        #back{
           width: 30%;
            background-color: white;
            border:1px  solid #191d78;
            border-radius: 5px;
            margin-left:3px;


        }
        #back:hover{
            color: #c7c7c7;
            background-color: #848484;
            border:1px  solid #2125a4;
        }

    </style>

    <script>
        function back() {
            window.location.href = "http://dechat/"
        }

    </script>
    </body>
    </html>
    <?php
}
else{

    header('location: http://dechat/php/log_in/log_in.php');

}

?>