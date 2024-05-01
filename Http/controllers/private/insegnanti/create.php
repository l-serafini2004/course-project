<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$admin = $db->query("SELECT admin.id, utenti.name, utenti.email FROM admin INNER JOIN utenti WHERE utenti.id = admin.utenti_id ORDER BY admin.id")->find();

view('private/insegnanti.view.php', [
    'admin' => $admin,
    'error' => [],
]);