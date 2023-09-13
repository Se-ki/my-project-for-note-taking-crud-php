<?php

namespace Http\Forms;

use Core\Validator;

class LoginForm
{
    protected $errors = [];
    public function validate($email, $password)
    {
        if (!Validator::email($email)) {
            $this->errors['email'] = "Email is not valid";
        }

        if (!Validator::string($password, 8)) {
            $this->errors['password'] = "Password is not enough";
        }

        return empty($this->errors);
    }

    public function errors()
    {
        return $this->errors;
    }
}