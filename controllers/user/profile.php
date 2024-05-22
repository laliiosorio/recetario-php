<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: login');
    exit;
}

$config = require 'config.php';

$db = new Database($config['database']);
$error = '';
$success = '';

$username = $_SESSION['username'];
$query = 'SELECT * FROM users_pec3 WHERE username = :username';
$statement = $db->query($query, [':username' => $username]);
$user = $statement->fetch();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = trim($_POST['nombre']);
    $apellidos = trim($_POST['apellidos']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);

    // Validación de campos
    if (empty($nombre) || empty($apellidos)) {
        $error = 'Nombre y apellidos son obligatorios.';
        return require view('user/profile.view.php');
    }

    if (!empty($password) && $password !== $confirm_password) {
        $error = 'Las contraseñas no coinciden. Por favor, inténtelo de nuevo.';
        return require view('user/profile.view.php');
    }

    // Actualización de datos
    if (!empty($password)) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $updateQuery = 'UPDATE users_pec3 SET nombre = :nombre, apellidos = :apellidos, password = :password WHERE username = :username';
        $db->query($updateQuery, [
            ':nombre' => $nombre,
            ':apellidos' => $apellidos,
            ':password' => $hashed_password,
            ':username' => $username
        ]);
    } else {
        $updateQuery = 'UPDATE users_pec3 SET nombre = :nombre, apellidos = :apellidos WHERE username = :username';
        $db->query($updateQuery, [
            ':nombre' => $nombre,
            ':apellidos' => $apellidos,
            ':username' => $username
        ]);
    }

    // Actualizar datos del usuario
    $query = 'SELECT * FROM users_pec3 WHERE username = :username';
    $statement = $db->query($query, [':username' => $username]);
    $user = $statement->fetch();

    $success = 'Perfil actualizado exitosamente.';
    return require view('user/profile.view.php');
}

require view('user/profile.view.php');
