<?php
namespace Core;

use Core\Middleware\Auth;
use Core\Middleware\Guest;
use Core\Middleware\Middleware;

class Router
{
    protected $routes = [];

    public function route($uri, $method)
    {
        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {

                // if ($route['middleware']) {
                //     $middleware = Middleware::MAP[$route['middleware']];
                //     (new $middleware)->handle();
                // }

                Middleware::resolve($route['middleware']);

                // if ($route['middleware'] === 'guest') {
                //     // (new Guest)->handle();
                // }

                // if ($route['middleware'] === 'auth') {
                //     (new Auth)->handle();
                // }
                return require base_path("Http/controllers/" . $route['controllers']);
            }
        }
        $this->abort(Response::NOT_FOUND, ['err' => "Sorry page not found."]);
    }
    public function add($uri, $controller, $method)
    {
        $this->routes[] = [
            "uri" => $uri,
            "controllers" => $controller,
            "method" => $method,
            "middleware" => null
        ];
        return $this;
    }
    public function get($uri, $controller)
    {
        return $this->add($uri, $controller, "GET");
    }
    public function post($uri, $controller)
    {
        return $this->add($uri, $controller, "POST");
    }
    public function delete($uri, $controller)
    {
        return $this->add($uri, $controller, "DELETE");
    }
    public function patch($uri, $controller)
    {
        return $this->add($uri, $controller, "PATCH");
    }
    public function put($uri, $controller)
    {
        return $this->add($uri, $controller, "PUT");
    }
    public function only($key)
    {
        $this->routes[array_key_last($this->routes)]['middleware'] = $key;
    }
    protected function abort($code = 404, $error = [])
    {
        http_response_code($code);
        extract($error);
        require base_path("view/notFound.php");
        die();
    }
}