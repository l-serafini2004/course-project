<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="../style/public/forgot/show.css">
    <title>LearnEnglish - MW</title>

</head>
<body>
<!--Loader-->
<?php include "partials/loader.view.php"; ?>

<!-- Navbar -->
<?php include 'partials/navbar.view.php' ?>

<main>
    <form method="get" action="/forgot">

        <?php if(empty($email)): ?>
            <h2>Resetta la tua password</h2>
            <p>Inserisci la tua email</p>
            <input type="email" name="email">

            <!-- Errore email -->
            <?php if(isset($errors['email'])): ?>
                <span class="error"><?= $errors['email'] ?></span>
            <?php endif; ?>
            <input type="submit" value="Invia">
        <?php endif; ?>

        <?php if(!empty($email) and empty($code)): ?>
            <h2>Resetta la tua password</h2>
            <input type="hidden" name="email" value="<?= $email ?>">
            <p>Inserisci il tuo codice</p>
            <input type="text" name="code">

            <!-- Errore codice -->
            <?php if(isset($errors['code'])): ?>
                <span class="error"><?= $errors['code'] ?></span>
            <?php endif; ?>
            <input type="submit" value="Invia">
        <?php endif; ?>





    </form>

    <?php if(empty($errors) and !empty($code)): ?>
        <form method="post" action="/forgot">
            <h2>Resetta la nuova password</h2>
            <p>Inserisci la password</p>
            <input type="hidden" name="email" value="<?= $email ?>">
            <input type="hidden" name="code" value="<?= $code ?>">
            <input type="password" placeholder="Password" name="pass1">
            <input type="password" name="pass2" placeholder="Ripeti password">
            <?php if(isset($error['password'])): ?>
                <p class="error"><?= $error['password'] ?></p>
            <?php endif; ?>
            <input type="submit" value="crea">
        </form>
    <?php endif; ?>

</main>

<!-- Footer -->
<?php include "partials/footer.view.php" ?>

</body>
</html>