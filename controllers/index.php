<?php

$config = require('config.php');
$db = new Database($config['database']);


$recipes = $db->getLastFiveRecipes();
// dd($recipes);

require "views/index.view.php";
