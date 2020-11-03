$(document).ready(function()
{
   $('#sign-in').submit(function(event) {
      event.preventDefault();
      $.ajax({
         type: 'POST',
         url: '../register.php',
         data: $(this).serialize(),
         dataType: 'json',
         success: function(data) {
            console.log(data);
         },
         error: function(data) {
            console.log(data);
         }
      });
   });
});

var promise = $.ajax({
   url:'../register.php'
}).then(function (result) {
   console.log('result', result)
})
