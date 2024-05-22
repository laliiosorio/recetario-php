<?php
session_start();

if (!isset($_SESSION['username'])) {
    // header('Location: /recetario-php/');

    header('Location: /~losorioortega3/');
    exit;
}

session_unset();
session_destroy();

// header('Location: /recetario-php/');

header("Location: /~losorioortega3/");
exit();
