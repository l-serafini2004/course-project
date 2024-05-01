<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="../style/private/utenti/dbutenti.css">
    <title>Admin - DatabaseUtenti</title>

</head>
<body>
    <div class="page" id="page-first">
        <?php include 'partials/aside.view.php'; ?>
        <main>
            <h1>Database utenti</h1>

            <form method="get" action="/admin/dbutenti">
                <input name="param" type="text" placeholder="Cerca gli utenti che ti interessano...">
                <input  type="submit" value="Cerca">
            </form>
            <article class="db" id="container">
                <div class="row">
                    <p>Id</p>
                    <p>Nome</p>
                    <p>Username</p>
                    <p>Email</p>
                </div>
                <?php foreach ($utenti as $utente): ?>
                    <div class="row">
                        <p><?= $utente['id'] ?></p>
                        <p><?= $utente['name'] ?></p>
                        <p><?= $utente['username'] ?></p>
                        <p id="<?= $utente['id'] ?>" class="email-del"><?= $utente['email'] ?></p>
                    </div>
                <?php endforeach; ?>
            </article>
        </main>
    </div>

    <div class="--visible" id="del-window">
        <p class="del-adv">Eliminazione di un utente</p>
        <div class="btn-cnc" id="close"></div>
        <form action="/admin/dbutenti/delete" method="post">
            <p id="nameacc">Account: </p>
            <p>Sei sicuro di voler eliminare il profilo? Tutti i dati a lui associati saranno cancellati!</p>
            <input type="hidden" name="id" id="id">

            <div class="opt">
                <input type="checkbox" required>
                <label>Conferma</label>
            </div>
            <input type="submit" value="Elimina profilo">
        </form>
    </div>

</body>
</html>
<script src="/script/private/aside.js"></script>
<script src="/script/private/dbutenti.js"></script>

<!-- Font Awesome -->
<script src="https://kit.fontawesome.com/d30b4a9354.js" crossorigin="anonymous"></script>