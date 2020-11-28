<?php

setcookie("user", "", time() - 3600);
header("Location: index.html");
session_destroy();

?>
