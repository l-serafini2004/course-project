<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="../style/private/prenotazioni/show.css">
    <title>Admin - prenotazioni</title>

</head>
<body>
<div class="page" id="page-first">
    <?php include 'partials/aside.view.php'; ?>

    <main>
        <h1>Prenotazioni</h1>
        <form method="get" action="#">
            <p>Inserisci la data che ti interessa per controllare le prenotazioni di quel giorno</p>
            <input type="date" name="data">
            <input type="submit" value="Cerca">
        </form>
        <?php if(isset($data) && $data != []): ?>
            <div class="app">
                <h2>Appuntamenti del <?= $data ?></h2>
                <section class="db">
                    <div class="prenotazione">
                        <p>Corso</p>
                        <p>Ora</p>
                        <p>Nome</p>
                    </div>
                    <?php foreach ($prenotazioni as $prenotazione): ?>
                        <div class="prenotazione">
                            <p><?= $prenotazione['titolo'] ?></p>
                            <p><?= $prenotazione['ora'] ?></p>
                            <p><?= $prenotazione['name'] ?></p>
                        </div>
                    <?php endforeach; ?>
                </section>
            </div>
        <?php endif; ?>
    </main>
</div>

</body>
</html>

<script src="/script/private/aside.js"></script>
<!-- Font Awesome -->
<script src="https://kit.fontawesome.com/d30b4a9354.js" crossorigin="anonymous"></script>


