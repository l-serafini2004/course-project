<?php

use Core\Database;
use Core\App;

// Utilizza i dati
$db = App::resolve(Database::class);


$user = $db->query("SELECT utenti.name, admin.* FROM admin INNER JOIN utenti ON utenti.email = :email AND admin.utenti_id = utenti.id", [
   'email' => $_SESSION['user']['email'],
])->findOrFail();


view("private/storeprofile.view.php", [
    'admin' => $user,
    'errors' => [],
    'correctUpdate' => false,
]);