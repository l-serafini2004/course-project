<?php

use Core\Database;
use Core\App;


// Utilizzo l'id per la query
$id = $_GET['id'];

$db = App::resolve(Database::class);

$insegnante = $db->query('SELECT utenti.email, utenti.name, admin.telephone, admin.facebook, admin.linkedin, admin.body, admin.image, admin.cv, admin.tags FROM utenti INNER JOIN admin ON admin.utenti_id = utenti.id and admin.id = :id', [
    'id' => $id,
])->findOrFail();

$tags = preg_split("/\,/", $insegnante['tags']);

// Inserire i corsi consigliati
$consigliati = $db->query("SELECT * FROM consigliati WHERE admin_id = :admin_id", [
    'admin_id' => $id,
])->find();



view("ppage.view.php", [
    'ins' => $insegnante,
    'tags' => $tags,
    'consigliati' => $consigliati,
]);