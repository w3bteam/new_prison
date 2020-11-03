<?php

include 'obj/Database.php';
include 'obj/Player.php';
include 'obj/Error.php';

$db = new Database();
$error = new ErrorHandle();

if (isset($_POST["submit"])) {
   $username = $_POST["username"];
   $email    = $_POST["email"];
   $mobile   = $_POST["mobilenumber"];
   $pwd      = $_POST["password"];

   $dbQuery = $db->prepare('SELECT FROM * users WHERE username = :username');
   $dbQuery->execute(array(':username' => $username));
   $rowCount = $dbQuery->rowCount();

   if(!empty($username) && !empty($email) && !empty($mobile) && !empty($pwd) && $rowCount == 0)
   {
      $player = new Player($db);
      $player->Add($username, $email, $mobile, $pwd);
   } else {
      if($rowCount > 0) {
         echo "$error->UsernameExist";
      }

      if(empty($username)) {
         echo "1 $error->EmptyField";
      }

      if(empty($email)) {
         echo "2 $error->EmptyField";
      }

      if(empty($mobile)) {
         echo "3 $error->EmptyField";
      }

      if(empty($pwd)) {
         echo "4 $error->EmptyField";
      }
   }
}

?>
