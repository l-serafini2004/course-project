<?php

use Core\Database;
use Core\App;
use Http\Forms\ConsigliatiForm;

$db = App::resolve(Database::class);
$form = new ConsigliatiForm();

// Dati
$nome_corso = $_POST['nome_corso'];
$img = $_POST['img'];
$link = $_POST['link'];

$admin_id = $db->query("SELECT id FROM admin WHERE utenti_id = :id", [
    'id' => $_SESSION['user']['id'],
])->findOrFail()['id'];

$courses = $db->query("SELECT * FROM consigliati WHERE admin_id = :admin_id", [
    'admin_id' => $admin_id,
])->find();

$data = [
    'nome_corso' => $nome_corso,
    'img' => $img,
    'link' => $link,
];

if(!$form->validate($data)){
    view('private/consigliati.view.php', [
        'courses' => $courses,
        'error' => $form->errors(),
    ]);
    exit();
}

$db->query('INSERT INTO consigliati(nome_corso, link, img, admin_id) VALUES (:nome_corso, :link, :img, :admin_id)', [
    'nome_corso' => $nome_corso,
    'link' => $link,
    'img' => $img,
    'admin_id' => $admin_id,
]);

header('location: /admin/consigliati');
exit();