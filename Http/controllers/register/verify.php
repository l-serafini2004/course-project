<?php

use Core\Database;
use Core\App;

$db = App::resolve(Database::class);

$email = $_POST['email'];
$code = $_POST['code'];

// Selezioniamo l'utente
$utente = $db->query("SELECT * FROM utenti WHERE email = :email AND code = :code", [
    'email' => $email,
    'code' => $code,
])->findOrFail();

// Verifichiamo l'utente e cambiamo il codice
if(!empty($utente)){

    $db->query("UPDATE utenti SET code = 0, verified = 1 WHERE email = :email", [
        'email' => $email,
    ]);

    view('index.view.php', [
        'success' => "Il tuo account è stato confermato correttamente, adesso devi solo accedere",
        'error' => [],
    ]);
    exit();
}else{
    abort(400);
    exit();
}

