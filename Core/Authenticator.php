<?php

namespace Core;

use Core\App;
use Core\Database;
use Core\Session;

class Authenticator
{
    protected $error = [];
    public function attempt($email, $password)
    {
        $db = App::resolve(Database::class);

        $user = $db->query("SELECT * FROM user WHERE email = :email", ["email" => $email])->find();

        if (!$user) {
            return false;
        }

        if (password_verify($password, $user['password'])) {
            $this->login([
                "email" => $email,
                "user_id" => $user['user_id']
            ]);
            return true;
        }
    }

    public function login($user)
    {
        $_SESSION['user'] = [
            'id' => $user['user_id'],
            'email' => $user['email'],
            'login' => true
        ];
        session_regenerate_id(true);
    }

    public function logout()
    {
        Session::destroy();
    }

    public function error()
    {
        return $this->error;
    }
}