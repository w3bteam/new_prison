<?php include_once 'sql.php';
session_start();
if($_SESSION['seslogin'] = "")
{header("Location: 1.php");
  echo '�� �� ������������!';
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
        exit('���� ������ ������, ��������� � ��������� ������.');
    }

    if(empty($password)) {
        exit('���� ������ ������, ��������� � ��������� ������.');
    }
    $result = mysqli_fetch_assoc(mysqli_query($link, "SELECT `username` FROM `users` WHERE `username`='{$login}' AND `password`='{$password}' LIMIT 1"));
    $_SESSION['seslogin']=$result["login"];
if($result)
    {
        echo  '������������ ��� ' . $result["username"] . "\n";
    }
else
    {
        echo  '�������� ����� �/��� ������!';
    }
}
?>
