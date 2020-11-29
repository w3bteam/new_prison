import { GoToHomepage } from './func.js';

GoToHomepage("../");

$(document).ready(function()
{
   $( '#data' ).submit(function(event) {
      event.preventDefault();
      $.ajax({
         type: 'POST',
         url: '../signin.php',
         data: $( '#data' ).serialize(),
         success: function(data) {
            console.log('data', data);
            GoToHomepage(data);
         },
         error: function(data) {
            console.log(data);
         }
      });
   });
});
