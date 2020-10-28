<?php
session_start();
$session = session_id();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Вход</title>
  <link rel="stylesheet" href="style.css">
  <script type="text/javascript" src="script/script.js"></script>
</head>
<body>
  <section id="main-index">
    <h1 style="margin-top: 25px;">Members login</h1>
    <form class="login-form" method="post" action="script/php_ajax.php">
      <div class="input">
        <div class="left-field">Username:</div>
        <div class="right-field">
          <input name="username" type="text">
        </div>
      </div>
      <div class="input">
        <div class="left-field">Password:</div>
        <div class="right-field">
          <input name="password" type="password">
        </div>
      </div>
      <div class="fpass">
        <a href="new_site.php">Forgot your password?</a>
      </div>
      <div class="fbutton">
        <button id="login_form_button" class="form_button" type="submit" onclick="EnterFunc()">Login</button>
      </div>
    </form>
  </section>
</body>
</html>
