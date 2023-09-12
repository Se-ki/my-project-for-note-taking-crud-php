<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$email = $_POST['email'];
$password = $_POST['password'];

$error = [];

$user = $db->query("SELECT * FROM user WHERE email = :email", ["email" => $email])->find();

if (!$user) {
    $error['user'] = "User is not authenticate.";
    return view('session/create.php', [
        'header' => 'Log In',
        'error' => $error
    ]);
}

$match_hash = password_verify($password, $user['password']);

if (!$match_hash) {
    $error['user'] = "User is not authenticate.";
    return view('session/create.php', [
        'header' => 'Log In',
        'error' => $error
    ]);
}

login($user);

header('location: /');
exit();