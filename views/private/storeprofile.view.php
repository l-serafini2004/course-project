<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="../style/private/profilecv/create.css">
    <title>Admin</title>

</head>
<body>
<div class="page" id="page-first">
    <?php include 'partials/aside.view.php'; ?>

    <main>
        <?php if(isset($correctUpdate) and $correctUpdate): ?>
            <div class="correct">
                <p>Cambiamenti salvati correttamente</p>
                <i class="fa-solid fa-arrows-rotate"></i>
            </div>
        <?php endif; ?>
        <h1>Crea o modifica il tuo profilo</h1>
        <form action="/logout" method="post">
            <input class="logout" type="submit" value="Logout">
        </form>
        <article class="profilo">
            <h2>Inserisci i tuoi dati</h2>
            <form action="/admin/gestionecv" method="post">
                <div class="dir">
                    <p>Nome e Cognome</p>
                    <input type="text" placeholder="Nome e Cognome" name="name" value="<?php echo (isset($admin['name'])) ? $admin['name'] : ''  ?>">
                    <?php if(isset($errors['name'])): ?>
                        <span class="error"><?= $errors['name'] ?></span>
                    <?php endif; ?>
                </div>
                <div class="dir">
                    <p>Telefono</p>
                    <input type="text" placeholder="Telefono" name="telephone" value="<?php echo (isset($admin['name'])) ? $admin['telephone'] : ''  ?>">
                    <?php if(isset($errors['telephone'])): ?>
                        <span class="error"><?= $errors['telephone'] ?></span>
                    <?php endif; ?>
                </div>
                <div class="dir">
                    <p>Descrizione</p>
                    <textarea id="editor" name="body"><?php echo (isset($admin['body'])) ? $admin['body'] : ''  ?></textarea>
                </div>
                <div class="dir">
                    <p>Informazioni (Inserirne ognuna separata da una virgola)</p>
                    <textarea class="info" name="info"><?php echo (isset($admin['tags'])) ? $admin['tags'] : ''  ?></textarea>
                </div>
                <div class="dir">
                    <p>Immagine</p>
                    <input type="text" placeholder="Image link" name="image" value="<?php echo (isset($admin['image'])) ? $admin['image'] : ''  ?>">
                </div>
                <div class="dir">
                    <p>Facebook</p>
                    <input type="text" placeholder="Facebook link" name="fb-link" value="<?php echo (isset($admin['facebook'])) ? $admin['facebook'] : ''  ?>">
                </div>
                <div class="dir">
                    <p>Linkedin</p>
                    <input type="text" placeholder="Linkedin link" name="lk-link" value="<?php echo (isset($admin['linkedin'])) ? $admin['linkedin'] : ''  ?>">
                </div>
                <div class="dir">
                    <p>Curriculum</p>
                    <input type="text" placeholder="Curriculum" name="cv" value="<?php echo (isset($admin['cv'])) ? $admin['cv'] : ''  ?>">
                </div>
                <div class="dir">
                    <input type="submit" value="Aggiorna">
                </div>
            </form>
        </article>
    </main>
</div>

</body>
</html>

<!--CK-Editor-->
<script src="https://cdn.ckeditor.com/ckeditor5/41.0.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
<script src="/script/private/aside.js"></script>
<!-- Font Awesome -->
<script src="https://kit.fontawesome.com/d30b4a9354.js" crossorigin="anonymous"></script>

