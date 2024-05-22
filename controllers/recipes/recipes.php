<?php

$config = require 'config.php';

$db = new Database($config['database']);

// Get filter paramerters
$page = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
$orderBy = ($_GET['orderBy'] ?? '') !== '' ? $_GET['orderBy'] : null;
$orderDirection = isset($_GET['orderDirection']) ? $_GET['orderDirection'] : 'ASC';
$category = ($_GET['category'] ?? '') !== '' ? $_GET['category'] : null;
$difficulty = ($_GET['difficulty'] ?? '') !== '' ? $_GET['difficulty'] : null;

// Get recipes current page
$limit = 5;
$offset = ($page - 1) * $limit;
$recipes = $db->getAllRecipes($limit, $offset, $orderBy, $orderDirection, $category, $difficulty);

if (!$recipes) {
    abort(404);
}

// Get recipes total for pagination
$totalRecipes = $db->getRecipeCount($category, $difficulty);
$totalPages = ceil($totalRecipes / $limit);

// Get filter options
$difficultyLevels = $db->getAllDifficultyLevels();
$categories = $db->getAllCategories();

require view("recipes/recipes.view.php");