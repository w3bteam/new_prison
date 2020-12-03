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

   public function UpdateScore($increment)
   {
      Database::GetConnection();
      Player::GetResult();
      $this->result += $increment;
      try {
         $dbQuery = $this->connection->prepare('UPDATE users SET result=:result WHERE username=:username');
         $dbQuery->execute(array(':result' => $this->result, ':username' => $this->username));
      } catch (PDOException $exception) {
         echo "Connection error: " . $exception->getMessage();
      }
   }

   public function GetResult()
   {
      try {
         $dbQuery = $this->connection->prepare('SELECT * FROM users WHERE username = :username');
         $dbQuery->execute(array(':username' => $this->username));
         while ($row = $dbQuery->fetch(PDO::FETCH_ASSOC)) {
            $this->result = $row['result'];
            echo $row['result'];
         }
      } catch (PDOException $exception) {
         echo "Connection error: " . $exception->getMessage();
      }
   }
}

?>
