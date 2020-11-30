<?php

ob_start();

if(!isset($_SESSION)) {
   session_start();
}

require_once 'obj/Database.php';
require_once 'obj/Players.php';
require_once 'obj/Error.php';

$error = new ErrorHandle();


if (isset($_POST["username"])) {

   $username = $_POST["username"];
   $email    = $_POST["email"];
   $mobile   = $_POST["mobilenumber"];
   $pwd      = $_POST["password"];

   $db = new Database();
   $db->GetConnection();
   //echo $username . $email . $mobile . $pwd;

   $rowCount = $db->Verificate();


   if(!empty($username) && !empty($email) &&
      !empty($mobile) && !empty($pwd) && $rowCount == 0) {

      $player = new Player($db->connection, $username, $email, $mobile, $pwd);
      $player->Add();

      echo "../index.html";

   } else {
      if($rowCount > 0) {
         $err = $error->UsernameExist();
         echo "\n1 $err";
      }

      if(empty($username)) {
         $err = $error->EmptyField();
         echo "\n2 $err";
      }

      if(empty($email)) {
         $err = $error->EmptyField();
         echo "\n3 $err";
      }

      if(empty($mobile)) {
         $err = $error->EmptyField();
         echo "\n4 $err";
      }

      if(empty($pwd)) {
         $err = $error->EmptyField();
         echo "\n5 $err";
      }
   }

   $db->connection = null;

} else {
   echo "../error.html";
}

setcookie("PHPSESSID", "", time() - 3600);
session_destroy();

?>
