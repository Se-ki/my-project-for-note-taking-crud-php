<?php
namespace Core;

class ValidationException extends \Exception
{
    public readonly array $errors; //same as protected when used getters and setters
    public readonly array $old;
    public static function throw ($errors, $old)
    {
        $instance = new static;

        $instance->errors = $errors;

        $instance->old = $old;

        throw $instance;
    }
}