<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="../style/public/index/index.css">
    <title>LearnEnglish</title>

</head>
<body>
    <!--Loader-->
    <?php include "partials/loader.view.php"; ?>

    <!-- Navbar -->
    <?php include 'partials/navbar.view.php' ?>

    <?php if(isset($success)): ?>
        <p class="correct-sub"><?= $success ?></p>
    <?php endif; ?>
    <?php if(isset($correct_sub)): ?>
        <p class="correct-sub">Ti sei iscritto con successo alla newsletter, presto ti arriveranno email con offerte imperdibili!</p>
    <?php endif; ?>
    <main>

        <article class="first-page spacer layer1">
            <h1 class="titolo">Corsi di Inglese</h1>
            <div class="under">
                <div class="why left">
                    <h1 class="tit-txt" id="tit-1">Perfeziona il tuo inglese</h1>
                    <div class="underline"></div>
                    <p>
                        Hai bisogno di sostenere un nuovo colloquio di lavoro in lingua inglese? Vuoi semplicemente perfezionarti e diventare iper qualificato in quello che fai? Forse non hai tempo o voglia di metterti a studiare sui libri o di frequentare interminabili corsi in presenza oppure preferisci affidarti a dei corsi online?
                        Noi abbiamo la soluzione che fa per te!
                        Aiutiamo le persone a migliorare le loro prospettive grazie ad una migliore padronanza dell'inglese. Proponiamo colloqui con insegnante madrelingua e se avete problemi di orario offriamo la possibilità di stabilire la durata dei vostri colloqui, scegliendo slot di conversazione che vanno da 15 a 30 minuti nell'orario che preferite.
                    </p>
                </div>
                <div class="top-img">
                    
                </div>
            </div>
        </article>

        <section class="low">
            <article>
                <div class="wri">
                    <h2>Corsi per aziende</h2>
                    <p> Il nostro programma su misura è pensato per migliorare la comunicazione internazionale del tuo team aziendale. Con un docente madrelingua altamente qualificato, i corsi sono adattati alle esigenze specifiche della tua azienda, garantendo un apprendimento rapido ed efficace. Svilupperai competenze linguistiche in ambito professionale, negoziazioni, presentazioni e comunicazione interculturale.</p>
                    <a href="/corsi#comp-section">Scopri</a>
                </div>
                <div class="imge">
                    <img class="rm" src="https://media.istockphoto.com/id/160993168/it/foto/persone-daffari-sul-balcone-guardando-fino-al-cielo.webp?b=1&s=612x612&w=0&k=20&c=5ZBjtxwwpsxOYryH9w5OOEskgrTg9r8YfJpifrNYXFw=" alt="english course">
                </div>
            </article>
            <div class="circle"></div>
            <article>
                <div class="imge">
                    <img class="lm" src="https://media.istockphoto.com/id/1150572112/it/foto/primo-piano-di-una-donna-daffari-sorridente-di-mezza-et%C3%A0.jpg?b=1&s=170667a&w=0&k=20&c=AU47gJ6ljOFou1S2qoUBGhnzt8mYQNG99S1lA7ckzLg=" alt="english course">
                </div>
                <div class="wri">
                    <h2>Chi sono?</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed esse iste deserunt accusantium labore in quibusdam, beatae eius, perspiciatis minima facere, fugiat placeat officia facilis doloremque quo. Sit atque excepturi, sunt voluptatum, laboriosam numquam cupiditate molestiae quia repudiandae non doloribus?</p>
                    <a href="/about">About me</a>
                </div>
            </article>
            <div class="circle"></div>
            <article>
                <div class="wri">
                    <h2>Lezioni private per studenti</h2>
                    <p>Con un docente dedicato, avrai un apprendimento personalizzato, migliorando le tue abilità linguistiche in modo rapido ed efficace. Sia che tu voglia superare gli esami o migliorare la conversazione, siamo qui per aiutarti a raggiungere i tuoi obiettivi accademici con fiducia. Prenota la tua lezione privata oggi e inizia il viaggio verso il successo linguistico!</p>
                    <a href="/corsi#stud-section">Scopri</a>
                </div>
                <div class="imge">
                    <img class="rm" src="https://media.istockphoto.com/id/887447000/photo/business-presentation-in-progress.jpg?b=1&s=170667a&w=0&k=20&c=xLaXqiz_AthFnSbc39T3cWSJiHcnlalj6QerFjyvwo0=" alt="english course">
                </div>
            </article>
        </section>

        <?php if(!isset($_SESSION['user'])): ?>
        <article class="newsletter">
            <h2>Iscriviti alla newsletter per ricecvere promozioni esclusive</h2>
            <p>Ottieni il 10% di sconto per le prime 5 lezioni</p>
            <form method="post" action="/newsletter/update">
                <input name="email" id="email-submit" type="text" placeholder="Inserisci la tua email">
                <input type="submit" value="Iscriviti">
                <?php if(isset($errors['email'])): ?>
                    <label class="error"><?= $errors['email'] ?></label>
                <?php endif; ?>
            </form>
        </article>
        <?php endif; ?>

    </main>

    <!-- Footer -->
    <?php include "partials/footer.view.php" ?>

</body>
</html>
