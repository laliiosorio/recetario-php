<?php

$routes = require base_path('routes.php');

function routeToController($uri, $routes)
{

    $baseDir = '/recetario-php';
    $uri = str_replace($baseDir, '', $uri);

    // Check for the /api/recipes/{page} pattern
    if (preg_match('#^/api/recipes/([0-9]+)$#', $uri, $matches)) {
        // Transform URI to /api/recipes?page={page}
        $_GET['page'] = $matches[1];
        require base_path('controllers/api/api_recipes.php');
        return;
    }

    // Check for the /api/recipe/{id} pattern
    if (preg_match('#^/api/recipe/([0-9]+)$#', $uri, $matches)) {
        // Transform URI to /api/recipe?id={id}
        $_GET['id'] = $matches[1];
        require base_path('controllers/api/api_recipe.php');
        return;
    }

    if (array_key_exists($uri, $routes)) {
        require base_path($routes[$uri]);
    } else {
        abort();
    }
}

function abort($code = 404)
{
    http_response_code($code);

    require base_path("views/{$code}.php");

    die();
}

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

routeToController($uri, $routes);
