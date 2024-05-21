<?php

function dd($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";

    die();
}

function urlIs($path, $baseURL)
{
    return $_SERVER['REQUEST_URI'] === $baseURL . $path;
}

function base_path($path)
{
    return BASE_PATH . $path;
}

function view($path)
{
    return base_path('views/' . $path);
}
