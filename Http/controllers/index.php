<?php

view("index.php", [
    "header" => "Home",
    "checkRole" => $_SESSION['user']['role'] ?? false
]);
