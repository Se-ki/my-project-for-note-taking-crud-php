<?php

namespace Core\Middleware;

// use Core\Session;

class Admin
{
    public function handle()
    {
        if (!$_SESSION['user'] ?? false && $_SESSION['user']['role'] != 2) {
            header('location: /');
            exit();
        }
    }
}
