$(document).ready(function()
{
   $( '#data' ).submit(function(event) {
      event.preventDefault();
      $.ajax({
         type: 'POST',
         url: '../register.php',
         data: $(this).serialize(),
         success: function(data) {
            console.log('data', data);
         },
         error: function(data) {
            console.log('error', data);
         }
      });
   });

/*   var redirect = $.ajax({
      type: 'POST',
      url: '../register.php',
      location: 'index.html',
      success: function(location) {
         if (location == 'index.html') {
            window.replace('index.html');
         }
      }
   });*/
});
