import { CheckCookie } from './func.js';

$(document).ready(function()
{
   $( '#data' ).submit(function(event) {
      event.preventDefault();
      $.ajax({
         type: 'POST',
         url: '../signin.php',
         data: $( '#data' ).serialize(),
         success: function(data) {
            console.log(data);
            CheckCookie(data);
         },
         error: function(data) {
            console.log(data);
         }
      });
   });
});
