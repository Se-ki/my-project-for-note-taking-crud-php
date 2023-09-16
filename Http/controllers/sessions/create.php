<?php

use Core\Session;

view("sessions/create.php", [
    'header' => "Log In",
    'error' => Session::get("errors"),
]);