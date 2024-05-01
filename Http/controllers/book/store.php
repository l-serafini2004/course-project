<?php

use Core\Database;
use Core\App;
use Http\Classes\Email;

$data = $_POST['data'];
$cid = $_POST['cid'];

$db = App::resolve(Database::class);

// Creiamo la mail per l'utente
$namecorso = $db->query("SELECT titolo FROM corsi where id = :cid", [
    'cid' => $cid,
])->findOrFail();

$base = "<h2>Gentile {$_SESSION['user']['name']},</h2> <p>La ringraziamo per aver prenotato una/delle lezione/i per il corso <b>{$namecorso['titolo']}</b> in data {$data}</p>";
$base = $base . "<p>Le ricordiamo gli orari della/e lezioni:</p><ul>";
foreach ($_POST['orari'] as $ora){
    $base = $base ."<li> {$ora} </li>";
}
$base = $base . "</ul><p>Cordiali saluti, Mario rossi</p>";


// Inserisci tutti i dati
foreach ($_POST['orari'] as $ora){
    $db->query("INSERT INTO pagamenti(corsi_id, utenti_id, data, ora) VALUES (:cid, :utenti_id, :data, :ora)", [
        'cid' => $cid,
        'utenti_id' => $_SESSION['user']['id'],
        'data' => $data,
        'ora' => $ora,
    ]);
}

$mail = new Email();

$mail->send($_SESSION['user']['email'], $_SESSION['user']['name'], "Prenotazione di un corso", $base);

header('location: /book?data=' . $data . "&cid=" . $cid);
exit();
