<?php

use Core\Database;
use Core\App;

$db = App::resolve(Database::class);

if(isset($_GET['param'])) $params = $_GET['param'];
else $params = "";


$utenti = $db->query("SELECT * FROM utenti WHERE :params IS NULL OR username LIKE '%' :params '%'", [
    'params' => $params,
])->find();

view('private/dbutenti.view.php', [
    'utenti' => $utenti,
]);