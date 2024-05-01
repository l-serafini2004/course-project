<?php

use Core\Database;
use Core\App;

$db = App::resolve(Database::class);

// Elimina il corso
$db->query("DELETE FROM consigliati WHERE id = :id", [
    'id' => $_POST['id'],
]);

// Ritorna
header('location: /admin/consigliati');