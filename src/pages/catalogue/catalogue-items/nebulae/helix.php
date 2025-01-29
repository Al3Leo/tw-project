
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    session_start();
    /* 
     * La variabile é impostata con il nome del corpo celeste e consente di automatizzare 
     * le query sql e il codice js per il fetch delle rest api. Non dovrebbe essere
     * necessario modificare altri parametri per i contenuti generati dinamicamente.
     */
    $nomeEvento = 'Helix';
    require_once '../../../../components/utils/headMetadata.html';
    require_once "../../../../backend/ConnettiDb.php";  //connette il db
    ?>
    <title><?php echo $nomeEvento ?></title>
    <link rel="stylesheet" href="../catalogue-items.css">
    <base href="../../../../" /> <!-- torna in src-->

    <style> 
        .parallax{
            background-image: url(<?php echo "assets/images/nasa/nebulae/" . lcfirst($nomeEvento) ?>);  /* uppercase sulla prima lettera */
            background-position: bottom 100px right 0;
        }
    </style>
</head>

<body>
    <?php
    require_once "../../../../components/header/header.php";
    require_once "../../../../backend/getAllUniqueTrips.php"; //preleva tutti i viaggi univoci dal db
    require_once "../../../../backend/getTripInfo.php"; //preleva tutte le info associate al viaggio verso Venere
    require_once "../../../../components/tripDates/tripdates.php";  // includo il popup per le date
    ?> <!-- Importo il popup per le date -->
    <div class="hero">
        <div class="parallax"></div>
        <div class="hero__text">
            <h1 class="text-center"><?php echo $nomeEvento ?></h1>
            <p id="capitalize">
                <a href="https://science.nasa.gov/mission/hubble/science/explore-the-night-sky/hubble-messier-catalog/messier-31/">Helix</a> is one of the closest and most detailed planetary nebulae observed from Earth. Known as the "Eye of God," it reveals the remnants of a dying star, showcasing vibrant colors and intricate gas patterns. Located about 650 light-years away, this celestial wonder provides insights into the final stages of stellar evolution.<br>Helix is <b>extraordinary</b> due to its striking appearance and scientific importance. Its delicate structure, illuminated by the central white dwarf, offers a breathtaking view of cosmic transformation, making it a must-see destination for deep-space exploration.
            </p>
        </div>
    </div>
    <main id="main" class="d-flex flex-row">
        <div class="main__left">
            <h2 class="text-center">Travel Info</h2>
            <p>Welcome to the Helix Nebula, an awe-inspiring planetary nebula that offers an incredible glimpse into the universe’s life cycle. This journey will allow you to witness a cosmic masterpiece up close, experiencing the stunning interplay of gas and light in one of space’s most iconic locations.</p>
            <div class="main__left__section1 d-flex flex-row justify-content-center align-items-center">
                <div class="main__left__section1__date d-flex flex-column align-items-center justify-content-around">
                    <span class="price">
                        <?php
                        if (isset($infoArray)) {
                            $event = $infoArray[$nomeEvento][0]; //accedo al primo evento associato a venere ($nomeEvento)
                            echo $event['prezzoevento'];    //accedo al campo del prezzo del sottoarray
                        }
                        ?>
                        &#8364;</span>
                    <div class="main__left__section1__date__days d-flex flex-row align-items-center justify-content-between">
                        <i class="fa-solid fa-calendar-days fa-beat fa-xl" style="color: #ffffff;"></i>
                        <span class="days">
                            <?php
                            if (isset($infoArray)) {
                                $event = $infoArray[$nomeEvento][0]; //accedo al primo evento associato a venere ($nomeEvento)
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
                        <li><p><span>Central White Dwarf:</span> Observe the remnant core of the original star illuminating the nebula.</p></li>
                        <li><p><span>Gas Rings:</span> Explore the beautifully structured rings of ionized gas expanding into space.</p></li>
                        <li><p><span>Interstellar Shockwaves:</span> Witness the effects of stellar winds shaping the nebula’s form.</p></li>
                        <li><p><span>Cosmic Dust:</span> Discover the intricate dust formations scattered within the nebula.</p></li>
                    </ol>
                </div>
            </div>
            <div class="main__left__tripKnowledge">
                <h3 class="text-center">Everything you need to know about this trip</h3>
                <p>Embark on an unforgettable journey to <b>Andromeda!</b> This galaxy offers <b>breathtaking sights</b>, unique cosmic phenomena, and a deep connection to the mysteries of the universe. Equip yourself with specialized space travel gear and follow our expert guides for a safe and enriching experience. Learn about Andromeda's historical significance in astronomy and its role in shaping our understanding of galaxies. The trip lasts 10 days, featuring daily excursions and moments of reflection in our cutting-edge space facilities. Feel free to tailor your journey to your specific interests for the ultimate cosmic adventure!
                    Feel free to adjust or expand upon these sections as needed for your site. Let me know if there's anything else you'd like to add!
                </p>
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
    require_once "../../../../components/footer/footer.php";
    ?>
    <script src="pages/catalogue/catalogue-items/catalogue-items.js"></script>
    <script type="text/javascript" defer>
    //abilito il download in parallelo e l'esecuzione dello script solo dopo che il DOM é stato completamente caricato
    document.addEventListener("DOMContentLoaded", () => {
        //passo la variabile php contenente il nome del corpo celeste corrente a js
        const celestialBody = "<?php echo $nomeEvento ?>";
        const eventsArray = <?php echo $jsonUniqueEventsArray; ?> //prelevo l'array contenente i nomi di tutti i viaggi
        call_lso_api(celestialBody);
        fillSuggestions(celestialBody, eventsArray); //crea i suggerimenti nella parte bassa della pagina
    });
</script>
</body>

</html>