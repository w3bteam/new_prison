<?php include_once 'sql.php';
session_start();
if($_SESSION['seslogin'] = "")
{header("Location: 1.php");
  echo 'Вы не авторизованы!';
  exit;}
if($_GET['do'] == 'logout'){
 unset($_SESSION['admin']);
 session_destroy();
header("Location: 1.php");
}
if($_SERVER["REQUEST_METHOD"] === 'POST') {
       $login = trim(mysqli_real_escape_string($link, $_POST["login"]));
    $password = trim(mysqli_real_escape_string($link, $_POST["password"]));

    if(empty($login)) {
        exit('Поле логина пустое, вернитесь и исправьте ошибку.');
    }

    if(empty($password)) {
        exit('Поле пароля пустое, вернитесь и исправьте ошибку.');
    }
    $result = mysqli_fetch_assoc(mysqli_query($link, "SELECT `username` FROM `users` WHERE `username`='{$login}' AND `password`='{$password}' LIMIT 1"));
    $_SESSION['seslogin']=$result["login"];
if($result)
    {
        echo  'Приветствуем вас ' . $result["username"] . "\n";
    }
else
    {
        echo  'Неверный логин и/или пароль!';
    }
}
?>
