<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="../style/private/dati/show.css">
    <title>Admin - Dati</title>

</head>
<body>
<div class="page" id="page-first">
    <?php include 'partials/aside.view.php'; ?>
    <main>
        <h1>Gestione dei dati</h1>
        <div class="static-data">
            <div class="money">
                <h2>Informazioni finanziarie</h2>
                <div>
                    <p>Guadagni totali </p>
                    <i class="fa-solid fa-coins"></i>
                    <p class="--block"><?= $earn ?> €</p>
                </div>
            </div>
        </div>

        <div class="purchase-db">
            <h2>Database degli acquisti</h2>
            <div class="db">
                <div class="row capital">
                    <p>Email</p>
                    <p>Nome corso</p>
                    <p>Prezzo</p>
                    <p>Data</p>
                </div>
                <div class="under-db">
                    <?php foreach ($all as $dato): ?>
                        <div class="row">
                            <p><?= $dato['email'] ?></p>
                            <p><?= $dato['titolo'] ?></p>
                            <p><?= $dato['prezzo'] ?></p>
                            <p><?= $dato['data'] ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </main>
</div>

</body>
</html>

<script src="/script/private/aside.js"></script>

<!-- Font Awesome -->
<script src="https://kit.fontawesome.com/d30b4a9354.js" crossorigin="anonymous"></script>



