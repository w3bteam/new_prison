<?php

class ErrorHandle
{
   public function UsernameExist()
   {
      return '<div class="alert alert-danger" role="alert">
                     User with email already exist!
             </div>';
   }

   public function EmptyField()
   {
      return '<div class="alert alert-danger" role="alert">
                     This field is empty!
             </div>';
   }
}

?>
