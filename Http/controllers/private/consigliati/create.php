<?php

use Core\Database;
use Core\App;

// Admin id
$db = App::resolve(Database::class);

$admin_id = $db->query("SELECT id FROM admin WHERE utenti_id = :id", [
    'id' => $_SESSION['user']['id'],
])->findOrFail()['id'];

$courses = $db->query("SELECT * FROM consigliati WHERE admin_id = :admin_id", [
    'admin_id' => $admin_id,
])->find();

view('private/consigliati.view.php', [
    'courses' => $courses,
    'errors' => [],
]);