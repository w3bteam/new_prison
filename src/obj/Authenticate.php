<?php

require_once 'Database.php';

class Authentication
{
   private $username;
   private $verifyPass;
   private $passHash;
   private $table;

   public $auth = false;

   public function __construct($user, $passw, $table = "users")
   {
      $this->username = $user;
      $this->verifyPass = $passw;
      $this->table = $table;
   }

   public function Auth()
   {
      $db = new Database();
      $db->GetConnection();

      try {
         $dbQuery = $db->connection->prepare('SELECT * FROM :table WHERE username = :username');
         $dbQuery->execute(array(':table' => $this->table, ':username' => $this->username));

         while ($row = $dbQuery->fetch(PDO::FETCH_ASSOC)) {

            /*$id        = $row['id'];
            $username  = $row['username'];
            $email     = $row['email'];
            $mobile    = $row['mobilenumber'];
            $isActive  = $row['is_active'];
            $date      = $row['date_time;
            $token     = $row['token'];
            $result    = $row['result'];*/

            $this->passHash  = $row['password'];
         }
      } catch (PDOException $exception) {
         echo "Error: " . $exception->getMessage();
      }

      $isValid = password_verify($this->verifyPass, $this->passHash);

      $db->connection = null;

      return $isValid;
   }
}
?>
