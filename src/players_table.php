<?php

header('Content-Type: application/json');

ob_start();

require_once 'obj/Database.php';

$db = new Database();
$db->GetConnection();

$arr = $db->PlayersTable();
$jsonArray = json_encode($arr);
//$goodJsonArray = str_replace('[', '[\'', $jsonArray);
//$goodJsonArray = str_replace(']', '\']', $goodJsonArray);
echo $jsonArray;

?>
