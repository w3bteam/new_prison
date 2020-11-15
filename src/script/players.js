var jsonArrForTable;

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

function ParseJSON(data)
{
   var json = JSON.stringify(data);
   json = json.slice(1);
   json = json.slice(0, json.length - 1);
   var first, last;
   var jsonArr = new Array();
   var j = 0;
   for (var i = 1; i < json.length; i++) {
      if (json[i] == '{') {
         first = i;
      }
      if (json[i] == '}') {
         last = i;
         jsonArr[j] = json.substring(first, last + 1);
         j++;
      }
   }
   console.log(jsonArr[0]);

   return jsonArr;
}
