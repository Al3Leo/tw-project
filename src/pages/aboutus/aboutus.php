<!DOCTYPE html>
<html lang="it">
<head>
    <?php require_once "../../components/utils/headMetadata.html"?>
    <title>About us</title>
    <!-- Unifica gli stili CSS, se necessario -->
    <link rel="stylesheet" href="Global.css">
    <link rel="stylesheet" href="aboutUs.css">
    <base href="../../" />
</head>
<body>
    <?php require_once '../../components/header/header.php' ?>
    <div class="ourMission">
        <header>
            <h1>About Us</h1>
        </header>

        <div class="text">
            <div class="text-box">
                <h2>Our Mission</h2>
                <p>
                    Il nostro progetto mira a creare un sito web accattivante e funzionale dedicato ai viaggi spaziali, un tema che rappresenta il futuro
                    dell'esplorazione e della conoscenza umana. Vogliamo offrire agli utenti un'esperienza immersiva, combinando contenuti informativi,
                    design interattivo e tecnologia innovativa.
                </p>
            </div>
            <div class="image">
                <img src="pages/aboutus/viaggi-spaziali.jpg" alt="Missione Spaziale">
            </div>
        </div>

        <div class="finalGoal">
            <div class="text-box">
                <h2>Final Goal</h2>
                <p>
                    Creare un sito che non solo informi, ma anche entusiasmi le persone, accendendo la passione per i viaggi nello spazio. Che si tratti di
                    scoprire nuove missioni, esplorare destinazioni interplanetarie o semplicemente sognare il futuro dell'umanità tra le stelle, il 
                    nostro progetto vuole essere un punto di riferimento per chi guarda oltre l'orizzonte terrestre.
                </p>
            </div>
            <div class="image">
                <img src="pages/aboutus/spazio.jpg" alt="Obiettivo Finale">
            </div>
        </div>
    </div>

    <script src="assets/js/slideshow.js"></script>
    <?php require_once "../../components/footer/footer.html"?>
</body>
</html>
