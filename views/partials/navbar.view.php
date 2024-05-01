<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="../style/public/navbar/navbar.css">

    <title>Navbar</title>
</head>
<body>
    <nav id="idNav">
        <div class="logo">
            <h4>
              <a href="/">English Courses</a>
            </h4>
        </div>
        <ul class="nav-links" id="navlink">

            <li><a href="/corsi" class="<?= $_SERVER['REQUEST_URI'] == '/corsi' ? 'here' : ''?>">Corsi</a></li>
            <li><a href="/school" class="<?= $_SERVER['REQUEST_URI'] == '/school' ? 'here' : ''?>">La scuola</a></li>
            <li><a href="/info" class="<?= $_SERVER['REQUEST_URI'] == '/info' ? 'here' : ''?>">Informazioni</a></li>
            <?php if(empty($_SESSION['user'])): ?>
                <li><a href="/login">Accedi</a></li>
            <?php elseif(!$_SESSION['user']['admin']): ?>
                <li><a href="/profile">Profilo</a></li>
            <?php elseif($_SESSION['user']['admin']): ?>
                <li><a href="/admin">AdminPanel</a></li>
            <?php endif; ?>
            
        </ul>
        <div class="burger" id="burger">
            <div class="line1 toggle"></div>
            <div class="line2 toggle"></div>
            <div class="line3 toggle"></div>
        </div>
    </nav>


    <script src="script/public/navbar.js"></script>
</body>
</html>