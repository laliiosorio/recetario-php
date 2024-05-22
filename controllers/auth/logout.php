<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: /recetario-php/');
    exit;
}

session_unset();
session_destroy();
header("Location: /recetario-php/");
exit();
