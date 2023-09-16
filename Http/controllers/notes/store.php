<?php
use Core\Database;
use Core\Validator;
use Core\App;
use Core\Session;

// $config = require base_path("config.php");
// $db = new Database($config['database']);

//more complex to understand to and new to call database
//Database::class is equivalent to 'Core\Database'
$db = App::resolve(Database::class);

if (!Validator::string($_POST['body'], 1, 1000)) {
    Session::flash("errors", [
        "body" => "A body of no more than 1,000 characters is required"
    ]);
    redirect('/notes/create');
}

if (!empty($errors)) {
    // return view("/notes/create.php", [
    //     'header' => 'Create a note',
    //     'errors' => $errors
    // ]);
}

$db->query(
    "INSERT INTO `notes`(`body`, `user_id`) 
    VALUES (:body, :user_id)",
    [
        "body" => $_POST['body'],
        "user_id" => $_SESSION['user']['id']
    ]
) ?? empty($errors);

redirect('/notes');