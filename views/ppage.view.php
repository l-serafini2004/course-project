<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="../style/public/scuola/ppage.css">
    <link rel="stylesheet" href="style/public/consigliati/consigliati.css">
    <title>La scuola - MW</title>

</head>
<body>
<!--Loader-->
<?php include "partials/loader.view.php"; ?>

<!-- Navbar -->
<?php include 'partials/navbar.view.php' ?>

<main>
    <div class="above">
        <h1><?= $ins['name'] ?></h1>
    </div>
    <div class="left">
        <p>
            <?= $ins['body'] ?>
        </p>
    </div>
    <div class="right">
        <img src="<?= $ins['image'] ?>">
        <ul>
            <?php foreach ($tags as $tag): ?>
                <li><?= $tag ?></li>
            <?php endforeach; ?>
            <li><a href="#">Curriculum Vitae</a></li>
        </ul>
        <div class="social">
            <a href="<?= $ins['linkedin'] ?>" target="_blank"><i class="fa-brands fa-linkedin"></i></a>
            <a href="<?= $ins['facebook'] ?>" target="_blank"><i class="fa-brands fa-facebook"></i></a>
            <a href="mailto: <?= $ins['email'] ?>" target="_blank"><i class="fa-solid fa-envelope"></i></a>
            <a href="tel: <?= $ins['telephone'] ?>" target="_blank"><i class="fa-solid fa-phone"></i></a>
        </div>
    </div>

    <div class="bottom">
        <article class="cons-courses">
            <h2>Corsi consigliati</h2>
            <div class="courses">
                <?php foreach ($consigliati as $consigliato): ?>
                    <div class="corso">
                        <img src="<?= $consigliato['img'] ?>">
                        <a href="<?= $consigliato['link'] ?>" target="_blank"><p><?= $consigliato['nome_corso'] ?></p></a>
                    </div>
                <?php endforeach; ?>
            </div>
        </article>
    </div>


</main>


<!-- Footer -->
<?php include "partials/footer.view.php" ?>

<!-- Font Awesome -->
<script src="https://kit.fontawesome.com/d30b4a9354.js" crossorigin="anonymous"></script>
</body>
</html>