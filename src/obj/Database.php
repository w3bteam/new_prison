<?php

ob_start();

if (!isset($_SESSION)) {
   session_start();
}

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
         $this->connection->exec("set name utf8");
      } catch(PDOException $exception) {
         echo "Connection error: " . $exception->getMessage();
      }

      return $this->connection;
   }
}
?>
