<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="style/public/corsi/corsi.css">
    <title>Corsi - MW</title>

</head>
<body>

    <!--Loader-->
    <?php include "partials/loader.view.php"; ?>

    <!-- Navbar -->
    <?php include 'partials/navbar.view.php'?>

    <main>
        <h1>Scopri tutti i corsi</h1>

        <form method="get" action="/corsi" class="search">
            <input type="text" name="titolo">
            <input type="submit">
        </form>

        <article class="courses">
            <?php foreach ($corsi as $corso): ?>
                <div class="single-course">
                    <img src="<?= $corso['image'] ?>">
                    <a href="/corso?id=<?= $corso['id'] ?>"><h2 class="subtitolo"><?= $corso['titolo'] ?></h2></a>
                    <p class="keep"><?= $corso['name'] ?></p>
                    <p class="desc"><?= $corso['descrizione'] ?></p>
                </div>
            <?php endforeach; ?>
        </article>

    </main>


    <?php include 'partials/footer.view.php'?>
</body>
</html>
