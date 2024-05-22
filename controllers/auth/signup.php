<?php
session_start();
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $config = require base_path('config.php');
    $db = new Database($config['database']);

    $username = trim($_POST['username']);
    $nombre = trim($_POST['nombre']);
    $apellidos = trim($_POST['apellidos']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);

    if (empty($username) || empty($nombre) || empty($apellidos) || empty($password) || empty($confirm_password)) {
        $error = 'All fields are required.';
        return require view('auth/signup.view.php');
    }

    if ($password !== $confirm_password) {
        $error = 'Passwords do not match. Please try again.';
        return require view('auth/signup.view.php');
    }

    $query = 'SELECT * FROM users_pec3 WHERE username = :username';
    $statement = $db->query($query, [':username' => $username]);
    $user = $statement->fetch();

    if ($user) {
        $error = 'Username already exists. Please choose a different username.';
        return require view('auth/signup.view.php');
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $insertQuery = 'INSERT INTO users_pec3 (username, nombre, apellidos, password) VALUES (:username, :nombre, :apellidos, :password)';
    $db->query($insertQuery, [
        ':username' => $username,
        ':nombre' => $nombre,
        ':apellidos' => $apellidos,
        ':password' => $hashed_password
    ]);

    header('Location: login');
    exit;
}

require view('auth/signup.view.php');
