<?php

$config = require 'config.php';
$db = new Database($config['database']);


$recipes = $db->getLastFiveRecipes();

require view("index.view.php");
