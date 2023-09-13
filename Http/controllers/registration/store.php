<?php

use Core\App;
use Core\Database;
use Http\Forms\LoginForm;

require base_path('Core/Validator.php');

$db = App::resolve(Database::class);

$email = $_POST['email'];
$password = $_POST['password'];

$form = new LoginForm;

if (!$form->validate($email, $password)) {
    return view('registration/create.php', [
        'header' => "Register",
        'error' => $form->errors()
    ]);
}

$user_exist = $db->query("SELECT * FROM user WHERE email = :email", ["email" => $email])->find();

if ($user_exist) {
    $error['email'] = "Email is already taken.";
}

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