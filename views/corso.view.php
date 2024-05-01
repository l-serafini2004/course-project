<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="style/public/corsi/show.css">
    <title>Corso - MW</title>

</head>
<body>
    <!--Loader-->
    <?php include "partials/loader.view.php"; ?>

    <!-- Navbar -->
    <?php include 'partials/navbar.view.php'?>


    <main>
        <section class="head">
            <h2 class="ti"><?= $corso['titolo'] ?></h2>
            <p class="ds">
                <?= $corso['descrizione'] ?>
            </p>
            <p class="kp">Tenuto da <a href="/personal?id=<?= $dati['id'] ?>"><?= $dati['name'] ?></a></p>
        </section>
        <section class="crs-dts">
            <article class="descrizione">
                <img src="<?= $corso['image'] ?>">
                <p>
                    <?= $corso['body'] ?>
                </p>
            </article>
            <article class="prezzo">
                <div class="card">
                    <p class="price">€ <?= $corso['prezzo'] ?></p>
                    <?php if(isset($_SESSION['user'])): ?>
                        <a href="/book?cid= <?= $corso['id'] ?>" class="col-red">Acquista una lezione</a>
                        <a href="#" class="col-green">Prenota una lezione</a>
                    <?php else:  ?>
                    <div class="sub">
                        <a href="/login"><i class="fa-solid fa-lock"></i>Accedi per prenotare</a>
                    </div>
                    <?php endif; ?>
                    <p class="prec">Ogni lezione ha la durata di un'ora, che può essere concordata con il docente</p>
                </div>
            </article>
        </section>

    </main>

    <!-- Footer -->
    <?php include 'partials/footer.view.php'?>

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/d30b4a9354.js" crossorigin="anonymous"></script>
</body>
</html>

