<?php

use Core\Database;
use Core\App;

$db = App::resolve(Database::class);

if(isset($_GET['data'])) $data = $_GET['data'];
else $data = [];

$prenotazioni = [];

if($data != []){
    $adminId = $db->query("SELECT admin.id FROM admin INNER JOIN utenti ON utenti.username = :username", [
        'username' => $_SESSION['user']['username'],
    ])->findOrFail();


    $prenotazioni = $db->query("SELECT pagamenti.ora, corsi.titolo, utenti.name FROM pagamenti INNER JOIN corsi ON pagamenti.corsi_id=corsi.id AND corsi.admin_id = :admin AND pagamenti.data = :data INNER JOIN utenti ON utenti.id=pagamenti.utenti_id ORDER BY pagamenti.ora", [
        'admin' => $adminId['id'],
        'data' => $data,
    ])->find();
}




view('private/prenotazioni.view.php',[
    'data' => $data,
    'prenotazioni' => $prenotazioni,
]);