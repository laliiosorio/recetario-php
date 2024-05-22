<?php
session_start();

if (isset($_SESSION['username'])) {
    header('Location: /recetario-php/');
    exit;
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $config = require 'config.php';

    $db = new Database($config['database']);

    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (!empty($username) && !empty($password)) {
        $query = 'SELECT * FROM users_pec3 WHERE username = :username';
        $statement = $db->query($query, [':username' => $username]);
        $user = $statement->fetch();

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['username'] = $user['username'];
            header('Location: /recetario-php/');
            exit;
        } else {
            $error = 'Invalid credentials. Please try again.';
        }
    } else {
        $error = 'Both fields are required.';
    }
}

require view("auth/login.view.php");
