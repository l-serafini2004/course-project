<?php

use Core\Database;
use Core\App;
use Http\Forms\CoursesForm;

$titolo = $_POST['titolo'];
$prezzo = $_POST['prezzo'];
$descrizione = $_POST['descrizione'];
$body = $_POST['body'];
$image = $_POST['image'];

$db = App::resolve(Database::class);
$form = new CoursesForm();


$admin_id = $db->query("SELECT admin.id FROM admin INNER JOIN utenti ON utenti.username=:username", [
    'username' => $_SESSION['user']['username'],
])->findOrFail();


$ifValidate = $form->validate([
    'titolo' => $titolo,
    'prezzo' => $prezzo,
    'descrizione' => $descrizione,
    'body' => $body,
    'image' => $image,
]);

if(!$ifValidate){
    view('private/course-add.view.php', [
        'errors' => $form->errors(),
    ]);
    exit();
}

$db->query("INSERT INTO corsi(titolo, descrizione, body, prezzo, admin_id, image) values(:titolo, :descrizione, :body, :prezzo, :admin_id, :image)", [
    'titolo' => $titolo,
    'descrizione' => $descrizione,
    'body' => $body,
    'prezzo' => $prezzo,
    'admin_id' => $admin_id['id'],
    'image' => $image,
]);

header('location: /admin/courses');
exit();
