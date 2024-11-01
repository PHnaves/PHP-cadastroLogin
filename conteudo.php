<?php
session_start();

if (isset($_COOKIE['user_ip']) && $_COOKIE['user_ip'] !== $_SERVER['REMOTE_ADDR']) {
    session_destroy();
    header("Location: login.html");
    exit;
}

header("Location: conteudo.phtml");
?>
