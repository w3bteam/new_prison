<?php
session_start();if($_SESSION['seslogin'] = ""){header("Location: 1.php");echo 'Вы не авторизованы!';exit;}
if($_GET['do'] == 'logout'){
 unset($_SESSION['admin']);
 session_destroy();
header("Location: 1.php");
}?>
<!DOCTYPE HTML>
<html>
 <head>
  <meta charset="utf-8">
  <title>Тег INPUT</title>
 </head>
 <body>
<header>
<nav>
        <a href="index.php?page=1">Главная страница сайта</a> |
        <!-- <a href="index.php?page=2">Логин</a>	-->
	<a href="index.php?do=logout">Logout</a>
</nav>
</header>

<?php
$page = (isset($_GET['page']) ? $_GET['page'] : 'main');
if(basename($page).'.php' !== 0 ){
include basename($page).'.php';}
?>

<footer>
    Сайт сделан недавно и все права принадлежат его создателю :)
</footer>
 </body>
</html>
