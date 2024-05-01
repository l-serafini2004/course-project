<?php

use Core\Database;
use Core\App;

if(isset($_GET['titolo'])) $titolo = $_GET['titolo'];
else $titolo = "";
$db = App::resolve(Database::class);

$corsi = $db->query("SELECT corsi.image, corsi.id, corsi.titolo, corsi.descrizione, utenti.name FROM admin INNER JOIN corsi ON admin.id = corsi.admin_id AND corsi.titolo LIKE '%' :titolo '%' INNER JOIN utenti ON admin.utenti_id = utenti.id", [
    'titolo' => $titolo,
])->find();
$insegnanti = $db->query("SELECT admin.id, utenti.name FROM admin INNER JOIN utenti ON admin.utenti_id = utenti.id AND admin.body IS NOT NULL ")->find();


view("corsi.view.php", [
    'corsi' => $corsi,
    'insegnanti' => $insegnanti
]);