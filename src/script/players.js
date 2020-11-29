import { ParseJSON, CheckCookie } from './func.js';

var jsonArrForTable;

CheckCookie();

$(document).ready(function()
{
   $.get("../players_table.php", function(data) {
      console.log(data);
      jsonArrForTable = ParseJSON(data);
      CreateRows(jsonArrForTable);
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
