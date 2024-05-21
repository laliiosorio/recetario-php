<?php

$config = require base_path('config.php');
$db = new Database($config['database']);


$recipes = $db->getLastFiveRecipes();
// dd($recipes);

require view("index.view.php");
