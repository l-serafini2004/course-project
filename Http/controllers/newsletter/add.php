<?php

use Core\Database;
use Core\App;
use Http\Forms\NewsletterForm;


// Get from POST
$email = $_POST['email'];

$form = new NewsletterForm();
if(!$form->validate($email)){
    view("index.view.php", [
        'errors' => $form->errors(),
    ]);

    exit();
}

// Inserisco nel database
$db = App::resolve(Database::class);
if($db->query("insert into newsletter(email) values (:email)", [
    'email' => $email,
])){
    
    view("index.view.php", [
        'errors' => [],
        'correct_sub' => 'yea',
    ]);
    exit();
}else{
    view("index.view.php", [
        'errors' => ["email" => "C'è stato un errore, riprovare più tardi"]
    ]);
    exit();
}

