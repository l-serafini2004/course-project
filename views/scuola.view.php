<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="../style/public/scuola/index.css">
    <title>La scuola - MW</title>

</head>
<body>
    <!--Loader-->
    <?php include "partials/loader.view.php"; ?>

    <!-- Navbar -->
    <?php include 'partials/navbar.view.php' ?>

    <main>
        <h1>La scuola</h1>

        <section class="gallery">
            <img src="https://londonita.com/wp-content/uploads/2020/01/10-migliori-scuole-di-inglese-a-londra-min.jpg">
            <img src="https://www.mummuacademy.it/wp-content/uploads/2021/04/lezioni-individuali-ripetizioni-di-inglese-a-firenze-mummu-academy-769x513.png">
            <img src="https://www.britishschoolasti.it/sito/wp-content/uploads/2016/11/corsi-inglese-bambini-web.jpg">
            <img src="https://britishinstitutesromaprati.com/wp-content/uploads/2021/01/corsi-inglese-2021.jpg">
        </section>
        <p class="dcp">Alcune immagini della nostra scuola, Via Ippolito Rossellini 94 - Pisa</p>

        <section class="teacher">
            <h2>Gli insegnanti</h2>
            <h3>Scopri i curriculum di tutti i nostri insegnanti</h3>
            <article class="tcs">
                <?php foreach ($teacher as $t): ?>
                    <div class="tc">
                        <img src="<?= $t['image'] ?>">
                        <a href="/personal?id=<?php echo $t['id'] ?>"><p><?= $t['name'] ?></p></a>
                    </div>
                <?php endforeach; ?>
            </article>
        </section>


    </main>



    <!-- Footer -->
    <?php include "partials/footer.view.php" ?>
</body>
</html>