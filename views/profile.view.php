<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="../style/public/user/profile.css">
    <title>Profilo - MW</title>

</head>
<body>
    <!--Loader-->
    <?php include "partials/loader.view.php"; ?>

    <!-- Navbar -->
    <?php include 'partials/navbar.view.php' ?>

    <main>
        <h1>Bentornata/o <?php echo $_SESSION['user']['name'] ?></h1>
        <form method="post" action="/logout">
            <input type="submit" value="Logout" class="log-button">
        </form>
        <a class="delete-profile" href="#">Richiedi la chiusura del profilo</a>

        <section class="data">
            <h2>I tuoi dati</h2>
            <ul>
                <li>Nome e cognome: <?php echo $_SESSION['user']['name'] ?></li>
                <li>Username: <?php echo $_SESSION['user']['username'] ?></li>
                <li>Email: <?php echo $_SESSION['user']['email'] ?></li>
            </ul>
        </section>

        <section class="book">
            <h2>Le tue prenotazioni</h2>
            <p class="dsc-book">Controlla le tue prenotazioni, in modo da vedere il tuo storico delle lezioni</p>
            <div class="prenotazioni">
                <div class="pren menu">
                    <p>ID</p>
                    <p>Prezzo</p>
                    <p>Data e ora</p>
                    <p>Corso</p>
                </div>
                <?php foreach ($prenotazioni as $prenotazione): ?>
                    <div class="pren">
                        <p><?= $prenotazione['id'] ?></p>
                        <p><?= $prenotazione['prezzo'] ?>€</p>
                        <p><?= $prenotazione['data'] ?></p>
                        <p><?= $prenotazione['titolo'] ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
    </main>




    <!-- Footer -->
    <?php include "partials/footer.view.php" ?>
</body>
</html>
