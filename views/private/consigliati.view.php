<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="../style/private/consigliati/create.css">
    <title>Admin - DatabaseUtenti</title>

</head>
<body>
<div class="page" id="page-first">
    <?php include 'partials/aside.view.php'; ?>
    <main>
        <h1>Corsi consigliati</h1>

        <div class="cons-create">
            <form method="post" action="/admin/consigliati">
                <h2>Inserisci un corso da consigliare ai tuoi alunni</h2>
                <div class="inp">
                    <p>Titolo</p>
                    <input type="text" name="nome_corso">
                    <?php if(isset($error['nome_corso'])): ?>
                        <p class="error"><?= $error['nome_corso'] ?></p>
                    <?php endif; ?>
                </div>
                <div class="inp">
                    <p>Link immagine</p>
                    <input type="text" name="img">
                    <?php if(isset($error['img'])): ?>
                        <p class="error"><?= $error['img'] ?></p>
                    <?php endif; ?>
                </div>
                <div class="inp">
                    <p>Link</p>
                    <input type="text" name="link">
                    <?php if(isset($error['link'])): ?>
                        <p class="error"><?= $error['link'] ?></p>
                    <?php endif; ?>
                </div>
                <input type="submit" value="Invia">
            </form>
        </div>
        <div class="cons-delete">
            <h2>Database dei corsi consigliati</h2>
            <div class="db">
                <?php foreach ($courses as $course): ?>
                    <div class="row">
                        <p><?= $course['nome_corso'] ?></p>
                        <p><a href="<?= $course['link'] ?>" target="_blank"><?= $course['link'] ?></a></p>
                        <form action="/admin/destroy-consigliati" method="post">
                            <input type="hidden" value="<?= $course['id'] ?>" name="id">
                            <input type="submit" value="Elimina">
                        </form>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

    </main>

</body>
</html>
<script src="/script/private/aside.js"></script>