<?php

namespace Http\Forms;

use Core\ValidationException;
use Core\Validator;

class LoginForm
{
    protected $errors = [];

    public function __construct(public array $attributes)
    {
        if (!Validator::email($attributes['email'])) {
            $this->errors['email'] = "Email is not valid";
        }

        if (!Validator::string($attributes['password'], 8)) {
            $this->errors['password'] = "Password is not enough";
        }

    }
    public static function validate($attributes)
    {
        $instance = new static($attributes); //_constructor

        if ($instance->failed()) {
            ValidationException::throw($instance->errors(), $instance->attributes);
        }

        return $instance->failed() ? $instance->throw() : $instance;
    }

    public function throw ()
    {
        ValidationException::throw($this->errors(), $this->attributes);
    }

    public function failed()
    {
        return count($this->errors);
    }

    //getters
    public function errors()
    {
        return $this->errors;
    }

    //setters
    public function error($field, $message)
    {
        $this->errors[$field] = $message;

        return $this;
    }
}