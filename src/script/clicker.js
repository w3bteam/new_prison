var clicksCount = 1;
var incrementToWrite = 5;

$(document).ready(function()
{
   if (!document.cookie.includes("name=")) {
      document.getElementById("overlay").style.display = "block";
   }

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

$(document).on('click', 'body', function(event) {
   if (!$(event.target).closest('#menutop').length) {
      var cookieValue = document.cookie.replace(/(?:(?:^|.*;\s*)name\s*\=\s*([^;]*).*$)|^.*$/, "$1");
      // window.alert(cookieValue);

      clicksCount++;
      if (clicksCount == incrementToWrite) {
         clicksCount = 1;

         $.ajax({
            type: "GET",
            url: '../score.php',
            data: {usr: cookieValue, incr: incrementToWrite},
            success: function(data) {
               window.alert("Ajax script success!!!");
               console.log('data', data);
               if (data === "../login.html" || data === "../error.html") {
                  CheckCookie(data);
               }
            },
            error: function(data) {
               window.alert("Ajax script failed!!!");
               console.log('error', data);
            }
         });
      }
   }
});
