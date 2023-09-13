<?php
session_start();

use Core\Router;

const BASE_PATH = __DIR__ . '/../';
require BASE_PATH . 'Core/functions.php';
require base_path("Core/Database.php");
require base_path("Core/Response.php");
require base_path("Core/Router.php");
require base_path("Core/Container.php");
require base_path("Core/App.php");
require base_path("Core/Middleware/Middleware.php");
require base_path("Core/Middleware/Guest.php");
require base_path("Core/Middleware/Auth.php");
require base_path("Http/Forms/LoginForms.php");
// spl_autoload_register(function ($class) {
//     $class = str_replace("\\", DIRECTORY_SEPARATOR, $class);
//     require base_path("{$class}.php");
// });

require base_path("bootstrap.php");

$router = new Router();
require base_path("routes.php");
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];
$router->route($uri, $method);