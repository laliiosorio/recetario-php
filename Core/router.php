<?php

$routes = require 'routes.php';

function routeToController($uri, $routes)
{
    // $baseDir = '/recetario-php'; // Para el entorno local
    $baseDir = '/~losorioortega3'; // Para el entorno de producción

    // Remover el baseDir del URI
    $uri = str_replace($baseDir, '', $uri);

    if (preg_match('#^/api/recipes/([0-9]+)$#', $uri, $matches)) {
        // Transformar URI a /api/recipes?page={page}
        $_GET['page'] = $matches[1];
        require 'controllers/api/api_recipes.php';
        return;
    }

    if (preg_match('#^/api/recipe/([0-9]+)$#', $uri, $matches)) {
        // Transformar URI a /api/recipe?id={id}
        $_GET['id'] = $matches[1];
        require 'controllers/api/api_recipe.php';
        return;
    }

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

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

routeToController($uri, $routes);
