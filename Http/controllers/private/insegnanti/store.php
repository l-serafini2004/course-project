<?php

use Core\App;
use Core\Database;
use Core\Validator;

$error = [];
$email = $_POST['email'];

if(!Validator::email($email)) $error['user'] = "La mail non è valida.";

// Controlla se esiste l'utente
$db = App::resolve(Database::class);

// ADMIN
$admin = $db->query("SELECT admin.id, utenti.name, utenti.email FROM admin INNER JOIN utenti WHERE utenti.id = admin.utenti_id ORDER BY admin.id")->find();
//

$user = $db->query("SELECT * FROM utenti WHERE email = :email", [
    'email' => $email,
])->find();

if(!isset($user[0])){
    $error['user'] = "L'utente non esiste";

    view("private/insegnanti.view.php", [
        'error' => $error,
        'admin' => $admin,
    ]);
    exit();
}

// Controllo che l'admin non sia già settato
$admin = $db->query("SELECT * FROM admin WHERE utenti_id = :uid", [
    'uid' => $user[0]['id'],
])->find();

if(isset($admin[0])){
    $error['user'] = "L'account ha già i privilegi da insegnante";
    view('private/insegnanti.view.php', [
        'error' => $error,
        'admin' => $admin,
    ]);
    exit();
}

$db->query("INSERT INTO admin(utenti_id) VALUES (:utenti_id)", [
    'utenti_id' => $user[0]['id'],
]);

header('location: /admin/teacher');
exit();