<?php

$config = require base_path('config.php');
$db = new Database($config['database']);

// Get the page number from the URL
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

// Get recipes with pagination
$limit = 10;
$offset = ($page - 1) * $limit;
$recipes = $db->getAllRecipes($limit, $offset);

// Set headers for JSON response
header('Content-Type: application/json');

// Send the JSON response
echo json_encode($recipes);
