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
            <h1>Login</h1>
            <form action="/login" method="post">
                <div class="inp">
                    <p>Email</p>
                    <input type="email" placeholder="Email" name="email">
                    <?php if(isset($errors['email'])): ?>
                        <span class="error"><?= $errors['email'] ?></span>
                    <?php endif; ?>
                </div>
                <div class="inp">
                    <p>Passwrd</p>
                    <input type="password" placeholder="Password" name="password">
                    <?php if(isset($errors['password'])): ?>
                        <span class="error"><?= $errors['password'] ?></span>
                    <?php endif; ?>
                    <a href="/forgot"><span>Password dimenticata?</span></a>
                </div>

                <input type="submit" value="Login">

                <div class="fine">
                    <p>Non sei registrato?</p>
                    <a href="/register"><p class="sign">Sign up</p></a>
                </div>
            </form>
        </article>
    </main>
</body>
</html>
