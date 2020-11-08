<?php

class Database
{
   private $host = "localhost:4000";
   private $dbName = "testdb";
   private $username = "root";
   private $password = "1234";

   public $connection;

   public function GetConnection()
   {
      $this->connection = null;

      try {
         $this->connection = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->dbName,
                                    $this->username, $this->password);
         $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         $this->connection->exec("SET NAMES utf8");
      } catch(PDOException $exception) {
         echo "Connection error: " . $exception->getMessage();
      }
   }

   public function GetId($username)
   {
      try {
         $dbQuery = $this->connection->prepare('SELECT * FROM users WHERE username = :username');
         $dbQuery->execute(array(':username' => $username));

         while ($row = $dbQuery->fetch(PDO::FETCH_ASSOC)) {
            $id = $row['id'];
         }
      } catch (PDOException $exception) {
         echo "Connection error: " . $exception->getMessage();
      }
      return $id;
   }

}
?>
