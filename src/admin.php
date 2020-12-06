<?php

ob_start();

require_once 'obj/Authenticate.php';
require_once 'obj/Admin.php';

if (isset($_POST["admin_signin"])) {
   $adminSignIn = $_POST["admin_signin"];
   $passSignIn = $_POST["password_signin"];


   if (!empty($adminSignIn) && !empty($passSignIn)) {
      $auth = new Authentication($adminSignIn, $passSignIn, "admins");
      $pwd = $auth->Auth();

      //echo $pwd;

      if ($pwd) {
         if (!isset($_SESSION)) {
            session_start();
         }
         setcookie("admin", $adminSignIn, time() + (86400 * 30));
         echo "Good";
      } else {
         //Здесь надо будет переделать хэндл ошибки
         echo "Password or username is incorrect";
      }
   } else {
      if (empty($adminSignIn)) {
         echo "Username is empty";
      }

      if (empty($passSignIn)) {
         echo "Password is empty";
      }
   }
}

if (isset($_GET["method"])) {

   $method = $_GET["method"];

   $admin = new Admin();
   $admin->GetConnection();

   switch($method) {
      case "change":
         if (!isset($_GET["username"]) || !isset($_GET["result"])) {
            break;
         }
         $username = $_GET["username"];
         $result = $_GET["result"];
         $admin->UpdateScoreAdmin($username, $result);
         break;

      case "remove":
         $username = $_GET["username"];
         $admin->Delete($username);
         break;

      case "remove_all":
         $admin->DeleteAll();
         break;
   }
}

//session_destroy();

?>
