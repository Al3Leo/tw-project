

<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    /* 
     * La variabile é impostata con il nome del corpo celeste e consente di automatizzare 
     * le query sql e il codice js per il fetch delle rest api. Non dovrebbe essere
     * necessario modificare altri parametri per i contenuti generati dinamicamente.
     */
    $nomeEvento = 'Pluto';
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
    require_once "../../../../backend/getTripInfo.php"; //preleva tutte le info associate al viaggio verso Venere
    require_once "../../../../components/tripDates/tripdates.php";  // includo il popup per le date
    ?> <!-- Importo il popup per le date -->
    <div class="hero">
        <iframe src="https://solarsystem.nasa.gov/gltf_embed/2342/" frameborder="0" allow="fullscreen" loading="lazy">
            <img class="responsive" src=<?php echo "assets/images/nasa/planets/" .lcfirst($nomeEvento)?> alt= <?php echo $nomeEvento?> > <!-- fallback -->
        </iframe>
        <div class="hero__text">
            <h1 class="text-center"><?php echo $nomeEvento ?></h1>
            <p id="capitalize">
                <a href=<?php echo "https://science.nasa.gov/" . $nomeEvento ?> target="_blank">Pluto</a> is a <b>dwarf planet</b> located in the Kuiper Belt, a region of icy bodies beyond Neptune. Known for its icy surface and reddish-brown hue, Pluto is a fascinating world with an atmosphere of nitrogen, methane, and carbon monoxide.
                <br>Pluto has five moons, the largest being <b>Charon</b>, which forms a binary system with it. The surface of Pluto features plains of frozen nitrogen and towering ice mountains. Despite being reclassified as a dwarf planet, Pluto remains a symbol of exploration and mystery.
            </p>
        </div>
    </div>
    <main id="main" class="d-flex flex-row">
        <div class="main__left">
            <h2 class="text-center">Travel Info</h2>
            <p>Discover the wonders of Pluto, a world where ice and rock intertwine in a cosmic ballet. This extraordinary journey will immerse you in the beauty of the Kuiper Belt and the secrets of Pluto’s surface. Embark on an adventure like no other!</p>
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
                            <li>
                                <p><span>Tombaugh Regio:</span> Visit the iconic heart-shaped glacier that symbolizes Pluto’s charm.</p>
                            </li>
                            <li>
                                <p><span>Charon:</span> Explore Pluto’s largest moon, known for its deep canyons and mysterious red polar cap.</p>
                            </li>
                            <li>
                                <p><span>Ice Mountains:</span> Marvel at towering ice mountains made of water and nitrogen.</p>
                            </li>
                            <li>
                                <p><span>Kuiper Belt:</span> Learn about the vast region of icy bodies where Pluto resides.</p>
                            </li>
                        </ol>
                    </div>
                </div>
                <div class="main__left__tripKnowledge">
                    <h3 class="text-center">Everything you need to know about this trip</h3>
                    <p>
                        Get ready for a one-of-a-kind experience on <b>Pluto!</b> The planet features <b>surreal landscapes</b>, extreme weather, and a fascinating <b>history</b>. Equip yourself with special space suits to endure the scorching temperatures, and follow our expert guides for a safe and unforgettable journey. Learn about Venus' role in mythology and the scientific discoveries made about this mysterious planet. The trip lasts 10 days, with daily excursions and moments of relaxation at our state-of-the-art facilities.
                        Feel free to adjust or expand upon these sections as needed for your site. Let me know if there's anything else you'd like to add!</p>
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


   