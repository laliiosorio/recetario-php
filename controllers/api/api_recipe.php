<?php

$config = require 'config.php';

$db = new Database($config['database']);

// Get the recipe ID from the URL
$id = isset($_GET['id']) ? (int)$_GET['id'] : null;

if ($id === null) {
    http_response_code(400);
    echo json_encode(['error' => 'Recipe ID is required']);
    exit;
}

// Get the recipe by ID
$recipe = $db->getOneRecipe($id);

if ($recipe === false) {
    http_response_code(404);
    echo json_encode(['error' => 'Recipe not found']);
    exit;
}

// Set headers for JSON response
header('Content-Type: application/json');

// Send the JSON response
echo json_encode($recipe);
