<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Viaggi super spaziali</title>
    <link rel="stylesheet" href="../css/HomePage.css">
    <base href="../"/>
</head>
<body>
    <?php include_once 'TopMenu.html'?>
    <div id="hero">
        <div id="hero__text">
            <h2>Welcome to the Universe</h2>
            <p>Embark on an extraordinary journey beyond the stars. Explore distant planets, witness breathtaking galaxies, and make the impossible your reality. Book your interstellar adventure today and redefine the limits of human exploration!</p>
        </div>
    </div>
    <div id="main" class="d-flex flex-row flex-nowrap justify-content-between align-items-start">
        <div id="main__left" class="d-flex align-items-center flex-column text-center">
            <div id="main__left__img">            
                <img class="responsive" src="img/alien_with_money.png" alt="alien with money">
            </div>
            <div id="main__left__text">
                <h3>Exclusive Launch Offer</h3>
                <p>Be among the first to embark on a journey beyond Earth. Book now and save up to <b>30%</b> on your first space adventure!</p>
                <p><small>Ends in:</small></p>
                <div id="main__left__countdown" class="d-flex">
                    <div>
                        <p id="main__left__countdown__days">00</p>
                        <span>Days</span>
                    </div>
                    <div>
                        <p id="main__left__countdown__hours">00</p>
                        <span>Hours</span>
                    </div>
                    <div>
                        <p id="main__left__countdown__minutes">00</p>
                        <span>Minutes</span>
                    </div>
                    <div>
                        <p id="main__left__countdown__seconds">00</p>
                        <span>Seconds</span>
                    </div>
                </div>
            </div>
            <button type="button">Get Deal!</button>
                
        </div>
        <div id="main__right" class="text-center d-flex flex-column align-items-center">
            <h3>Your Gateway to the Universe</h3>
            <div id="main__right__slideshow">
                <img class="responsive slide" src="img/nasa/jupiter.jpg" alt="slideshow">
                <img class="responsive slide" src="img/nasa/moon.jpg" alt="slideshow">
                <img class="responsive slide" src="img/nasa/kepler.jpg" alt="slideshow">
            </div>
            <div id="main__right__text">
                <h4>Unleash your inner explorer with our tailored interstellar adventures.</h4>
                <p>Whether you're dreaming of walking on the moon, marveling at the rings of Saturn, or witnessing a supernova up close, we make it possible. Our state-of-the-art spacecraft and expert crew ensure a safe and unforgettable journey among the stars</p>
            </div>
            <div id="main__right__buttons">
                <a href=""><button type="button">About us</button></a>
            </div>
        </div>
    </div>
    <script src="js/HomePage.js"></script>
</body>
</html>