<?php

class Player
{
   private $database;
   public $token;

   public $id;
   public $username;
   public $email;
   public $mobile;
   public $password;
   public $isActive;
   public $date;
   public $result;

   public function __construct($db, $username, $email, $mobile, $password)
   {
      $this->database = $db;
      $this->username = $username;
      $this->email = $email;
      $this->mobile = $mobile;
      $this->isActive = 0;
      $this->token = md5(rand().time());
      $this->password = password_hash($password, PASSWORD_BCRYPT);
      $this->result = 0;
      $this->id = 0;
   }

   public function Add()
   {
      try {
         $dbQuery = $this->database->prepare("INSERT INTO `users` (`username`, `email`,
            `mobilenumber`, `password`, `token`, `is_active`, `date_time`, `result`)
            VALUES (:username, :email, :mobilenumber, :password, :token,
            :is_active, NOW(), :result)");
         $dbQuery->execute(array(':username' => $this->username, ':email' => $this->email,
            ':mobilenumber' => $this->mobile, ':password' => $this->password,
            ':token' => $this->token, ':is_active' => $this->isActive,
            ':result' => $this->result));
      } catch (PDOException $exception) {
         echo "Error: " . $exception->getMessage();
      }
   }

   public function Delete()
   {
      try {
         $dbQuery = $this->database->prepare('DELETE FROM users WHERE id=:id LIMIT 1');
         $dbQuery->execute(array(':id' => $this->id));
      } catch (PDOException $exception) {
         echo "Error: " . $exception->getMessage();
      }
   }

   public function Verificate()
   {
      //верификация по почте(под вопросом)
   }

   public function Validate()
   {
      //проверка что он в сети
   }

   public function DataChanges()
   {
      //изменения пользовательских данных
   }
}

class Admin extends Player
{
   public function DeleteUsers()
   {
      //удаление всех игроков
   }

   public function DataChangesForOtherUsers()
   {
      //возможность изменений результатов всех игроков
   }

}

?>
