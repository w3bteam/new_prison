<?php

$connectToDb = mysqli_connect('localhost:4000', 'root', '1234', 'testdb');

if (!$connectToDb) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$username = $_POST['username'];
$password = $_POST['password'];


$query = 'SELECT username, password
FROM users
WHERE username=\'' . $username . '\' AND password=\'' . $password . '\'';
$result = mysqli_query($connectToDb, $query);

if ($username != "" && $password != "") {
  if (mysqli_num_rows($result) > 0) {
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
