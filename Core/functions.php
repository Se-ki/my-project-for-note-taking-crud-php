<?php

use Core\Response;
use Core\Session;

function dd($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
    die();
}

function abort($code = 404, $error = [])
{
    http_response_code($code);
    extract($error);
    require base_path("view/notFound.php");
    die();
}

function route($route)
{
    return $_SERVER['REQUEST_URI'] === $route;
}

function authorized($condition, $status = Response::FORBIDDEN)
{
    if (!$condition) {
        abort($status, ["err" => "Sorry your not authorized to do stuff in this page."]);
    }
}

function base_path($path)
{
    return BASE_PATH . $path;
}

function view($path, $header = [])
{
    extract($header);
    require base_path('view/' . $path);
}

function redirect($path)
{
    header("location: {$path}");
    exit();
}

function old($key, $default = null)
{
    return Session::get('old')[$key] ?? $default;
}