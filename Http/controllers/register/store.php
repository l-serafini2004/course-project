<?php

use Http\Forms\RegisterForm;
use Http\Forms\NewsletterForm;
use Http\Classes\Email;
use Core\Database;
use Core\App;
use Dotenv\Dotenv;

// Dati
$name = $_POST['name'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$newsletter = isset($_POST['newsletter']);


$form = new RegisterForm();

$co = $form->validate($email, $password, $username, $name);

if(!$co){
    view("create-reg.view.php", [
        'errors' => $form->errors(),
    ]);
    exit();
}

$db = App::resolve(Database::class);

$code = rand(100000, 999999);

$user = $db->query("INSERT INTO utenti(name, username, email, password, code) VALUES (:name, :username, :email, :password, :code)", [
    'name' => $name,
    'username' => $username,
    'email' => $email,
    'password' => password_hash($password, PASSWORD_BCRYPT),
    'code' => $code,
])->find();

$myUserId = $db->query("SELECT id FROM utenti WHERE email = :email", [
    'email' => $email,
])->findOrFail();

if(isset($user)) {


    // Inserisco nella newsletter
    if($newsletter){
        $newsletterForm = new NewsletterForm();
        if($newsletterForm->validate($email)){
            $db->query("INSERT INTO newsletter(email) VALUES (:email)", [
                'email' => $email,
            ]);
        }
    }


    $dotenv = Dotenv::createImmutable(BASE_PATH);
    $dotenv->load();

    // Invia la mail di conferma registrazione

    $body = "<h1>Conferma la tua registrazione</h1>";
    $body = $body . "<p>Ciao {$name},</p><p>Per terminare la tua registrazione, clicca sul bottone di questa mail, verrai automaticamente reinderizzato alla pagina.</p>";
    $body = $body . '<form method="post" action="' . $_ENV["WEBSITE_LINK"] . 'confirm"><input type="hidden" name="email" value="' . $email . '"><input type="hidden" name="code" value="' . $code . '">';
    $body = $body . '<input type="submit" value="Conferma">';

    $mail = new Email();
    $mail->send($email, $name, "Conferma della registrazione", $body);



    // Creo l'account per professore se richiesto
    if($_POST['type'] == 1){
        $profess = $db->query("INSERT INTO admin(utenti_id) VALUES(:utenti_id)", [
            'utenti_id' => $myUserId['id'],
        ]);
    }


    view("index.view.php", [
        "success" => "Account creato! Controlla la tua email per confermarlo",
    ]);
    exit();
}else{
    header('location /register');
    exit();
}