<?php

use Core\App;
use Core\Database;
use Core\Validator;

require base_path('Core/Validator.php');

$db = App::resolve(Database::class);

$email = $_POST['email'];
$password = $_POST['password'];

$error = [];

if (!Validator::email($email)) {
    $error['email'] = "Email is not valid";
    return view('registration/create.php', [
        'header' => 'Register',
        'error' => $error
    ]);
}

if (!Validator::string($password, 8)) {
    $error['password'] = "Password is not enough";
    return view('registration/create.php', [
        'header' => 'Register',
        'error' => $error
    ]);
}

$user_exist = $db->query("SELECT * FROM user WHERE email = :email", ["email" => $email])->find();

if ($user_exist) {
    $error['email'] = "Email is already taken.";
    return view('registration/create.php', [
        'header' => 'Register',
        'error' => $error
    ]);
} else {
    $hash = password_hash($password, PASSWORD_BCRYPT);
    $db->query("INSERT INTO `user` VALUES (null, :email, :password)", [
        'email' => $email,
        'password' => $hash
    ])->get();

    $user = $db->query("SELECT * FROM user WHERE email = :email", ["email" => $email])->find();

    $_SESSION['user'] = [
        'id' => $user['user_id'],
        'email' => $email,
        'login' => true
    ];

    header('location: /');
    exit();
}