<?php


// Import
use Core\App;
use Core\Database;
use Http\Forms\AdminForm;
use ImageKit\ImageKit;

// Dati
$name = $_POST['name'];
$telephone = $_POST['telephone'];
$body = $_POST['body'];
$image = $_POST['image'];
$tags = $_POST['info'];
$facebook = $_POST['fb-link'];
$linkedin = $_POST['lk-link'];
$cv = $_POST['cv'];


// Facciamo i controlli
$form = new AdminForm();

// Utilizza i dati
$db = App::resolve(Database::class);

$user = $db->query("SELECT utenti.name, admin.* FROM admin INNER JOIN utenti ON utenti.email = :email", [
    'email' => $_SESSION['user']['email'],
])->findOrFail();


if(!$form->validate(['name' => $name, 'telephone' => $telephone])){
    view('private/storeprofile.view.php', [
        'errors' => $form->errors(),
        'admin' => $user,
        'currectUpdate' => false,
    ]);
    exit();
}

// Salva nome
$db->query('UPDATE utenti SET name= :name WHERE username= :user', [
    'name' => $name,
    'user' => $_SESSION['user']['username'],
]);


$id = $db->query('SELECT id FROM utenti WHERE username= :user', [
    'user' => $_SESSION['user']['username'],
])->findOrFail();



// Salva altri dati
$db->query('UPDATE admin SET telephone= :telephone, facebook= :facebook, linkedin= :linkedin, body= :body, cv= :cv, tags= :tags, image = :image WHERE utenti_id= :id', [
    'telephone' => $telephone,
    'facebook' => $facebook,
    'linkedin' => $linkedin,
    'body' => $body,
    'cv' => $cv,
    'tags' => $tags,
    'id' => $id["id"],
    'image' => $image,
]);


// Carica i salvataggi
view('private/storeprofile.view.php', [
    'errors' => [],
    'admin' => $user,
    'correctUpdate' => true,
]);
exit();
