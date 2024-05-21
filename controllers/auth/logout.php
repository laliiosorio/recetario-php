<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: /');
    exit;
}

session_unset();
session_destroy();
header("Location: /recetario-php/");
exit();
