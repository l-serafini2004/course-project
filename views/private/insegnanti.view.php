<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="../style/private/insegnanti/insegnanti.css">
    <title>Admin - Insegnanti</title>

</head>
<body>
<div class="page" id="page-first">
    <?php include 'partials/aside.view.php'; ?>
    <main>
        <h1>Aggiungi o rimuovi un'insegnante</h1>
        <div class="add-admin">
            <h2>Aggiungi un'insegnante</h2>
            <p>Per aggiungere gli insegnanti controlla che sia registrato al sito e inserisci la sua mail</p>
            <form method="post" action="/admin/teacher">
                <input type="email" name="email">
                <input type="submit" value="Aggiungi">
                <?php if(isset($error['user'])): ?>
                    <span class="error"> <?= $error['user'] ?></span>
                <?php endif; ?>
            </form>
        </div>
        <div class="db-admin">
            <h2>Gestisci gli insegnanti</h2>
            <p class="dsc">Elimina gli insegnanti dal database</p>
            <div class="db">
                <?php foreach ($admin as $a): ?>
                    <div class="row">
                        <p><?= $a['id'] ?></p>
                        <p><?= $a['name'] ?></p>
                        <p><?= $a['email'] ?></p>
                        <form class="el-utente" action="/admin/teacher-destroy" method="post">
                            <input type="hidden" name="id" value="<?= $a['id'] ?>">
                            <input type="submit" value="Elimina insegnanti">
                        </form>
                    </div>
                <?php endforeach; ?>
            </div>
            <?php if(isset($error['del'])): ?>
                <span class="error"><?= $error['del'] ?></span>
            <?php endif; ?>
        </div>
    </main>
</div>

</body>
</html>

<script src="/script/private/aside.js"></script>


