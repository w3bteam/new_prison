import { ParseJSON } from './func.js';

var jsonArrForTable;

//CheckCookie();

$(document).ready(function()
{
   if (!document.cookie.includes("name=")) {
      document.getElementById("overlay").style.display = "block";
      $("body").css("overflow", "hidden");
   }

   $.get("../players_table.php", function(data) {
      console.log(data);
      jsonArrForTable = ParseJSON(data);
      CreateRows(jsonArrForTable);
   });

   $('#sign_in').click(function() {
      $( '#data' ).submit(function(event) {
         event.preventDefault();
         $.ajax({
            type: 'POST',
            url: '../signin.php',
            data: $( '#data' ).serialize(),
            success: function(data) {
               console.log('data', document.cookie);
               if (data == "../") {
                  document.getElementById("overlay").style.display = "none";
                  $("body").css("overflow", "");
               }
               //GoToHomepage(data);
            },
            error: function(data) {
               console.log(data);
            }
         });
      });
   });
});

function CreateRows(jsonArr)
{
   var str = "";
   var username = "";
   var result = 0;
   var htmlTag = "";
   for (var id = 0; id < jsonArr.length; id++) {
      str = JSON.parse(jsonArr[id]);
      htmlTag = "<tr><th scope=\"row\">" + (id + 1)
      + "</th><td>" + str.username + "</td><td>"
      + str.result + "</td></tr>";
      $('#rows').append(htmlTag);
   }
}
