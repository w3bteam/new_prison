<?php

require_once 'Database.php';

class Admin extends Database
{
   public function UpdateScoreAdmin($user, $result = 0)
   {
      //возможность изменений результатов всех игроков
      if (!$this->IsActive()) {
         return;
      }

      try {
         $dbQuery = $this->connection->prepare('UPDATE users SET result=:result WHERE username=:user');
         $dbQuery->execute(array(':result' => $result, ':user' => $user));
      } catch (PDOException $exception) {
         echo "Connection error: " . $exception->getMessage();
      }
   }

   public function DeleteAll()
   {
      try {
         $dbQuery = $this->connection->prepare('DELETE FROM users');
         $dbQuery->execute();
      } catch (PDOException $exception) {
         echo "Connection error: " . $exception->getMessage();
      }
   }

   private function IsActive()
   {
      if (isset($_COOKIE["admin"])) {
         return true;
      } else {
         return false;
      }
   }
}

?>
