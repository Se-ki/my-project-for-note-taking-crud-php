<?php

namespace Core\Authenticator;

use Core\App;
use Core\Database;

class Authenticator
{
    protected $error = [];
    public function attempt($email, $password)
    {
        $db = App::resolve(Database::class);

        $user = $db->query("SELECT * FROM user WHERE email = :email", ["email" => $email])->find();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $this->login([
                    "email" => $email,
                    "user_id" => $user['user_id']
                ]);
                return true;
            }
        }
        return false;
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
        session_destroy();

        $params = session_get_cookie_params();

        setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
    }

    public function error()
    {
        return $this->error;
    }
}