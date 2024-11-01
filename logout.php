<?php
session_start();
session_destroy();
setcookie("user_ip", "", time() - 3600); 
header("Location: login.php");
exit;
?>
