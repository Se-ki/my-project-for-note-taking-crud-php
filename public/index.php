<?php
session_start();

use Core\Router;
use Core\Session;
use Core\ValidationException;

const BASE_PATH = __DIR__ . '/../';
require BASE_PATH . 'Core/functions.php';

require BASE_PATH . "/vendor/autoload.php";

// require base_path("Core/Database.php");
// require base_path("Core/Response.php");
// require base_path("Core/Router.php");
// require base_path("Core/Container.php");
// require base_path("Core/App.php");
// require base_path("Core/Middleware/Middleware.php");
// require base_path("Core/Middleware/Guest.php");
// require base_path("Core/Middleware/Auth.php");
// require base_path("Core/Validator.php");
// require base_path("Http/Forms/LoginForm.php");
// require base_path("Core/Authenticator.php");
// require base_path("Core/Session.php");
// require base_path("Core/ValidationException.php");

// spl_autoload_register(function ($class) {
//     $class = str_replace("\\", DIRECTORY_SEPARATOR, $class);
//     require base_path("{$class}.php");
// });

require base_path("bootstrap.php");

$router = new Router();
require base_path("routes.php");
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

try {
    $router->route($uri, $method);
} catch (ValidationException $exception) {
    Session::flash("errors", $exception->errors);
    Session::flash("old", $exception->old);

    redirect($router->previousUrl());
}

Session::unflash();