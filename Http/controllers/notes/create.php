<?php

use Core\Session;

view("/notes/create.php", [
    'header' => 'Create a note',
    'error' => Session::get('errors')
]);