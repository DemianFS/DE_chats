<?php

require 'D:\Dema\OSPanel\domains\dechat\PHP\session.php';



if(isset($_SESSION['logged_user'])) {


    function create_chat($id)
    {

        $chats = PDO_SELECT('SELECT * FROM Chats WHERE user_first=' . $_SESSION['logged_user']['ID'] . '.');

        $gotten_chat = false;

        foreach ($chats as $chat) {

            if ($chat['user_second'] == $id) {

                $gotten_chat = true;


            }

        }

        if ($gotten_chat != true) {
            echo '<form method="post"><input type="submit" value="Create chat" name="' . $id . '" ></form>';

            if (isset($_POST[$id])) {


                $sql_log_user = '"' . $_SESSION['logged_user']['ID'] . '"';
                $sql_id_user = '"' . $id . '"';

                PDO_WRITE('INSERT INTO `Chats` (`user_first`, `user_second`) VALUES ('.$sql_log_user.','.$sql_id_user.')');
                $chats = PDO_SELECT('SELECT * FROM Chats WHERE user_first='. $_SESSION['logged_user']['ID'] .' AND  user_second=' . $id );
                foreach ($chats as $chat){
                    $chat_id =   $chat['chat_id']  ;

                }
                PDO_WRITE('INSERT INTO Chats (user_first, user_second,d_id) VALUES (' . $sql_id_user . ', '. $sql_log_user .','. $chat_id.')');
                PDO_WRITE('UPDATE Chats SET d_id='.$chat_id.' WHERE  user_first = '.$_SESSION['logged_user']['ID'].' AND user_second = '.$id);


            echo '<script>  window.location.href = "http://dechat/PHP/users/users.php" </script>';

            }
        }


    }


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
    <br/><br/><br/>

    <div class="col-md-4"></div>
    <div class="col-md-4"><input onclick="back()" id="back" name="back" type="button" value="Back"></div>
    <div class="col-md-4"></div>

    <?php
    $users = PDO_SELECT('SELECT * FROM users');




    foreach ($users as $user) {



        if($user['ID'] == $_SESSION['logged_user']['ID'] ){}
        else {
            echo '<div style="color:#201b57;background-color: #c7c7c7" ><hr>';
            echo $user['login'] . "<br/><br/>";
            echo $user['name'];
            create_chat($user['ID']);
            echo '<hr></div>';
        }
    }

    ?>


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

        #back {
            margin-left: 275%;
            width: 30%;
            background-color: white;
            border: 1px solid #191d78;
            border-radius: 5px;

        }

        #back:hover {
            color: #c7c7c7;
            background-color: #848484;
            border: 1px solid #2125a4;
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


        function change_location(link) {

            window.location.replace(link);

        }

        function back() {
            window.location.href = "http://dechat/"
        }






    </script>
    </body>
    </html>
    <?php
}
else {

    header('location:/php/log_in/log_in.php');

}
    ?>