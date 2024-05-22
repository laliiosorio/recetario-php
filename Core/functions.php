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

function base_path($path, $baseUrl)
{
    return $baseUrl . $path;
}

function view($path)
{
    return 'views/' . $path;
}
