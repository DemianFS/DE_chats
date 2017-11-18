<?php

require_once 'D:\Dema\OSPanel\domains\dechat\PHP\session.php';

if(isset($_POST['register'])){

    $users = PDO_SELECT('SELECT * FROM users');

    $errors = array();

    if(trim($_POST['login'])== ""){
        $errors[] = 'Login is empty';
    }

    foreach ($users as $user){

        if($user['login'] == trim($_POST['login'])){
            $errors[] = 'This login is busy';
        }

    }

    if(trim($_POST['user_name'])== ""){
        $errors[] = 'Name is empty';
    }
    if($_POST['password']== ""){
        $errors[] = 'Password is empty';
    }
    if($_POST['password_chek'] !=  $_POST['password']){
        $errors[] = 'Confirm password';
    }

    if(empty($errors)){
        $login = '"'. $_POST['login'] . '"';
        $name = '"'. $_POST['user_name'] . '"';
        $password = '"'. password_hash($_POST['password'], PASSWORD_DEFAULT) . '"';

PDO_WRITE( 'INSERT INTO users (id, login, name, password) VALUES (NULL, '. $login .', '. $name .', '. $password .')');

       header('location:/php/log_in/log_in.php');

    }

}

?>
<!DOCTPYPE html>
<html>
 <head>
     <meta charset="utf-9">
     <title>
         Authorization
     </title>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
 </head>
 <body>
 <div class="container-fluid" id="headlinetop" ><div class="row"><div class="col-md-12"></div></div></div>
 <div class="container-fluid" id="header"><div class="row" ><div class="col-md-12 "><h1>Registration</h1></div></div></div>
 <div class="container-fluid" id="headlinetop" ><div class="row"><div class="col-md-12"></div></div></div>

 <br/>


  <div class="container" id="formdiv">
      <br/>
      <br/>
      <form method="POST" id="form">
       <div class="row">

           <?php

           if(empty($errors)){}else{

              echo ' <div class="col-md-4"></div>';
              echo '<div class="col-md-4"  style="color: #b40e2b" >'. $errors[0] .'</div>';
              echo '<div class="col-md-4"></div>';

           }

           ?>

           <div class="col-md-4"></div>
           <div class="col-md-4"  style="color: white" >Login</div>
           <div class="col-md-4"></div>

           <br/>

           <div class="col-md-4"></div>
           <div class="col-md-4"  ><input name="login" type="text"  ></div>
           <div class="col-md-4"></div>

           <br/>


           <div class="col-md-4"></div>
           <div class="col-md-4"  style="color: white" >Your Name</div>
           <div class="col-md-4"></div>

           <br/>

           <div class="col-md-4"></div>
           <div class="col-md-4"><input name="user_name" type="text"  ></div>
           <div class="col-md-4"></div>

           <br/>

           <div class="col-md-4"></div>
           <div class="col-md-4"  style="color: white" >Password</div>
           <div class="col-md-4"></div>

           <br/>

           <div class="col-md-4"></div>
           <div class="col-md-4"><input name="password" type="password"  ></div>
           <div class="col-md-4"></div>

           <br/>

           <div class="col-md-4"></div>
           <div class="col-md-4"  style="color: white" >Confirm password</div>
           <div class="col-md-4"></div>

           <br/>

           <div class="col-md-4"></div>
           <div class="col-md-4"><input name="password_chek" type="password"  ></div>
           <div class="col-md-4"></div>

           <br/>
           <br/>

           <div class="col-md-4"></div>
           <div class="col-md-4"  ><input id="register" name="register" type="submit" value="Sing up" ></div>
           <div class="col-md-4"></div>

       </div>
      </form>
  </div>
 <div>

 </div>
 <style>

     #header{

         color: #00ff09;
         padding:10px;
         background-color: #585858;
         height: 10%;


     }
     body{
         background-color: #1b163a;
     }
     #headlinetop{
         background-color: #28254b;
         height: 3%;

     }

     #form{
         font-size: 150%;
         text-align: center;


     }
     #formdiv{
         width: 60%;
         height: 100%;
         background-color: #0e1453;
         border:2px solid #ffffff;
         border-radius: 4px;


     }

     #register{
         width: inherit;
         background-color: white;
         border:1px  solid #191d78;
         border-radius: 5px;
         margin-left:3px;


     }
     #register:hover{
         color: #c7c7c7;
         background-color: #848484;
         border:1px  solid #2125a4;
     }
 </style>


 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

 </body>
</html>
