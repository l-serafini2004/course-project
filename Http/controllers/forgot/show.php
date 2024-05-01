<?php

use Core\Database;
use Core\App;

$db = App::resolve(Database::class);


// Variabili utili
$email = [];
$code = [];
$errors = [];


if(!empty($_GET['email']) and empty($_GET['code'])){


    // Controlla se il codice di verifica è presente
    $codice = $db->query("SELECT code FROM utenti where email = :email", [
        'email' => $_GET['email'],
    ])->find();

    if(!empty($codice)){
        // Genero un codice casuale a 6 cifre
        $casuale = rand(100000, 999999);

        $email = $_GET['email'];

        if(!empty($codice)){
            $db->query("UPDATE utenti SET code = :code WHERE email = :email", [
                'code' => $casuale,
                'email' => $email,
            ]);
        }

        // Do un timer di 5 minuti, al termine del quale la chiave di accesso non sarà più valida
        if(!isset($_SESSION['actual_timer'])) $_SESSION['actual_timer'] = time();

        // Invio una mail con il codice
        $mail = new \Http\Classes\Email();

        if(!$mail->send($email, 'Nome', "Password dimenticata", "Il codice per modificare la tua password è " . $casuale . ". \nInseriscilo nel portale per resettare la password e poterla modificare.")){
            $errors['email'] = "La mail non è stata inviata correttamente!";
        }


    }else{
        $errors['email'] = "Non esiste alcun utente con questa mail!";
    }

}else if(!empty($_GET['code'])){

    // Salvo la email
    $email = $_GET['email'];

    if(time() - $_SESSION['actual_timer'] > 300){
        $db->query("UPDATE utenti SET code = 0 WHERE email = :email", [
            'email' => $email,
        ]);
        $_SESSION['actual_timer'] = null;
    }

    $check = $db->query("SELECT * FROM utenti WHERE code = :code and email = :email", [
        'code' => $_GET['code'],
        'email' => $email,
    ])->find();

    if(!isset($check[0])) $errors['code'] = "Il codice inserito non è corretto! Controlla bene";
    else{
        if($check[0]['code'] == 0) $errors['code'] = "Hai impiegato troppo tempo per inserire il codice! Riprova";
        else $code = $_GET['code'];
    }
}



view('forgot.view.php', [
    'email' => $email,
    'code' => $code,
    'errors' => $errors,
]);