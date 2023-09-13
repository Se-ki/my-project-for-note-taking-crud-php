<?php
use Core\App;
use Core\Database;

// $config = require base_path("config.php");
// $db = new Database($config['database']);

//more complex to understand to and new to call database
//Database::class is equivalent to 'Core\Database'
$db = App::resolve(Database::class);

$note = $db->query("SELECT * FROM notes WHERE id = :id", [
    "id" => $_GET['id']
])->findOrFail();

$currentUserId = $_SESSION['user']['id'];
authorized($note['user_id'] === $currentUserId);

view("notes/show.php", [
    'header' => 'Note Details',
    'note' => $note
]);