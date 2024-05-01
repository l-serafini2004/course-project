<?php

use Core\App;
use Core\Database;


$courseId = $_GET['cid'];

if(isset($_GET['data'])) $data = $_GET['data'];
else $data = [];


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


if($data != []){

    // Controlla che la data inserita sia corretta (domani-due settimane)
    $inizio = strtotime("+1 day");
    $fine = strtotime("2 weeks");

    $dataInSerita = strtotime($data);

    $errors = [];

    $giorno = strftime("%w", $dataInSerita);

    if($giorno == 0 || $giorno == 6){
        $errors['wrongData'] = "Scegliere un giorno che non sia sabato o domenica";
    }

    if($dataInSerita < $inizio){
        $errors['wrongData'] = "Scegliere un giorno che sia almeno dopodomani!";
    }
    if($dataInSerita > $fine){
        $errors['wrongData'] = "Scegliere un giorno inferiore alle 2 settimane!";
    }

    // Controlla che non sia sabato o domenica

    if(!empty($errors)){

        // Esci, la data non è corretta
        $data = [];

        view('book.view.php',[
            'data' => $data,
            'slot' => $freeSlot,
            'cid' => $courseId,
            'errors' => $errors,
        ]);
        exit();
    }



    // Cerco l'id dell'admin
    $idAdmin = $db->query('SELECT admin.id FROM admin INNER JOIN corsi ON corsi.id = :id', [
        'id' => $courseId,
    ])->findOrFail();


    $ore = $db->query('SELECT pagamenti.ora FROM pagamenti INNER JOIN corsi ON corsi.admin_id = :id AND pagamenti.data= :data', [
        'data' => $data,
        'id' => $idAdmin['id'],
    ])->find();

    foreach ($ore as $ora){
        for ($i = 0; $i < 16; $i++) {
            if($freeSlot[$i]["hours"] == $ora["ora"]){
                $freeSlot[$i]["free"] = false;
                break;
            }
        }
    }

}


view('book.view.php', [
    'data' => $data,
    'slot' => $freeSlot,
    'cid' => $courseId,
    'errors' => [],
]);