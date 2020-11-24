<?php
session_start();
//destroy session
session_destroy();
//unset cookies
setcookie('EMAIL', '', 0, "/");

header("Location: index.php");
?>