<?php

use Core\App;
use Core\Database;
use Core\Validator;

require base_path("Core/Validator.php");

$db = App::resolve(Database::class);

$errors = [];

$verify = $db->query("SELECT * FROM notes WHERE id = :id", [
    "id" => $_POST['id']
])->findOrFail();

$currentUserId = $_SESSION['user']['id'];
authorized($verify['user_id'] === $currentUserId);

if (!Validator::string($_POST['body'], 1, 1000)) {
    $errors['body'] = "A body of no more than 1,000 characters is required";
}

if ($errors) {
    return view("/notes/edit.php", [
        'header' => 'Edit a note',
        'errors' => $errors
    ]);
}

$note = $db->query("UPDATE notes SET body = :body WHERE id = :id", [
    "id" => $_POST['id'],
    "body" => $_POST['body']
])->get();

header('location: /notes');
exit();