<?php

use Core\Database;
use Core\App;

use Http\Forms\LoginForm;

// Dati
$email = $_POST['email'];
$password = $_POST['password'];
$db = App::resolve(Database::class);

// Valida
$form = new LoginForm();

if(!$form->validate($email, $password)){
    view("create-session.view.php", [
        'errors' => $form->errors(),
    ]);
    exit();
}else{

    $user = $db->query("SELECT * FROM utenti WHERE email = :email", [
        'email' => $email,
    ])->findOrFail();

    $rootUser = $db->query("SELECT utenti.id, utenti.name, utenti.email, utenti.username FROM utenti INNER JOIN admin ON admin.utenti_id = :userid", [
        'userid' => $user['id'],
    ])->find();


    // Login
    if(!empty($rootUser)) $user['admin'] = true;
    else $user['admin'] = false;
    login($user);

    header('location: /');
    exit();
}

