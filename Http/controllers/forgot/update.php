<?php

use Core\Database;
use Core\App;
use Core\Validator;


$db = App::resolve(Database::class);

// Le password
$password = $_POST['pass1'];
$confirmpassword = $_POST['pass2'];
$email = $_POST['email'];
$code = $_POST['code'];

// Errori
$error = [];


// Controlla se le password sono uguali
if($password != $confirmpassword) $error['password'] = "Le password non sono uguali";

// Controlla se la password è inserta correttamente
if(!Validator::password($password)) $error['password'] = "La password non rispetta i requisiti (Controlla maiuscole, numeri e caratteri speciali)";

// Controlla se la password è uguale alla precedente
$oldPass = $db->query('SELECT password FROM utenti WHERE email = :email', [
    'email' => $email,
])->findOrFail();

if(password_verify($password, $oldPass['password'])) $error['password'] = "La password è uguale alla precedente";


// Controlla che sia settato il cookie $_SESSION corretto, se no esci
if(!isset($_SESSION['actual_timer'])) $error['password'] = "C'è stato un problema con il server, riprovare";


if(empty($error)){

    // Fai l'update della password
    $db->query('UPDATE utenti SET password = :password, code = 0 WHERE email = :email', [
        'password' => password_hash($password, PASSWORD_BCRYPT),
        'email' => $email,
    ]);

    // Elimina la variabile session
    $_SESSION['actual_timer'] = null;

    header('location: /login');
    exit();

}else{
    view("forgot.view.php", [
        'email' => $email,
        'code' => $code,
        'errors' => [],
        'error' => $error,
    ]);
    exit();
}