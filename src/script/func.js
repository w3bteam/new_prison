//различные функции

export function ParseJSON(data)
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

export function GoToHomepage(location = "")
{
   if (location != "../") {
      return;
   }

   if (document.cookie.includes("name")) {
      window.location.href = location;
   }
}

export function CheckCookie(location = "../login.html")
{
   if (document.cookie.includes("name")) {
      return;
   }

   if (document.cookie != "") {
      console.log(document.cookie);
      return;
   } else {
      window.location.href = location;
   }
}
