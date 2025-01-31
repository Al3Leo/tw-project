<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once "../../components/utils/headMetadata.html" ?>
    <title>Travel Catalogue</title>
    <link rel="stylesheet" href="catalogue.css">
    <base href="../../">
</head>

<body>
    <?php require_once "../../components/header/header.php" ?>
    <div class="hero">
        <div id="hero__search-ct" class="position-absolute d-flex align-items-center flex-column">
            <h1 class="text-center">Choose Your Interstellar Experience</h1>
            <a name="search"></a> <!-- anchor link -->
            <div id="hero__search__choose" class="menu">
                <ul>
                    <li><a id="hero__search__choose__whereLink" href="#">Where</a></li>
                    <li><a id="hero__search__choose__budgetLink" href="#">Budget</a></li>
                    <li><a id="hero__search__choose__typeLink" href="#">Type</a></li>
                    <li><a id="hero__search__choose__showAll" href="#" onclick="restoreCatalogueView(); return false;">Show All</a></li>
                </ul>
            </div>
            <div id="hero__search__choosed-ct" class="d-flex flex-column align-items-center justify-content-center">
                <div id="hero__search__choosed__search" class="hero__search__choosed__item">
                    <input type="text" name="search" id="searchByName" placeholder="Where would you like to go?">
                </div>
                <div id="hero__search__choosed__budget" class=" d-flex flex-row align-items-center justify-content-between hero__search__choosed__item menu">
                    <span><b>Budget</b></span>
                    <ul>
                        <li><a onclick="searchBudget('< 2000')">&#60 2000</a></li>
                        <li><a onclick="searchBudget('2000 | 3000')">2000 &#124 3000</a></li>
                        <li><a onclick="searchBudget('3000 | 4000')">3000 &#124 4000</a></li>
                        <li><a onclick="searchBudget('> 4000') ">&#62 4000</a></li>
                    </ul>
                </div>
                <div id="hero__search__choosed__type" class=" d-flex flex-row align-items-center justify-content-between hero__search__choosed__item menu">
                    <span><b>Type</b></span>
                    <ul>
                        <li><a>Planets</a></li>
                        <li><a>Galaxies</a></li>
                        <li><a>Moons</a></li>
                        <li><a>Nebulae</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="parallax"></div>
    </div>
    <main id="main_catalogue">
        <?php
        require_once "../../backend/ConnettiDb.php";
        require_once "../../backend/getAllUniqueTrips.php";

        $planets = array();
        $moons = array();
        $galaxies = array();
        $nebulae = array();

        /* Divido l'array in sottoarray in base all'etichetta che hanno nel db*/
        if (isset($eventsArray)) {
            foreach ($eventsArray as $eventName => $label) {
                if ($label === "planets") {
                    $planets[$eventName] = $label;
                } elseif ($label === "galaxies") {
                    $galaxies[$eventName] = $label;
                } elseif ($label === "moons") {
                    $moons[$eventName] = $label;
                } elseif ($label === "nebulae") {
                    $nebulae[$eventName] = $label;
                } else {
                    error_log('Label not found!');
                }
            }
        }

        /*
             *  PLANETS
             */

        if (sizeof($planets) != 0) {
            echo "
                    <!-- Planets -->
                    <div id='planets_text' class='main__catalogue__section-title'>
                        <h2 class='text-uppercase'>Planets</h2>
                        <h3>Embark on journeys to the most fascinating planets across the universe, each offering unique landscapes and experiences</h3>
                        <div class='catalogue__separator'></div>
                    </div>
                    <div id='catalogue__planets' class='d-grid catalogue'>
                ";
            foreach ($planets as $eventName => $label) {
                echo "
                        <div class='catalogue__item d-flex flex-column align-items-center justify-content-center' id = '" . $eventName . "'> 
                            <a href='pages/catalogue/catalogue-items/planets/" . $eventName . ".php'>
                                <img class='responsive' src='assets/images/nasa/planets/" . $eventName . ".jpg' alt='" . $eventName . "'>
                            </a>
                            <div class='catalogue__item__text'>
                                <p><b>" . $eventName . "</b></p>
                                <!-- Se priceArray ha un valore imposto il prezzo, altrimenti not found -->
                                <p class='text-center'><small>" . (isset($priceArray) ? $priceArray[$eventName] : 'Price Not Found') . " &dollar;</small></p>   
                            </div>
                        </div>
                    ";
            }
            echo "</div>";
        }

        /*
             *  GALAXIES
             */

        if (sizeof($galaxies) != 0) {
            echo "
                    <!-- Galaxies -->
                    <div id='galaxies_text' class='main__catalogue__section-title'>
                        <h2 class='text-uppercase'>Galaxies</h2>
                        <h3> For the boldest explorers, venturing beyond the Milky Way is the ultimate adventure. Discover distant galaxies, each holding secrets and wonders that only the most courageous dare to uncover</h3>
                        <div class='catalogue__separator'></div>
                    </div>
                    <div id='catalogue__galaxies' class='d-grid catalogue'>

                ";
            foreach ($galaxies as $eventName => $label) {
                echo "
                        <div class='catalogue__item d-flex flex-column align-items-center justify-content-center' id = '" . $eventName . "'> 
                            <a href='pages/catalogue/catalogue-items/galaxies/" . $eventName . ".php'>
                                <img class='responsive' src='assets/images/nasa/galaxies/" . $eventName . ".jpg' alt='" . $eventName . "'>
                            </a>
                            <div class='catalogue__item__text'>
                                <p><b>" . $eventName . "</b></p>
                                <!-- Se priceArray ha un valore imposto il prezzo, altrimenti not found -->
                                <p class='text-center'><small>" . (isset($priceArray) ? $priceArray[$eventName] : 'Price Not Found') . " &dollar;</small></p>   
                            </div>
                        </div>
                    ";
            }
            echo "</div>";
        }

        /*
             *  MOONS
             */

        if (sizeof($moons) != 0) {
            echo "
                    <!-- Moons -->
                    <div id='moons_text' class='main__catalogue__section-title'>
                        <h2 class='text-uppercase'>Natural satellites (moons)</h2>
                        <h3> Explore the unique wonders of our solar system's moons, from Earth's own companion to the distant icy worlds, each offering a distinct cosmic experience </h3>
                        <div class='catalogue__separator'></div>
                    </div>
                    <div id='catalogue__moons' class='d-grid catalogue'>

                ";
            foreach ($moons as $eventName => $label) {
                echo "
                        <div class='catalogue__item d-flex flex-column align-items-center justify-content-center' id = '" . $eventName . "'> 
                            <a href='pages/catalogue/catalogue-items/moons/" . $eventName . ".php'>
                                <img class='responsive' src='assets/images/nasa/moons/" . $eventName . ".jpg' alt='" . $eventName . "'>
                            </a>
                            <div class='catalogue__item__text'>
                                <p><b>" . $eventName . "</b></p>
                                <!-- Se priceArray ha un valore imposto il prezzo, altrimenti not found -->
                                <p class='text-center'><small>" . (isset($priceArray) ? $priceArray[$eventName] : 'Price Not Found') . " &dollar;</small></p>   
                            </div>
                        </div>
                    ";
            }
            echo "</div>";
        }

        /*
             *  NEBULAE
             */

        if (sizeof($nebulae) != 0) {
            echo "
                    <!-- Nebulae -->
                    <div id='nebulae_text' class='main__catalogue__section-title'>
                        <h2 class='text-uppercase'>Nebulae</h2>
                        <h3> Immerse yourself in the ethereal beauty of cosmic clouds. These vibrant, star-forming regions of space offer breathtaking views and a chance to witness the birthplace of stars and planets </h3>
                        <div class='catalogue__separator'></div>
                    </div>
                    <div id='catalogue__nebulae' class='d-grid catalogue'>

                ";
            foreach ($nebulae as $eventName => $label) {
                echo "
                        <div class='catalogue__item d-flex flex-column align-items-center justify-content-center' id = '" . $eventName . "'> 
                            <a href='pages/catalogue/catalogue-items/nebulae/" . $eventName . ".php'>
                                <img class='responsive' src='assets/images/nasa/nebulae/" . $eventName . ".jpg' alt='" . $eventName . "'>
                            </a>
                            <div class='catalogue__item__text'>
                                <p><b>" . $eventName . "</b></p>
                                <!-- Se priceArray ha un valore imposto il prezzo, altrimenti not found -->
                                <p class='text-center'><small>" . (isset($priceArray) ? $priceArray[$eventName] : 'Price Not Found') . " &dollar;</small></p>   
                            </div>
                        </div>
                    ";
            }
            echo "</div>";
        }
        ?>
    </main>
    <?php require_once "../../components/footer/footer.php" ?>
    <script src="pages/catalogue/catalogue.js" defer></script>
    <script src="pages/catalogue/add_ajax.js"></script>
</body>

</html>