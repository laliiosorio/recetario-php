<?php

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$routes = [
    '/' => 'controllers/index.php',
    '/recipes' => 'controllers/recipes.php',
    '/recipe' => 'controllers/recipe.php',
    '/activity-2' => 'controllers/activity_2.php',
    '/api/recipes' => 'controllers/api_recipes.php',
    '/about' => 'controllers/about.php',
    '/contact' => 'controllers/contact.php',
];

function routeToController($uri, $routes)
{

    $baseDir = '/recetario-php';
    $uri = str_replace($baseDir, '', $uri);

    // Check for the /api/recipes/{page} pattern
    if (preg_match('#^/api/recipes/([0-9]+)$#', $uri, $matches)) {
        // Transform URI to /api/recipes?page={page}
        $_GET['page'] = $matches[1];
        require 'controllers/api_recipes.php';
        return;
    }


    // dd($uri);


    if (array_key_exists($uri, $routes)) {
        require $routes[$uri];
    } else {
        abort();
    }
}

function abort($code = 404)
{
    http_response_code($code);

    require "views/{$code}.php";

    die();
}

routeToController($uri, $routes);
