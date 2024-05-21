<?php
$error = '';

$email = $_POST['email'];
$password = $_POST['password'];




require view("auth/signup.view.php");
