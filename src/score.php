<?php

require_once 'obj/Players.php';

if (!isset($_GET['usr'])) {
   echo "No user name!";
}

if(!isset($_GET['incr'])) {
   echo "No increment!";
}

//echo "HELLO!";

$username = $_GET['usr'];
$increment = $_GET['incr'];

$player = new Player($username);

$player->UpdateScore($increment);

?>
