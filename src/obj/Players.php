<?php

class Player
{
   private $database;
   private $token;
   private $table_name = "users";

   public $id;
   public $username;
   public $email;
   public $mobile;
   public $password;
   public $isActive;
   public $date;
   public $result;

   public function __construct(PDO $db)
   {
      $this->database = $db;
   }

   public function Add($username, $email, $mobile, $password)
   {
      $this->username = $username;
      $this->email = $email;
      $this->mobile = $mobile;
      $this->password = $password;
   }

   public function Delete()
   {

   }

   public function Verificate()
   {

   }

   public function Validate()
   {

   }

   public function DataChanges()
   {

   }
}

class Admin extends Player
{

}

?>
