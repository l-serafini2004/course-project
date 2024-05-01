<?php

use Core\Database;
use Core\App;

$db = App::resolve(Database::class);

// Faccio la inner join per ottenere i dati che mi servono
$need_data = $db->query("SELECT admin.id, utenti.name, corsi.* FROM admin INNER JOIN utenti ON utenti.username = :username INNER JOIN corsi ON corsi.admin_id = admin.id", [
    'username' => $_SESSION['user']['username'],
])->find();



view('private/course.view.php', [
    'need' => $need_data,
]);
