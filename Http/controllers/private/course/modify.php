<?php

use Core\Database;
use Core\App;

$db = App::resolve(Database::class);
$id = $_GET['id'];

$corso = $db->query('SELECT * FROM corsi WHERE id=:id', [
    'id' => $id,
])->findOrFail();


view('private/modify-course.view.php', [
    'errors' => [],
    'corso' => $corso,
]);