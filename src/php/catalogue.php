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
        <h2 class="text-uppercase">Planets</h2>
        <h3><small>Embark on journeys to the most fascinating planets across the universe, each offering unique landscapes and experiences</small></h3>
        <div class="catalogue__separator"></div>
        <div id="catalogue__milky" class="d-grid catalogue">
            <div class="catalogue__item d-flex flex-column align-items-center justify-content-center">
                <a href="">
                    <img class="responsive" src="img/nasa/planets/mercury.jpg" alt="Mercury">
                </a>
                <div class="catalogue__item__text">
                    <small><b>Mercury</b></small>
                </div>
                <button type="button">Add to cart</button>
            </div>
            <div class="catalogue__item d-flex flex-column align-items-center justify-content-center">
                <a href="">
                    <img class="responsive" src="img/nasa/planets/venus.jpg" alt="Mercury">
                </a>
                <div class="catalogue__item__text">
                    <small><b>Venus</b></small>
                </div>
                <button type="button">Add to cart</button>
            </div>
            <div class="catalogue__item d-flex flex-column align-items-center justify-content-center">
                <a href="">
                    <img class="responsive" src="img/nasa/planets/mars.jpg" alt="Mercury">
                </a>
                <div class="catalogue__item__text">
                    <small><b>Mars</b></small>
                </div>
                <button type="button">Add to cart</button>
            </div>
            <div class="catalogue__item d-flex flex-column align-items-center justify-content-center">
                <a href="">
                    <img class="responsive" src="img/nasa/planets/jupiter.jpg" alt="Mercury">
                </a>
                <div class="catalogue__item__text">
                    <small><b>Jupiter</b></small>
                </div>
                <button type="button">Add to cart</button>

            </div>
            <div class="catalogue__item d-flex flex-column align-items-center justify-content-center">
                <a href="">
                    <img class="responsive" src="img/nasa/planets/saturn.jpg" alt="Mercury">
                </a>
                <div class="catalogue__item__text">
                    <small><b>Saturn</b></small>
                </div>
                <button type="button">Add to cart</button>

            </div>
            <div class="catalogue__item d-flex flex-column align-items-center justify-content-center">
                <a href="">
                    <img class="responsive" src="img/nasa/planets/uranus.jpg" alt="Mercury">
                </a>
                <div class="catalogue__item__text">
                    <small><b>Uranus</b></small>
                </div>
                <button type="button">Add to cart</button>

            </div>
            <div class="catalogue__item d-flex flex-column align-items-center justify-content-center">
                <a href="">
                    <img class="responsive" src="img/nasa/planets/neptune.jpg" alt="Mercury">
                </a>
                <div class="catalogue__item__text">
                    <small><b>Neptune</b></small>
                </div>
                <button type="button">Add to cart</button>

            </div>
            <div class="catalogue__item d-flex flex-column align-items-center justify-content-center">
                <a href="">
                    <img class="responsive" src="img/nasa/planets/pluto.jpg" alt="Mercury">
                </a>
                <div class="catalogue__item__text">
                    <small><b>Pluto</b></small>
                </div>
                <button type="button">Add to cart</button>
            </div>
        </div>
        <h2 class="text-uppercase">Galaxy</h2>
        <h3><small>For the boldest explorers, venturing beyond the Milky Way is the ultimate adventure. Discover distant galaxies, each holding secrets and wonders that only the most courageous dare to uncover</small></h3>
        <div class="catalogue__separator"></div>
        <div id="catalogue__beyondMilky" class="d-grid catalogue">
            <div class="catalogue__item d-flex flex-column align-items-center justify-content-center">
                <a href="">
                    <img class="responsive" src="img/nasa/moon.jpg" alt="Mercury">
                </a>
                <div class="catalogue__item__text">
                    <small><b>Andromeda Galaxy</b></small>
                </div>
                <button type="button">Add to cart</button>
            </div>
            <div class="catalogue__item d-flex flex-column align-items-center justify-content-center">
                <a href="">
                    <img class="responsive" src="img/nasa/moon.jpg" alt="Mercury">
                </a>
                <div class="catalogue__item__text">
                    <small><b>Triangulum Galaxy (M33)</b></small>
                </div>
                <button type="button">Add to cart</button>
            </div>
        </div>
    </main>
</body>

</html>