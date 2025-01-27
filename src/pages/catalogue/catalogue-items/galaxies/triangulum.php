<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    /* 
     * La variabile è impostata con il nome del corpo celeste e consente di automatizzare 
     * le query sql e il codice js per il fetch delle rest api. Non dovrebbe essere
     * necessario modificare altri parametri per i contenuti generati dinamicamente.
     */
    $nomeEvento = 'Triangulum';
    require_once '../../../../components/utils/headMetadata.html';
    require_once "../../../../backend/ConnettiDb.php";  //connette il db
    ?>
    <title><?php echo $nomeEvento ?></title>
    <link rel="stylesheet" href="../catalogue-items.css">
    <base href="../../../../" /> <!-- torna in src-->
</head>

<body>
    <?php
    require_once "../../../../components/header/header.php";
    require_once "../../../../backend/getAllUniqueTrips.php"; //preleva tutti i viaggi univoci dal db
    require_once "../../../../backend/getTripInfo.php"; //preleva tutte le info associate al viaggio verso Triangulum
    require_once "../../../../components/tripDates/tripdates.php";  // includo il popup per le date
    ?> <!-- Importo il popup per le date -->
    <div class="hero">
        <iframe src="https://solarsystem.nasa.gov/gltf_embed/2388/" frameborder="0" allow="fullscreen" loading="lazy">
            <img class="responsive" src=<?php echo "assets/images/nasa/galaxies/" . lcfirst($nomeEvento) ?> alt=<?php echo $nomeEvento ?>> <!-- fallback -->
        </iframe>
        <div class="hero__text">
            <h1 class="text-center"><?php echo $nomeEvento ?></h1>
            <p id="capitalize">
            <a href=<?php echo "https://science.nasa.gov/" . $nomeEvento ?> target="_blank">Triangulum Galaxy</a> is a stunning spiral galaxy located in the constellation Triangulum. As the third-largest galaxy in our local group, it spans nearly <b>60,000 light-years</b> and contains an abundance of star-forming regions. Known for its beautiful structure and proximity, the Triangulum Galaxy is a key object of study for understanding galactic evolution and star formation.<br>The Triangulum Galaxy offers a mesmerizing glimpse into the universe's complexity and beauty. With its bright nebulae, dynamic star clusters, and intricate details, it has captivated astronomers and space enthusiasts for generations. Join us on an unforgettable journey to this celestial neighbor.
            </p>
        </div>
    </div>
    <main id="main" class="d-flex flex-row">
        <div class="main__left">
            <h2 class="text-center">Travel Info</h2>
            <p>Welcome to the Triangulum Galaxy, a captivating spiral galaxy that offers a unique adventure through the cosmos! Discover its star-forming regions, radiant nebulae, and intricate structure. With our experienced guides, you'll uncover the secrets of this galactic wonder and its place in the universe.</p>
            <div class="main__left__section1 d-flex flex-row justify-content-center align-items-center">
                <div class="main__left__section1__date d-flex flex-column align-items-center justify-content-around">
                    <span class="price">
                        <?php
                        if (isset($infoArray)) {
                            $event = $infoArray[$nomeEvento][0]; //accedo al primo evento associato a Triangulum
                            echo $event['prezzoevento'];    //accedo al campo del prezzo del sottoarray
                        }
                        ?>
                        &#8364;</span>
                    <div class="main__left__section1__date__days d-flex flex-row align-items-center justify-content-between">
                        <i class="fa-solid fa-calendar-days fa-beat fa-xl" style="color: #ffffff;"></i>
                        <span class="days">
                            <?php
                            if (isset($infoArray)) {
                                $event = $infoArray[$nomeEvento][0];
                                $departure = date_create($event['datapartenza']);
                                $return = date_create($event['dataritorno']);
                                $interval = date_diff($return, $departure);
                                echo $interval->format('%a');   /* formatto*/
                            }
                            ?>
                            Days</span>
                    </div>
                    <div class="d-flex flex-row justify-content-between align-items-center main__left__section1__date__btn">
                        <button type="button" class="text-uppercase" onclick="toggleDialog()"> Discover all the dates</button>
                        <a target="_blank" href="pages/support/Supporto.php">
                            <button type="button" class="text-uppercase">More info</button>
                        </a>
                    </div>
                </div>
                <div class="main__left__section1__whatSee">
                    <h3 class="text-center">What to See</h3>
                    <ol>
                        <li>
                            <p><span>Spiral Arms:</span> Admire the galaxy's elegant arms, home to countless stars and cosmic phenomena.</p>
                        </li>
                        <li>
                            <p><span>Star-forming Regions:</span> Discover vibrant stellar nurseries within its luminous nebulae.</p>
                        </li>
                        <li>
                            <p><span>Galactic Core:</span> Witness the dynamic and radiant center of the Triangulum Galaxy.</p>
                        </li>
                        <li>
                            <p><span>Deep-Sky Wonders:</span> Explore breathtaking sights like NGC 604, one of the largest star-forming regions known.</p>
                        </li>
                    </ol>
                </div>
            </div>
            <div class="main__left__tripKnowledge__item">
                        <div class="main__left__tripKnowledge__item__question d-flex justify-content-between align-items-center">
                            <p class="text-center">What's included in the price</p>
                            <span class="main__left__tripKnowledge__arrow">&#x25BC;</span>
                        </div>
                        <div class="main__left__tripKnowledge__item__answer">
                            <ul>
                                <li>
                                    <p><strong>Round-trip Space Transportation</strong>: Comfortable and safe travel from Earth to Venus and back.</p>
                                </li>
                                <li>
                                    <p><strong>Accommodation</strong>: Stay in our state-of-the-art <b>space habitat</b> with all the amenities you need for a comfortable stay.</p>
                                </li>
                                <li>
                                    <p><strong>Guided Tours</strong>: Daily <b>guided tours</b> to explore the most fascinating sites on Venus, led by our expert space guides.</p>
                                </li>
                                <li>
                                    <p><strong>Meals</strong>: Enjoy a variety of <b>gourmet meals</b> prepared by our onboard chefs, including special Venus-themed dishes.</p>
                                </li>
                                <li>
                                    <p><strong>Space Suit Rental</strong>: High-quality <b>space suits</b> provided for your safety and comfort during all outdoor activities.</p>
                                </li>
                                <li>
                                    <p><strong>Pre-trip Training</strong>: Comprehensive <b>training sessions</b> to prepare you for the unique conditions of space travel and Venus exploration (optional).</p>
                                </li>
                                <li>
                                    <p><strong>24/7 Support</strong>: Our team of space travel specialists is available around the clock to assist you with any needs or questions.</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="main__left__tripKnowledge__item">
                        <div class="main__left__tripKnowledge__item__question d-flex justify-content-between align-items-center">
                            <p class="text-center">What's NOT included in the price</p>
                            <span class="main__left__tripKnowledge__arrow">&#x25BC;</span>
                        </div>
                        <div class="main__left__tripKnowledge__item__answer">
                            <b>Optional excursions</b>, tips, personal expenses, lunches and dinners and what is not expressly mentioned under "The fee includes"
                        </div>
                    </div>
                    <div class="main__left__tripKnowledge__item">
                        <div class="main__left__tripKnowledge__item__question d-flex justify-content-between align-items-center">
                            <p class="text-center">Required Documents</p>
                            <span class="main__left__tripKnowledge__arrow">&#x25BC;</span>
                        </div>
                        <div class="main__left__tripKnowledge__item__answer">
                            <p><strong>Passport</strong> is required, with at least six months remaining validity. Entry visa is not necessary.</p>
                        </div>
                    </div>
                </div>
        </div>
        <div class="main__right">
            <div class="main__right__celestialBodyInfo">
                <h3 class="text-center">Celestial Body Info</h3>
                    <!-- La tabella é generata da JS-->
            </div>
        </div>
    </main>
    <div class="suggestions">
        <h4 class="text-center">You might also be interested in</h4>
        <div id="suggestions__carousel-ct" class="slideshow d-flex flex-row">
            <!-- 
                sampleClone. L'elemento seguente viene utilizzato solamente come stampo per la generazione di elementi
                identici tramite js. L'elemento viene successivamente rimosso con js.
            -->
            <div class="suggestions__carousel__item d-flex align-items-center flex-column" id="suggestions__carousel__item-sampleClone">
                <img src="" alt="Celestial Body">
                <p><strong class="suggestions__carousel__item-title"></strong></p>
                <a href="">
                    <button type="button">More Info</button>
                </a>
            </div>
        </div>
    </div>
    <?php
    require_once "../../../../components/footer/footer.html";
    ?>
    <script src="pages/catalogue/catalogue-items/catalogue-items.js"></script>
</body>
<script type="text/javascript" defer > //abilito il download in parallelo e l'esecuzione dello script solo dopo che il DOM é stato completamente caricato
    document.addEventListener("DOMContentLoaded", () => {
        //passo la variabile php contenente il nome del corpo celeste corrente a js
        const celestialBody = "<?php echo $nomeEvento ?>";
        const eventsArray = <?php echo $jsonUniqueEventsArray; ?> //prelevo l'array contenente i nomi di tutti i viaggi
        call_lso_api(celestialBody);
        fillSuggestions(celestialBody, eventsArray); //crea i suggerimenti nella parte bassa della pagina
    });
</script>
</html>






