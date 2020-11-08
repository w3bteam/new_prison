<?php

require_once 'Database.php';

class Authentication
{
   private $username;
   private $verifyPass;
   private $passHash;

   public $auth = false;

   public function __construct($user, $passw)
   {
      $this->username = $user;
      $this->verifyPass = $passw;
   }

   public function Auth()
   {
      $db = new Database();
      $db->GetConnection();

      try {
         $dbQuery = $db->connection->prepare('SELECT * FROM users WHERE username = :username');
         $dbQuery->execute(array(':username' => $this->username));

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
