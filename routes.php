<?php

// $uri = parse_url($_SERVER['REQUEST_URI'])['path'];

// $routes = [
//     "/" => "./controller/index.php",
//     "/about" => "./controller/about.php",
//     "/contact" => "./controller/contact.php",
//     "/notes" => "./controller/notes/index.php",
//     "/notes/create" => "./controller/notes/create.php",
//     "/note" => "./controller/notes/show.php",
// ];

// if (array_key_exists($uri, $routes)) {
//     require base_path($routes[$uri]);
// } else {
//     abort(Response::NOT_FOUND, "Sorry. Page not found.");
// }

$router->get('/', "controller/index.php");
$router->get('/about', "controller/about.php");
$router->get('/contact', "controller/contact.php");

$router->get('/notes', "controller/notes/index.php")->only('auth');
$router->get('/note', "controller/notes/show.php");
$router->delete("/note", "controller/notes/destroy.php");

$router->get('/note/edit', "controller/notes/edit.php");
$router->patch('/note/edit', 'controller/notes/update.php');

$router->get('/notes/create', "controller/notes/create.php");
$router->post('/notes/create', "controller/notes/store.php");

$router->get('/register', 'controller/registration/create.php')->only('guest');
$router->post('/register', 'controller/registration/store.php');

$router->get('/login', 'controller/sessions/create.php')->only('guest');
$router->post('/sessions', 'controller/sessions/store.php');
$router->delete('/sessions', 'controller/sessions/destroy.php')->only('auth');