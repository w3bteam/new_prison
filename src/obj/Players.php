<?php

require_once "Database.php";

class Player extends Database
{

   public $token;
   public $id;
   public $username;
   public $email;
   public $mobile;
   public $password;
   public $isActive;
   public $date;
   public $result;

   public function __construct($username, $result = 0, $email = "", $mobile = "", $password = "")
   {
      $this->username = $username;
      $this->email = $email;
      $this->mobile = $mobile;
      $this->isActive = 0;
      $this->token = md5(rand().time());
      $this->password = $password;
      $this->result = $result;
      $this->id = 0;
   }
}

?>
