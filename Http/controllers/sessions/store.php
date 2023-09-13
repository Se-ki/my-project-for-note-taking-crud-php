<?php

use Core\Authenticator\Authenticator;
use Http\Forms\LoginForm;

$email = $_POST['email'];
$password = $_POST['password'];

$form = new LoginForm;


if ($form->validate($email, $password)) {

    if ((new Authenticator)->attempt($email, $password)) {
        redirect('/');
    } else {
        $form->error('user', 'Incorrect Credentials.');
    }
}

return view('sessions/create.php', [
    'header' => 'Log In',
    'error' => $form->errors()
]);