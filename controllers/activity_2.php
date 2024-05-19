<?php

$config = require('config.php');
$db = new Database($config['database']);

$heading = 'Recipe';
$recipeId = 6;

if (!isset($recipeId)) {
    abort(404);
}

$recipe = $db->getOneRecipe($recipeId);

if (!$recipe) {
    abort(404);
}


require "views/activity_2.view.php";
