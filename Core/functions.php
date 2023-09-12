<?php

use Core\Response;



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

function login($user, )
{
    $_SESSION['user'] = [
        'id' => $user['user_id'],
        'email' => $user['email'],
        'login' => true
    ];
    session_regenerate_id(true);
}

function logout()
{
    session_destroy();

    $params = session_get_cookie_params();

    setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);

}