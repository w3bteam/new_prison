<?php
/*
* Этот код не будет использоваться!!!
*/
include '../Database.php';

$database = new SQLDatabase();
$conn = $database->GetConnection();

//$database = new SQLDatabase('localhost:4000', 'root', '1234', 'testdb');

$username = $_POST['username'];
$password = $_POST['password'];


$query = 'SELECT username, password
FROM users
WHERE username=\'' . $username . '\' AND password=\'' . $password . '\'';
$result = $database->Query($query);

if ($username != "" && $password != "") {
  if ($result > 0) {
    header('Location: ../phpinfo.php');
    exit();
  } else {
    header('Location: ../');
    exit();
  }
} else {
  header('Location: ../');
  exit();
}

?>
