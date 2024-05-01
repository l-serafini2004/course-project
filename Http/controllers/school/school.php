<?php

use Core\Database;
use Core\App;

$db = App::resolve(Database::class);

$tea = $db->query('SELECT utenti.name, admin.id, admin.image FROM utenti INNER JOIN admin ON utenti.id = admin.utenti_id and admin.body IS NOT NULL')->find();


view("scuola.view.php", [
    'teacher' => $tea,
]);
