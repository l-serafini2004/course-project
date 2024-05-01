<?php

use Core\Database;
use Core\App;

$db = App::resolve(Database::class); // Database

// ID dell'admin
$adminId = $db->query("SELECT id FROM admin WHERE utenti_id = :utente_id", [
    'utente_id' => $_SESSION['user']['id'],
])->findOrFail()['id'];

// Cerchiamo di creare una serie di dati utili

// Voglio tutti i soldi guadagnati dal docente
$all = $db->query("SELECT corsi.prezzo, corsi.titolo, utenti.email, pagamenti.data FROM pagamenti INNER JOIN corsi ON pagamenti.corsi_id = corsi.id AND corsi.admin_id = :admin_id INNER JOIN utenti ON utenti.id = pagamenti.utenti_id", [
    'admin_id' => $adminId,
])->find();

// Earn
$guadagnoTotale = 0;
foreach ($all as $money){
    $guadagnoTotale += intval($money['prezzo']);
}


view('private/dati.view.php', [
    'earn' => $guadagnoTotale,
    'all' => $all,
]);
