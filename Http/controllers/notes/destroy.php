<?php

use Core\App;
use Core\Database;

//old way to call database
// $config = require base_path("config.php");
// $db = new Database($config['database']);

//more complex to understand to and new to call database
//Database::class is equivalent to 'Core\Database'
$db = App::resolve(Database::class);

$note = $db->query("SELECT * FROM notes WHERE id = :id", [
    "id" => $_GET['id']
])->findOrFail();

$currentUserId = 1;
authorized($note['user_id'] === $currentUserId);

$db->query("DELETE FROM notes WHERE id = :id", ["id" => $_GET['id']]);
header('location: /notes');
exit();