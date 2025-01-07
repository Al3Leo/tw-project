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
        <h3>Embark on journeys to the most fascinating planets across the universe, each offering unique landscapes and experiences</h3>
        <div class="catalogue__separator"></div>
        <div id="catalogue__planets" class="d-grid catalogue">
            <div class="catalogue__item d-flex flex-column align-items-center justify-content-center">
                <a href="">
                    <img class="responsive" src="img/nasa/planets/mercury.jpg" alt="Mercury">
                </a>
                <div class="catalogue__item__text">
                    <b>Mercury</b>
                </div>
                <button type="button">Add to cart</button>
            </div>
            <div class="catalogue__item d-flex flex-column align-items-center justify-content-center">
                <a href="">
                    <img class="responsive" src="img/nasa/planets/venus.jpg" alt="Mercury">
                </a>
                <div class="catalogue__item__text">
                    <b>Venus</b>
                </div>
                <button type="button">Add to cart</button>
            </div>
            <div class="catalogue__item d-flex flex-column align-items-center justify-content-center">
                <a href="">
                    <img class="responsive" src="img/nasa/planets/mars.jpg" alt="Mercury">
                </a>
                <div class="catalogue__item__text">
                    <b>Mars</b>
                </div>
                <button type="button">Add to cart</button>
            </div>
            <div class="catalogue__item d-flex flex-column align-items-center justify-content-center">
                <a href="">
                    <img class="responsive" src="img/nasa/planets/jupiter.jpg" alt="Mercury">
                </a>
                <div class="catalogue__item__text">
                    <b>Jupiter</b>
                </div>
                <button type="button">Add to cart</button>

            </div>
            <div class="catalogue__item d-flex flex-column align-items-center justify-content-center">
                <a href="">
                    <img class="responsive" src="img/nasa/planets/saturn.jpg" alt="Mercury">
                </a>
                <div class="catalogue__item__text">
                    <b>Saturn</b>
                </div>
                <button type="button">Add to cart</button>

            </div>
            <div class="catalogue__item d-flex flex-column align-items-center justify-content-center">
                <a href="">
                    <img class="responsive" src="img/nasa/planets/uranus.jpg" alt="Mercury">
                </a>
                <div class="catalogue__item__text">
                    <b>Uranus</b>
                </div>
                <button type="button">Add to cart</button>

            </div>
            <div class="catalogue__item d-flex flex-column align-items-center justify-content-center">
                <a href="">
                    <img class="responsive" src="img/nasa/planets/neptune.jpg" alt="Mercury">
                </a>
                <div class="catalogue__item__text">
                    <b>Neptune</b>
                </div>
                <button type="button">Add to cart</button>

            </div>
            <div class="catalogue__item d-flex flex-column align-items-center justify-content-center">
                <a href="">
                    <img class="responsive" src="img/nasa/planets/pluto.jpg" alt="Mercury">
                </a>
                <div class="catalogue__item__text">
                    <b>Pluto</b>
                </div>
                <button type="button">Add to cart</button>
            </div>
        </div>
        <h2 class="text-uppercase">Natural Satellites (Moons)</h2>
        <h3>Explore the unique wonders of our solar system's moons, from Earth's own companion to the distant icy worlds, each offering a distinct cosmic experience</h3>
        <div class="catalogue__separator"></div>
        <div id="catalogue__moons" class="d-grid catalogue">
            <div class="catalogue__item d-flex flex-column align-items-center justify-content-center">
                <a href="">
                    <img class="responsive" src="img/nasa/galaxies/andromeda.jpg" alt="Mercury">
                </a>
                <div class="catalogue__item__text">
                    <b>The Moon (Earth)</b>
                </div>
                <button type="button">Add to cart</button>
            </div>
            <div class="catalogue__item d-flex flex-column align-items-center justify-content-center">
                <a href="">
                    <img class="responsive" src="img/nasa/galaxies/andromeda.jpg" alt="Mercury">
                </a>
                <div class="catalogue__item__text">
                    <b>Titan (Saturn)</b>
                </div>
                <button type="button">Add to cart</button>
            </div>
            <div class="catalogue__item d-flex flex-column align-items-center justify-content-center">
                <a href="">
                    <img class="responsive" src="img/nasa/galaxies/andromeda.jpg" alt="Mercury">
                </a>
                <div class="catalogue__item__text">
                    <b>Europa (Jupiter)</b>
                </div>
                <button type="button">Add to cart</button>
            </div>
            <div class="catalogue__item d-flex flex-column align-items-center justify-content-center">
                <a href="">
                    <img class="responsive" src="img/nasa/galaxies/andromeda.jpg" alt="Mercury">
                </a>
                <div class="catalogue__item__text">
                    <b>Enceladus (Saturn)</b>
                </div>
                <button type="button">Add to cart</button>
            </div>
        </div>

        <!-- Galaxies -->
        <h2 class="text-uppercase">Galaxies</h2>
        <h3>For the boldest explorers, venturing beyond the Milky Way is the ultimate adventure. Discover distant galaxies, each holding secrets and wonders that only the most courageous dare to uncover</h3>
        <div class="catalogue__separator"></div>
        <div id="catalogue__galaxies" class="d-grid catalogue">
            <div class="catalogue__item d-flex flex-column align-items-center justify-content-center">
                <a href="">
                    <img class="responsive" src="img/nasa/galaxies/andromeda.jpg" alt="Mercury">
                </a>
                <div class="catalogue__item__text">
                    <b>Andromeda (M31)</b>
                </div>
                <button type="button">Add to cart</button>
            </div>
            <div class="catalogue__item d-flex flex-column align-items-center justify-content-center">
                <a href="">
                    <img class="responsive" src="img/nasa/galaxies/m33.jpg" alt="Mercury">
                </a>
                <div class="catalogue__item__text">
                    <b>Triangulum (M33)</b>
                </div>
                <button type="button">Add to cart</button>
            </div>
            <div class="catalogue__item d-flex flex-column align-items-center justify-content-center">
                <a href="">
                    <img class="responsive" src="img/nasa/galaxies/m51.jpg" alt="Mercury">
                </a>
                <div class="catalogue__item__text">
                    <b>Whirlpool (M51)</b>
                </div>
                <button type="button">Add to cart</button>
            </div>
            <div class="catalogue__item d-flex flex-column align-items-center justify-content-center">
                <a href="">
                    <img class="responsive" src="img/nasa/galaxies/andromeda.jpg" alt="Mercury">
                </a>
                <div class="catalogue__item__text">
                    <b>Pinwheel (M101)</b>
                </div>
                <button type="button">Add to cart</button>
            </div>
        </div>

        <!-- Comets -->
        <h2 class="text-uppercase">Comets</h2>
        <h3>Venture on thrilling journeys to the most iconic comets in the cosmos. Witness the beauty of these celestial wanderers as they streak across the sky, offering a once-in-a-lifetime spectacle for the boldest explorers</h3>
        <div class="catalogue__separator"></div>
        <div id="catalogue__comets" class="d-grid catalogue">
            <div class="catalogue__item d-flex flex-column align-items-center justify-content-center">
                <a href="">
                    <img class="responsive" src="img/nasa/galaxies/andromeda.jpg" alt="Mercury">
                </a>
                <div class="catalogue__item__text">
                    <b>Hale-Bopp</b>
                </div>
                <button type="button">Add to cart</button>
            </div>
            <div class="catalogue__item d-flex flex-column align-items-center justify-content-center">
                <a href="">
                    <img class="responsive" src="img/nasa/galaxies/andromeda.jpg" alt="Mercury">
                </a>
                <div class="catalogue__item__text">
                    <b>Halley's Comet</b>
                </div>
                <button type="button">Add to cart</button>
            </div>
        </div>
    </main>
    <?php require_once '../html/footer.html' ?>
</body>

</html>