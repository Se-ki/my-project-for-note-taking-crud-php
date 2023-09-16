<?php
namespace Core\Middleware;

// use Core\Session;

class Auth
{
    public function handle()
    {
        // if (Session::has()) {
        //     header('location: /');
        //     exit();
        // }
        if (!$_SESSION['user'] ?? false) {
            header('location: /');
            exit();
        }
    }
}