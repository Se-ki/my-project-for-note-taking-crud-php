<?php
use Core\Authenticator\Authenticator;

$auth = new Authenticator;

$auth->logout();

header('location: /');
exit();