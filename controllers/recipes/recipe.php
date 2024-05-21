<?php

$config = require base_path('config.php');
$db = new Database($config['database']);

$recipeId = $_GET['id'];

if (!isset($recipeId)) {
    abort(404);
}

$recipe = $db->getOneRecipe($recipeId);

if (!$recipe) {
    abort(404);
}


require view("recipes/recipe.view.php");
