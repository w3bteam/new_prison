<?php
session_start();if($_SESSION['seslogin'] = ""){header("Location: 1.php");echo '�� �� ������������!';exit;}
if($_GET['do'] == 'logout'){
 unset($_SESSION['admin']);
 session_destroy();
header("Location: 1.php");
}?>
<!DOCTYPE HTML>
<html>
 <head>
  <meta charset="utf-8">
  <title>��� INPUT</title>
 </head>
 <body>
<header>
<nav>
        <a href="index.php?page=1">������� �������� �����</a> |
        <!-- <a href="index.php?page=2">�����</a>	-->
	<a href="index.php?do=logout">Logout</a>
</nav>
</header>

<?php
$page = (isset($_GET['page']) ? $_GET['page'] : 'main');
if(basename($page).'.php' !== 0 ){
include basename($page).'.php';}
?>

<footer>
    ���� ������ ������� � ��� ����� ����������� ��� ��������� :)
</footer>
 </body>
</html>
