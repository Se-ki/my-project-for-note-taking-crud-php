<?php

use Core\App;
use Core\Authenticator\Authenticator;
use Core\Database;
use Core\Session;
use Http\Forms\LoginForm;

$db = App::resolve(Database::class);

$form = LoginForm::validate($attributes = [
    "email" => $_POST['email'],
    "password" => $_POST['password']
]);

$user_exist = $db->query(
    "SELECT * 
    FROM user 
    WHERE email = :email",
    [
        "email" => $attributes['email']
    ]
)->find();

if ($user_exist) {
    $form->error("email", 'Email is in already used.')->throw();
}

$db->query(
    "INSERT INTO `user` 
    VALUES (null, :email, :password)",
    [
        'email' => $attributes['email'],
        'password' => password_hash($attributes['password'], PASSWORD_BCRYPT)
    ]
)->get();

// if ((new Authenticator)->attempt($email, $password)) {
//     redirect('/');
// }