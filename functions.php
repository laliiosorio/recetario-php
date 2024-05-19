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