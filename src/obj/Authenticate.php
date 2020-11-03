<?php

class Authentication
{
   private $username;
   private $password;

   public $auth = false;

   public function __construct($user, $passw)
   {
      $this->username = $user;
      $this->password = $passw;
   }

   public function Auth()
   {
      header('WWW-Authenticate: Basic realm="My Realm"');
      header('HTTP/1.0 401 Unauthorized');
      
   }

   public function isAuthorized()
   {

   }
}

?>
