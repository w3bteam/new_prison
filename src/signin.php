<?php

ob_start();

if (!isset($_SESSION)) {
   session_start();
}

require_once 'obj/Players.php';
require_once 'obj/Database.php';
require_once 'obj/Authenticate.php';
require_once 'obj/Error.php';

$error = new ErrorHandle();

if (isset($_POST["name_signin"])) {
   $userSignIn = $_POST["name_signin"];
   $passSignIn = $_POST["password_signin"];



   if (!empty($userSignIn) && !empty($passSignIn)) {
      $auth = new Authentication($userSignIn, $passSignIn);
      $pwd = $auth->Auth();

      echo $pwd;

      if ($pwd) {
         header("Location: homepage.html");
      } else {
         //Здесь надо будет переделать хэндл ошибки
         echo "Password is incorrect";
      }
   } else {
      if (empty($userSignIn)) {
         echo "Username is empty";
      }

      if (empty($passSignIn)) {
         echo "Password is empty";
      }
   }
}

session_destroy();

?>