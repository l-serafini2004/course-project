<?php

use Core\Database;
use Core\App;

$id = $_GET['id'];
$db = App::resolve(Database::class);

$corso = $db->query('SELECT * FROM corsi WHERE id=:id', [
    'id' => $id,
])->findOrFail();

$dati = $db->query("SELECT admin.id, utenti.name FROM admin INNER JOIN utenti ON utenti.id=admin.utenti_id INNER JOIN corsi ON corsi.id=:id", [
    'id' => $id,
])->findOrFail();


view('corso.view.php', [
    'corso' => $corso,
    'dati' => $dati,
]);