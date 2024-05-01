<?php

use Core\Database;
use Core\App;


$db = App::resolve(Database::class);

$freeSlot = [
    [
        'hours' => '08:00:00',
        'free' =>true
    ],
    [
        'hours' => '08:30:00',
        'free' =>true
    ],
    [
        'hours' => '09:00:00',
        'free' =>true
    ],
    [
        'hours' => '09:30:00',
        'free' =>true
    ],
    [
        'hours' => '10:00:00',
        'free' =>true
    ],
    [
        'hours' => '10:30:00',
        'free' =>true
    ],
    [
        'hours' => '11:00:00',
        'free' =>true
    ],
    [
        'hours' => '11:30:00',
        'free' =>true
    ],
    [
        'hours' => '15:00:00',
        'free' =>true
    ],
    [
        'hours' => '15:30:00',
        'free' =>true
    ],
    [
        'hours' => '16:00:00',
        'free' =>true
    ],
    [
        'hours' => '16:30:00',
        'free' =>true
    ],
    [
        'hours' => '17:00:00',
        'free' =>true
    ],
    [
        'hours' => '17:30:00',
        'free' =>true
    ],
    [
        'hours' => '18:00:00',
        'free' =>true
    ],
    [
        'hours' => '18:30:00',
        'free' =>true
    ],
];


// Controlla se sceglie il giorno
$day = $_GET['day'] ?? '';


if($day != ''){

    $admin_id = $db->query("SELECT id FROM admin WHERE utenti_id = :id", [
        'id' => $_SESSION['user']['id'],
    ])->findOrFail();

    // ORE OCCUPATE
    $ore = $db->query("SELECT pagamenti.ora FROM pagamenti INNER JOIN corsi ON pagamenti.corsi_id=corsi.id AND corsi.admin_id = :admin AND pagamenti.data = :data INNER JOIN utenti ON utenti.id=pagamenti.utenti_id ORDER BY pagamenti.ora", [
        'admin' => $admin_id['id'],
        'data' => $day,
    ])->find();

    // Scegliamo le ore libere
    foreach ($ore as $ora){
        for ($i = 0; $i < 16; $i++) {
            if($freeSlot[$i]["hours"] == $ora["ora"]){
                $freeSlot[$i]["free"] = false;
                break;
            }
        }
    }

    view("private/userbook.view.php", [
        'hours' => $freeSlot,
    ]);
}else{
    view("private/userbook.view.php");
}

