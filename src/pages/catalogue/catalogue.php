<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once "../../components/utils/headMetadata.html"?>
    <title>Travel Catalogue</title>
    <link rel="stylesheet" href="catalogue.css">
    <base href="../../">
</head>

<body>
    <?php require_once "../../components/header/header.php"?>
    <div class="hero">
        <div id="hero__search-ct" class="position-absolute d-flex align-items-center flex-column">
            <h1 class="text-center">Choose Your Interstellar Experience</h1>
            <div id="hero__search__choose" class="menu">
                <ul>
                    <li><a id="hero__search__choose__whereLink" href="#">Where</a></li>
                    <li><a id="hero__search__choose__budgetLink" href="#">Budget</a></li>
                    <li><a id="hero__search__choose__periodLink" href="#">Period</a></li>
                </ul>
            </div>
            <div id="hero__search__choosed-ct" class="d-flex flex-column align-items-center justify-content-center">
                <div id="hero__search__choosed__search" class="hero__search__choosed__item">
                    <input type="text" name="search" placeholder="Where would you like to go?">
                </div>
                <div id="hero__search__choosed__budget" class=" d-flex flex-row align-items-center justify-content-between hero__search__choosed__item menu">
                    <span><b>Budget</b></span>
                    <ul>
                        <li><a href="#">&#60 2000</a></li>
                        <li><a href="#">2000 &#124 3000</a></li>
                        <li><a href="#">3000 &#124 4000</a></li>
                        <li><a href="#">&#62 4000</a></li>
                    </ul>
                </div>
                <div id="hero__search__choosed__period" class="d-flex flex-row align-items-center justify-content-between hero__search__choosed__item">
                    <span><b>Period</b></span>
                    <div>
                        <div class="dropdown">
                            <button class="dropbtn" type="button">Seasons</button>
                            <div class="dropdown-content">
                                <a href="#">Winter</a>
                                <a href="#">Spring</a>
                                <a href="#">Summer</a>
                                <a href="#">Autumn</a>
                            </div>
                        </div>
                        <div class="dropdown">
                            <button class="dropbtn" type="button">Months</button>
                            <div class="dropdown-content">
                                <a href="#">January</a>
                                <a href="#">February</a>
                                <a href="#">March</a>
                                <a href="#">April</a>
                                <a href="#">May</a>
                                <a href="#">June</a>
                                <a href="#">July</a>
                                <a href="#">August</a>
                                <a href="#">September</a>
                                <a href="#">October</a>
                                <a href="#">November</a>
                                <a href="#">December</a>
                            </div>
                        </div>
                        <div class="dropdown">
                            <button class="dropbtn" type="button">Years</button>
                            <div class="dropdown-content">
                                <a href="#">2025</a>
                                <a href="#">2026</a>
                                <a href="#">2027</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="parallax"></div>
    </div>
    <main>
        <!-- Planets -->
        <h2 class="text-uppercase">Planets</h2>
        <h3>Embark on journeys to the most fascinating planets across the universe, each offering unique landscapes and experiences</h3>
        <div class="catalogue__separator"></div>
        <div id="catalogue__planets" class="d-grid catalogue">
            <div class="catalogue__item d-flex flex-column align-items-center justify-content-center">
                <a href="pages/catalogue/catalogue-items/planets/mercury.php">
                    <img class="responsive" src="assets/images/nasa/planets/mercury.jpg" alt="Mercury">
                </a>
                <div class="catalogue__item__text">
                    <b>Mercury</b>
                </div>
                <a href="backend/addToCart.php?id=10006" style="color: #1fe100"> prova add</a>
            </div>
            <div class="catalogue__item d-flex flex-column align-items-center justify-content-center">
                <a href="pages/catalogue/catalogue-items/planets/venus.php">
                    <img class="responsive" src="assets/images/nasa/planets/venus.jpg" alt="Venus">
                </a>
                <div class="catalogue__item__text">
                    <b>Venus</b>
                </div>
            </div>
            <div class="catalogue__item d-flex flex-column align-items-center justify-content-center">
                <a href="pages/catalogue/catalogue-items/planets/mars.php">
                    <img class="responsive" src="assets/images/nasa/planets/mars.jpg" alt="Mars">
                </a>
                <div class="catalogue__item__text">
                    <b>Mars</b>
                </div>
            </div>
            <div class="catalogue__item d-flex flex-column align-items-center justify-content-center">
                <a href="pages/catalogue/catalogue-items/planets/jupiter.php">
                    <img class="responsive" src="assets/images/nasa/planets/jupiter.jpg" alt="Jupiter">
                </a>
                <div class="catalogue__item__text">
                    <b>Jupiter</b>
                </div>
            </div>
            <div class="catalogue__item d-flex flex-column align-items-center justify-content-center">
                <a href="pages/catalogue/catalogue-items/planets/saturn.php">
                    <img class="responsive" src="assets/images/nasa/planets/saturn.jpg" alt="Saturn">
                </a>
                <div class="catalogue__item__text">
                    <b>Saturn</b>
                </div>
            </div>
            <div class="catalogue__item d-flex flex-column align-items-center justify-content-center">
                <a href="pages/catalogue/catalogue-items/planets/uranus.php">
                    <img class="responsive" src="assets/images/nasa/planets/uranus.jpg" alt="Uranus">
                </a>
                <div class="catalogue__item__text">
                    <b>Uranus</b>
                </div>
            </div>
            <div class="catalogue__item d-flex flex-column align-items-center justify-content-center">
                <a href="pages/catalogue/catalogue-items/planets/neptune.php">
                    <img class="responsive" src="assets/images/nasa/planets/neptune.jpg" alt="Neptune">
                </a>
                <div class="catalogue__item__text">
                    <b>Neptune</b>
                </div>
            </div>
            <div class="catalogue__item d-flex flex-column align-items-center justify-content-center">
                <a href="pages/catalogue/catalogue-items/planets/pluto.php">
                    <img class="responsive" src="assets/images/nasa/planets/pluto.jpg" alt="Pluto">
                </a>
                <div class="catalogue__item__text">
                    <b>Pluto</b>
                </div>
            </div>
        </div>

        <!-- Galaxies -->
        <h2 class="text-uppercase">Galaxies</h2>
        <h3>For the boldest explorers, venturing beyond the Milky Way is the ultimate adventure. Discover distant galaxies, each holding secrets and wonders that only the most courageous dare to uncover</h3>
        <div class="catalogue__separator"></div>
        <div id="catalogue__galaxies" class="d-grid catalogue">
            <div class="catalogue__item d-flex flex-column align-items-center justify-content-center">
                <a href="pages/catalogue/catalogue-items/galaxies/andromeda.php">
                    <img class="responsive" src="assets/images/nasa/galaxies/andromeda.jpg" alt="Andromeda">
                </a>
                <div class="catalogue__item__text">
                    <b>Andromeda (M31)</b>
                </div>
            </div>
            <div class="catalogue__item d-flex flex-column align-items-center justify-content-center">
                <a href="pages/catalogue/catalogue-items/galaxies/triangulum.php">
                    <img class="responsive" src="assets/images/nasa/galaxies/triangulum.jpg" alt="Triangulum Galaxy">
                </a>
                <div class="catalogue__item__text">
                    <b>Triangulum (M33)</b>
                </div>
            </div>
            <div class="catalogue__item d-flex flex-column align-items-center justify-content-center">
                <a href="pages/catalogue/catalogue-items/galaxies/whirlpool.php">
                    <img class="responsive" src="assets/images/nasa/galaxies/whirlpool.jpg" alt="Whirlpool Galaxy">
                </a>
                <div class="catalogue__item__text">
                    <b>Whirlpool (M51)</b>
                </div>
            </div>
            <div class="catalogue__item d-flex flex-column align-items-center justify-content-center">
                <a href="pages/catalogue/catalogue-items/galaxies/pinwheel.php">
                    <img class="responsive" src="assets/images/nasa/galaxies/pinwheel.jpg" alt="Pinwheel Galaxy">
                </a>
                <div class="catalogue__item__text">
                    <b>Pinwheel (M101)</b>
                </div>
            </div>
        </div>

        <!-- Moons -->
        <h2 class="text-uppercase">Natural Satellites (Moons)</h2>
        <h3>Explore the unique wonders of our solar system's moons, from Earth's own companion to the distant icy worlds, each offering a distinct cosmic experience</h3>
        <div class="catalogue__separator"></div>
        <div id="catalogue__moons" class="d-grid catalogue">
            <div class="catalogue__item d-flex flex-column align-items-center justify-content-center">
                <a href="pages/catalogue/catalogue-items/moons/moon.php">
                    <img class="responsive" src="assets/images/nasa/moons/moon.jpg" alt="Moon">
                </a>
                <div class="catalogue__item__text">
                    <b>Moon (Earth)</b>
                </div>
            </div>
            <div class="catalogue__item d-flex flex-column align-items-center justify-content-center">
                <a href="pages/catalogue/catalogue-items/moons/titan.php">
                    <img class="responsive" src="assets/images/nasa/moons/titan.jpg" alt="Titan">
                </a>
                <div class="catalogue__item__text">
                    <b>Titan (Saturn)</b>
                </div>
            </div>
            <div class="catalogue__item d-flex flex-column align-items-center justify-content-center">
                <a href="pages/catalogue/catalogue-items/moons/europa.php">
                    <img class="responsive" src="assets/images/nasa/moons/europa.jpg" alt="Europa">
                </a>
                <div class="catalogue__item__text">
                    <b>Europa (Jupiter)</b>
                </div>
            </div>
            <div class="catalogue__item d-flex flex-column align-items-center justify-content-center">
                <a href="pages/catalogue/catalogue-items/moons/enceladus.php">
                    <img class="responsive" src="assets/images/nasa/moons/enceladus.jpg" alt="Enceladus">
                </a>
                <div class="catalogue__item__text">
                    <b>Enceladus (Saturn)</b>
                </div>
            </div>
        </div>

        <!-- Nebulae -->
        <h2 class="text-uppercase">Nebulae</h2>
        <h3>Immerse yourself in the ethereal beauty of cosmic clouds. These vibrant, star-forming regions of space offer breathtaking views and a chance to witness the birthplace of stars and planets</h3>
        <div class="catalogue__separator"></div>
        <div id="catalogue__nebulae" class="d-grid catalogue">
            <div class="catalogue__item d-flex flex-column align-items-center justify-content-center">
                <a href="pages/catalogue/catalogue-items/nebulae/tarantula.php">
                    <img class="responsive" src="assets/images/nasa/nebulae/tarantula.jpg" alt="Tarantula Nebula">
                </a>
                <div class="catalogue__item__text">
                    <b>Tarantula</b>
                </div>
            </div>
            <div class="catalogue__item d-flex flex-column align-items-center justify-content-center">
                <a href="pages/catalogue/catalogue-items/nebulae/horsehead.php">
                    <img class="responsive" src="assets/images/nasa/nebulae/horsehead.jpg" alt="Horsehead Nebula">
                </a>
                <div class="catalogue__item__text">
                    <b>Horsehead</b>
                </div>
            </div>
            <div class="catalogue__item d-flex flex-column align-items-center justify-content-center">
                <a href="pages/catalogue/catalogue-items/nebulae/heagle.php">
                    <img class="responsive" src="assets/images/nasa/nebulae/eagle.jpg" alt="Eagle Nebula">
                </a>
                <div class="catalogue__item__text">
                    <b>Eagle</b>
                </div>
            </div>
            <div class="catalogue__item d-flex flex-column align-items-center justify-content-center">
                <a href="pages/catalogue/catalogue-items/nebulae/carina.php">
                    <img class="responsive" src="assets/images/nasa/nebulae/carina.jpg" alt="Carina Nebula">
                </a>
                <div class="catalogue__item__text">
                    <b>Carina</b>
                </div>
            </div>
            <div class="catalogue__item d-flex flex-column align-items-center justify-content-center">
                <a href="pages/catalogue/catalogue-items/nebulae/helix.php">
                    <img class="responsive" src="assets/images/nasa/nebulae/helix.jpg" alt="Helix Nebula">
                </a>
                <div class="catalogue__item__text">
                    <b>Helix</b>
                </div>
            </div>
        </div>
    </main>
    <?php require_once "../../components/footer/footer.html"?>
    <script src="pages/catalogue/catalogue.js"></script>
</body>

</html>