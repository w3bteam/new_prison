<?php

ob_start();

require_once 'obj/Authenticate.php';

if (isset($_POST["name_signin"])) {
   $userSignIn = $_POST["name_signin"];
   $passSignIn = $_POST["password_signin"];


   if (!empty($userSignIn) && !empty($passSignIn)) {
      $auth = new Authentication($userSignIn, $passSignIn);
      $pwd = $auth->Auth();

      //echo $pwd;

      if ($pwd) {
         if (!isset($_SESSION)) {
            session_start();
         }
         setcookie("name", $userSignIn, time() + (86400 * 30));
         echo "../";
      } else {
         //Здесь надо будет переделать хэндл ошибки
         echo "Password or username is incorrect";
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

//session_destroy();

?>
