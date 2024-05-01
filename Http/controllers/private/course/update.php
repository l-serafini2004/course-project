<?php

use Core\Database;
use Core\App;
use Http\Forms\CoursesForm;


$id = $_POST['id'];
$titolo = $_POST['titolo'];
$descrizione = $_POST['descrizione'];
$body = $_POST['body'];
$prezzo  = $_POST['prezzo'];

$db = App::resolve(Database::class);
$form = new CoursesForm();

$corso = $db->query("SELECT * FROM corsi WHERE id = :id", [
    'id' => $id,
])->findOrFail();


$ifValidate = $form->validate([
    'titolo' => $titolo,
    'prezzo' => $prezzo,
    'descrizione' => $descrizione,
    'body' => $body,
]);


if(!$ifValidate){
    view('private/modify-course.view.php', [
        'errors' => $form->errors(),
        'corso' => $corso,
    ]);
    exit();
}


$db->query("UPDATE corsi SET titolo = :titolo, descrizione = :descrizione, body = :body, prezzo = :prezzo WHERE id = :id", [
    'titolo' => $titolo,
    'descrizione' => $descrizione,
    'body' => $body,
    'prezzo' => doubleval($prezzo),
    'id' => $id,
]);

header('location: /admin/courses');
exit();