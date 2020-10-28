<?php

if ($session != session_id()) {
    header('Location: ../');
    exit();
}
phpinfo();

?>
