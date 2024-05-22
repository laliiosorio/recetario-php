<?php

require  'Core/functions.php';


spl_autoload_register(function ($class) {
    require "Core/{$class}.php";
});

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require 'Core/router.php';
