<?php

setcookie("name", "", time() - 8400);
header("Location: login.html");
session_destroy();

?>
