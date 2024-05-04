<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="../style/public/session/create.css">
    <title>Accedi</title>

</head>
<body>
<?php include "partials/loader.view.php" ?>
<main>
    <article>
        <h1>Registrati</h1>
        <form action="" method="post">
            <div class="inp">
                <p>Nome e Cognome</p>
                <input type="text" placeholder="Nome e Cognome" name="name">
                <?php if(isset($errors['name'])): ?>
                    <span class="error"><?= $errors['name'] ?></span>
                <?php endif; ?>
            </div>
            <div class="inp">
                <p>Username</p>
                <input type="text" placeholder="Username" name="username">
                <?php if(isset($errors['username'])): ?>
                    <span class="error"><?= $errors['username'] ?></span>
                <?php endif; ?>
            </div>
            <div class="inp">
                <p>Tipo account</p>
                <select name="type">
                    <option value="0">
                        Utente
                    </option>
                    <option value="1">
                        Professore
                    </option>
                </select>

            </div>
            <div class="inp">
                <p>Email</p>
                <input type="email" placeholder="Email" name="email">
                <?php if(isset($errors['email'])): ?>
                    <span class="error"><?= $errors['email'] ?></span>
                <?php endif; ?>
            </div>
            <div class="inp">
                <p>Passwrd (Maiuscola, Numeri e segni speciali)</p>
                <input type="password" placeholder="Password" name="password">
                <?php if(isset($errors['password'])): ?>
                    <span class="error"><?= $errors['password'] ?></span>
                <?php endif; ?>
                <a href="/login"><span>Hai già un account? Fai il login</span></a>
            </div>

            <input type="checkbox" name="newsletter">
            <label>Iscriviti alla Newsletter</label>
            <br>
            <input type="checkbox" required>
            <label>Accetta i <a href="#" target="_blank">termini e le condizioni</a></label>
            <input type="submit" value="Registrati">
        </form>
    </article>
</main>
</body>
</html>
