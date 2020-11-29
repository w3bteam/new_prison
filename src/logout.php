<?php

setcookie("name", "", time() - 8400);
header("Location: index.html");
session_destroy();

?>
