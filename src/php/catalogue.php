<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Catalogue</title>
    <base href="../">
    <link rel="stylesheet" href="css/catalogue.css">
</head>

<body>
    <?php include_once '../html/TopMenu.html' ?>
    <div class="hero">
        <div id="hero__search-ct" class="position-absolute d-flex flex-column align-items-center">
            <h1 class="text-center">Choose Your Interstellar Experience</h1>
            <input type="text" name="search" id="hero__search" placeholder="Where would you like to go?">
        </div>
        <div class="parallax"></div>
    </div>
    <main>
        <h2 class="text-uppercase">Milky Way</h2>
        <h3><small>Explore the Wonders of the Milky Way</small></h3>
        <div class="catalogue__separator"></div>
        <div id="catalogue__milky" class="d-grid catalogue">
            <div class="catalogue__item d-flex flex-column align-items-center justify-content-center">
                <img class="responsive" src="img/nasa/moon.jpg" alt="Mercury">
                <p><b>Mercury</b></p>
            </div>
            <div class="catalogue__item d-flex flex-column align-items-center justify-content-center">
                <img class="responsive" src="img/nasa/moon.jpg" alt="Mercury">
                <p><b>Venus</b></p>
            </div>
            <div class="catalogue__item d-flex flex-column align-items-center justify-content-center">
                <img class="responsive" src="img/nasa/moon.jpg" alt="Mercury">
                <p><b>Mars</b></p>
            </div>
            <div class="catalogue__item d-flex flex-column align-items-center justify-content-center">
                <img class="responsive" src="img/nasa/moon.jpg" alt="Mercury">
                <p><b>Jupiter</b></p>
            </div>
            <div class="catalogue__item d-flex flex-column align-items-center justify-content-center">
                <img class="responsive" src="img/nasa/moon.jpg" alt="Mercury">
                <p><b>Saturn</b></p>
            </div>
            <div class="catalogue__item d-flex flex-column align-items-center justify-content-center">
                <img class="responsive" src="img/nasa/moon.jpg" alt="Mercury">
                <p><b>Uranus</b></p>
            </div>
            <div class="catalogue__item d-flex flex-column align-items-center justify-content-center">
                <img class="responsive" src="img/nasa/moon.jpg" alt="Mercury">
                <p><b>Neptune</b></p>
            </div>
            <div class="catalogue__item d-flex flex-column align-items-center justify-content-center">
                <img class="responsive" src="img/nasa/moon.jpg" alt="Mercury">
                <p><b>Pluto</b></p>
            </div>
        </div>
    </main>
</body>
</html>