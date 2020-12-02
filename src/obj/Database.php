<?php

require_once "Players.php";
require_once "Admin.php";

class Database
{
   private $host = "localhost:4000";
   private $dbName = "testdb";
   private $name = "root";
   private $pwd = "1234";

   public $connection;

   public function GetConnection()
   {
      $this->connection = null;

      try {
         $this->connection = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->dbName,
                                    $this->name, $this->pwd);
         $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         $this->connection->exec("SET NAMES utf8");
      } catch(PDOException $exception) {
         echo "Connection error: " . $exception->getMessage();
      }
   }

   public function Add($player)
   {
      $player->password = password_hash($player->password, PASSWORD_BCRYPT);
      try {
         $dbQuery = $this->connection->prepare("INSERT INTO `users` (`username`, `email`,
            `mobilenumber`, `password`, `token`, `is_active`, `date_time`, `result`)
            VALUES (:username, :email, :mobilenumber, :password, :token,
            :is_active, NOW(), :result)");
         $dbQuery->execute(array(':username' => $player->username, ':email' => $player->email,
            ':mobilenumber' => $player->mobile, ':password' => $player->password,
            ':token' => $player->token, ':is_active' => $player->isActive,
            ':result' => $player->result));
      } catch (PDOException $exception) {
         echo "Error: " . $exception->getMessage();
      }
   }

   public function Delete($user)
   {
      try {
         $dbQuery = $this->connection->prepare('DELETE FROM users WHERE username=:username LIMIT 1');
         $dbQuery->execute(array(':username' => $user));
      } catch (PDOException $exception) {
         echo "Error: " . $exception->getMessage();
      }
   }

   public function PlayersTable()
   {
      try {
         $dbQuery = $this->connection->prepare('SELECT username, result
            FROM users ORDER BY result DESC');
         $dbQuery->execute();
         $arr = [];
         $inc = 0;
         while ($row = $dbQuery->fetch(PDO::FETCH_ASSOC)) {
            $jsonArrayObject = (array('username' => $row["username"], 'result' => $row["result"]));
            $arr[$inc] = $jsonArrayObject;
            $inc++;
         }

         return $arr;
      } catch (PDOException $exception) {
         echo "Error: " . $exception->getMessage();
      }
   }

   public function Verificate($user, $table = "users")
   {
      $rowCount = null;

      try {
         if ($table == "users") {
            $dbQuery = $this->connection->prepare('SELECT * FROM users WHERE username = :username');
         } else {
            $dbQuery = $this->connection->prepare('SELECT * FROM admins WHERE username = :username');
         }
         $dbQuery->execute(array(':username' => $user));
         $rowCount = $dbQuery->rowCount();

         //echo "\n$rowCount";

      } catch(PDOException $exception)  {
         echo "Connection error: " . $exception->getMessage();
      }

      return $rowCount;
   }
}
?>
