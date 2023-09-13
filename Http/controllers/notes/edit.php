<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$note = $db->query("SELECT * FROM notes WHERE id = :id", [
    "id" => $_GET['id']
])->findOrFail();

$currentUserId = 1;
authorized($note['user_id'] === $currentUserId);

view('/notes/edit.php', [
    'header' => 'Edit Note',
    "note" => $note
]);