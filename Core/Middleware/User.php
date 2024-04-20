<?php

namespace Core\Middleware;

// use Core\Session;

class User
{
    public function handle()
    {
        if ($_SESSION['user']['role'] != 1 || !$_SESSION['user'] ?? false) {
            header('location: /');
            exit();
        }
    }
}
