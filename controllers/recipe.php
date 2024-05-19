<?php

$config = require('config.php');
$db = new Database($config['database']);

$heading = 'Recipe';
$recipeId = $_GET['id'];

if (!isset($recipeId)) {
    abort(404);
}

$recipe = $db->getOneRecipe($recipeId);
// dd($recipe);

if (!$recipe) {
    abort(404);
}


require "views/recipe.view.php";