<?php

use Core\Database;
use Core\App;

$db = App::resolve(Database::class);

$id = $_POST['id'];

$myId = $db->query("SELECT id FROM utenti WHERE username= :user", [
    'user' => $_SESSION['user']['username'],
])->findOrFail();

$myId = $myId['id'];

// Se cerco di eliminare me stesso - fallisce
if($myId == $id){
    header('location: /admin/dbutenti');
    exit();
}

// Elimino il resto
$db->query("DELETE FROM utenti WHERE id=:id", [
    'id' => $id,
]);

header('location: /admin/dbutenti');
exit();

