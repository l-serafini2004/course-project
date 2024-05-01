<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="../style/private/profilecv/create.css">
    <title>Admin - Modify course</title>

</head>
<body>
<div class="page" id="page-first">
    <?php include 'partials/aside.view.php'; ?>

    <main>
        <h1>Modifica un corso</h1>
        <article class="profilo">
            <h2>Inserisci i dati da modificare</h2>
            <form action="/admin/updatecourse" method="post">
                <div class="dir">
                    <p>Titolo</p>
                    <input type="hidden" name="id" value="<?= $corso['id'] ?>">
                    <input type="text" placeholder="Titolo" name="titolo" value="<?= $corso['titolo'] ?>">
                    <?php if(isset($errors['titolo'])): ?>
                        <span class="error"><?= $errors['titolo'] ?></span>
                    <?php endif; ?>
                </div>
                <div class="dir">
                    <p>Prezzo</p>
                    <input type="number" placeholder="Prezzo" name="prezzo" value="<?= $corso['prezzo'] ?>">
                    <?php if(isset($errors['prezzo'])): ?>
                        <span class="error"><?= $errors['prezzo'] ?></span>
                    <?php endif; ?>
                </div>
                <div class="dir">
                    <p>Descrizione</p>
                    <textarea class="info" name="descrizione"><?= $corso['titolo']?></textarea>
                    <?php if(isset($errors['descrizione'])): ?>
                        <span class="error"><?= $errors['descrizione'] ?></span>
                    <?php endif; ?>
                </div>
                <div class="dir">
                    <p>Body</p>
                    <textarea id="editor" name="body"><?= $corso['titolo']?></textarea>
                    <?php if(isset($errors['body'])): ?>
                        <span class="error"><?= $errors['body'] ?></span>
                    <?php endif; ?>
                </div>
                <div class="dir">
                    <input type="submit" value="Modifica">
                </div>
            </form>
            <form action="/admin/deletecourse" method="post">
                <input type="hidden" value="<?= $corso['id'] ?>" name="id">
                <input type="submit" value="Elimina" class="elimina">
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


