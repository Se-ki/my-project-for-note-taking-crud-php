<?php

use Core\Session;

view('registration/create.php', [
    'header' => 'Register',
    'error' => Session::get('errors')
]);