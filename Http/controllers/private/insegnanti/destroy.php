<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
$admin = $db->query("SELECT admin.id, utenti.name, utenti.email FROM admin INNER JOIN utenti WHERE utenti.id = admin.utenti_id ORDER BY admin.id")->find();


// Controlla che l'id non sia il tuo
$mustNotMe = $db->query('SELECT id FROM admin WHERE utenti_id = :utenti_id', [
    'utenti_id' => $_SESSION['user']['id'],
])->findOrFail();



if($mustNotMe['id'] == $_POST['id']){
    $error['del'] = "Non puoi eliminare il tuo account";
    view("private/insegnanti.view.php",[
        'error' => $error,
        'admin' => $admin,
    ]);
    exit();
}

// Elimina il profilo admin
$db->query("DELETE FROM admin WHERE id= :id", [
    'id' => $_POST['id'],
]);

header('location: /admin/teacher');
exit();

