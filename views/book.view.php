<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="../style/public/book/create.css">
    <title>Prenota</title>

</head>
<body>

<!--Loader-->
<?php include "partials/loader.view.php"; ?>

<!-- Navbar -->
<?php include 'partials/navbar.view.php'?>
    <main>
        <h1>Prenota una lezione</h1>
        <p class="desc">
            Prenota gli slot della lezione che ti interessano (tra quelli in verde). Una volta cliccati diventano gialli: in questo modo possono essere acquistati.
            <br>
            Per cancellare l'acquisto di una certa ora clicca sullo slot di colore giallo.
        </p>
        <div class="calendar">
            <form method="get" action="/book" class="data-book">
                <h2 class="choose">Scegli una data</h2>
                <input type="hidden" value="<?= $cid ?>" name="cid">
                <input type="date" name="data">
                <input type="submit" value="Scegli" class="button">
            </form>
            <?php if(isset($errors['wrongData'])): ?>
                <span class="error"><?= $errors['wrongData'] ?></span>
            <?php endif; ?>
            <?php if($data != []): ?>
                <h2 class="choose">Scegli uno slot</h2>
                <div class="slot" id="slots">
                    <?php foreach ($slot as $s): ?>
                        <div id="<?= $s['hours'][0] . $s['hours'][1] . $s['hours'][3] ?>" class="<?php if(!$s['free']) echo 'red'; else echo 'green' ?>"> <?= $s['hours'] ?> </div>
                    <?php endforeach; ?>
                </div>
                <form action="/book" method="post" class="order">
                    <input type="hidden" value="<?= $data ?>" name="data">
                    <input type="hidden" value="<?= $cid ?>" name="cid">

                    <div id="hours-to-book"></div>

                    <input type="submit" value="Paga" class="button">
                </form>
            <?php endif; ?>

        </div>

    </main>


<!--Footer-->
<?php include 'partials/footer.view.php'?>
</body>
</html>

<script src="script/public/book.js"></script>