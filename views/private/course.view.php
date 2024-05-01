<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="../style/private/courses/courses.css">
    <title>Admin</title>

</head>
<body>
    <div class="page" id="page-first">
        <?php include 'partials/aside.view.php'; ?>
        <main>
            <h1>Crea e gestisci i tuoi corsi</h1>
            <a href="/admin/addcourse" class="new-course">Nuovo Corso<i class="fa-solid fa-plus"></i></a>

            <div class="db">
                <h3>Database</h3>
                <section>
                    <?php foreach ($need as $ned): ?>
                        <div class="row">
                            <p><?= $ned['titolo'] ?></p>
                            <p><a href="/admin/modifycourse?id=<?= $ned['id'] ?>">Modifica</a></p>
                        </div>
                    <?php endforeach; ?>
                </section>
            </div>
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
