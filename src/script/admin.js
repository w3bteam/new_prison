//import { GoToHomepage } from './func.js';

//GoToHomepage("../");

$(document).ready(function()
{

   if (!document.cookie.includes("admin=")) {
      document.getElementById("overlay").style.display = "block";
   }

   $('#sign_in').click(function() {
      $( '#credential' ).submit(function(event) {
         event.preventDefault();
         $.ajax({
            type: 'POST',
            url: '../signin.php',
            data: $( '#credential' ).serialize(),
            success: function(data) {
               console.log('data', document.cookie);
               if (data == "Good") {
                  document.getElementById("overlay").style.display = "none";
               }
               //GoToHomepage(data);
            },
            error: function(data) {
               console.log(data);
            }
         });
      });
   });

   $('#change').click(function() {
      $( '#data' ).submit(function(event) {
         event.preventDefault();
         $.ajax({
            type: 'GET',
            url: '../admin.php',
            data: $( '#data' ).serialize() + '&method=change',
            success: function(data) {
               console.log('data', document.cookie);
               //GoToHomepage(data);
            },
            error: function(data) {
               console.log(data);
            }
         });
      });
   });

   $('#remove').click(function() {
      $( '#data' ).submit(function(event) {
         event.preventDefault();
         $.ajax({
            type: 'GET',
            url: '../admin.php',
            data: $( '#data' ).serialize() + '&method=remove',
            success: function(data) {
               console.log('data', document.cookie);
               //GoToHomepage(data);
            },
            error: function(data) {
               console.log(data);
            }
         });
      });
   });

   $('#remove_all').click(function() {
      $( '#data' ).submit(function(event) {
         event.preventDefault();
         $.ajax({
            type: 'GET',
            url: '../admin.php',
            data: 'method=remove_all',
            success: function(data) {
               console.log('data', document.cookie);
               //GoToHomepage(data);
            },
            error: function(data) {
               console.log(data);
            }
         });
      });
   });
});
