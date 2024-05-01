<?php

use Core\Database;
use Core\App;

$db = App::resolve(Database::class);

$id = $db->query("SELECT id FROM utenti WHERE username= :username", [
    'username' => $_SESSION['user']['username'],
])->findOrFail();


$prenotazioni = $db->query('SELECT pagamenti.id, pagamenti.data, corsi.titolo, corsi.prezzo FROM pagamenti INNER JOIN corsi ON pagamenti.corsi_id = corsi.id INNER JOIN utenti ON utenti.id=pagamenti.utenti_id AND utenti.id= :id', [
    'id' => $id['id'],
])->find();



view("profile.view.php", [
    'prenotazioni' => $prenotazioni,
]);
