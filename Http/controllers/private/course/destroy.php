<?php

use Core\Database;
use Core\App;

$db = App::resolve(Database::class);

$id = $_POST['id'];

// Elimina
$db->query('DELETE FROM corsi WHERE id=:id', [
    'id' => $id,
]);

header('location: /admin/courses');
exit();