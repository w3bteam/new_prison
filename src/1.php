<?php
//session_start();
?>
<!DOCTYPE HTML>
<html>
 <head>
  <meta charset="utf-8">
  <title>Тег INPUT</title>
 </head>
 <body>
<h1>Самый лучший сайт</h1>
	<p><img src="we.jpg" width="30%" /></p>
    <h2>Давай, логинься</h2>
<form action="index.php?page=2" method="post">
 Логин: <input type="text" size =30 name="login" />
 Пароль: <input type="password" size=30 name="password" />
 <input type="submit" value="Войти" name="log_in" />
</form>
</body>
</html>