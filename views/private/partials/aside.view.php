<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="../../style/private/aside/aside.css">
</head>

<body>
    <aside id="asideid">
        <h2>MyPanel</h2>
        <ul>
            <li class="menu-opt" id="select-profilo">Profilo</li>
            <div class="--visible" id="profilo">
                <a href="/admin/gestionecv">Gestione CV</a>
                <a href="/admin/courses">Corsi</a>
                <a href="/admin/consigliati">Corsi consigliati</a>
                <a href="/admin/dati">Dati</a>
                <a href="/">Home</a>
            </div>
            <li class="menu-opt" id="select-utenti">Gestione Utenti</li>
            <div class="--visible" id="utenti">
                <a href="/admin/dbutenti">Database Utenti</a>
                <a href="/admin/prenotazioni">Prenotazioni</a>
            </div>
            <li class="menu-opt" id="select-insegnanti"><a href="/admin/teacher">Gestione Insegnanti</a></li>
        </ul>
        <div class="manage1" id="openclose"></div>
    </aside>
    <div class="manage" id="openclose2"></div>
</body>

<script src="../script/private/index.js"></script>




