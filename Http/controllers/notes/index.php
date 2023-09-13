<?php

use Core\App;
use Core\Database;

// $config = require base_path("config.php");
// $db = new Database($config['database']);

//more complex to understand to and new to call database
//Database::class is equivalent to 'Core\Database'
$db = App::resolve(Database::class);

$notes = $db->query("SELECT * FROM notes WHERE user_id = :id", ['id' => $_SESSION['user']['id'] ?? ""])->get();

view("/notes/index.php", [
    'header' => 'My notes',
    'notes' => $notes
]);