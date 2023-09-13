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

$router->get('/', "index.php");
$router->get('/about', "about.php");
$router->get('/contact', "contact.php");

$router->get('/notes', "notes/index.php")->only('auth');
$router->get('/note', "notes/show.php");
$router->delete("/note", "notes/destroy.php");

$router->get('/note/edit', "notes/edit.php");
$router->patch('/note/edit', 'notes/update.php');

$router->get('/notes/create', "notes/create.php");
$router->post('/notes/create', "notes/store.php");

$router->get('/register', 'registration/create.php')->only('guest');
$router->post('/register', 'registration/store.php');

$router->get('/login', 'sessions/create.php')->only('guest');
$router->post('/sessions', 'sessions/store.php');
$router->delete('/sessions', 'sessions/destroy.php')->only('auth');