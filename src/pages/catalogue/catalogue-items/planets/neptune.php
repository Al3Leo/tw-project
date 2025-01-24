<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    /* MODIFICARE SOLO LA VARIABILE $nomeEvento nelle altre pagine!
     *
     * La variabile é impostata con il nome del corpo celeste e consente di automatizzare 
     * le query sql e il codice js per il fetch delle rest api. Non dovrebbe essere
     * necessario modificare altri parametri per i contenuti generati dinamicamente.
     */
    $nomeEvento = 'Neptune';
    require_once '../../../../components/utils/headMetadata.html';
    ?>
    <title><?php echo $nomeEvento ?></title>
    <link rel="stylesheet" href="../catalogue-items.css">
    <base href="../../../../" /> <!-- torna in src-->
</head>

<?php
require_once "../../../../components/header/header.php";
require_once "../../../../backend/ConnettiDb.php";  //connette il db
?>

<body>
    <?php
    require_once "../../../../backend/getAllUniqueTrips.php"; //preleva tutti i viaggi univoci dal db
    require_once "../../../../backend/getTripInfo.php"; //preleva tutte le info associate al viaggio verso Nettuno
    require_once "../../../../components/tripDates/tripdates.php";  // includo il popup per le date
    ?> <!-- Importo il popup per le date -->
    <div class="hero">
        <iframe src="https://solarsystem.nasa.gov/gltf_embed/2373/" frameborder="0" allow="fullscreen" loading="lazy">
            <img class="responsive" src=<?php echo "assets/images/nasa/planets/" .lcfirst($nomeEvento)?> alt= <?php echo $nomeEvento?> > <!-- fallback -->
        </iframe>
        <div class="hero__text">
            <h1 class="text-center"><?php echo $nomeEvento ?></h1>
            <p id="capitalize">
                <a href=<?php echo "https://science.nasa.gov/" . $nomeEvento ?> target="_blank">Neptune</a> is the farthest planet from the Sun in our solar system. Known for its intense blue color, Neptune is the <b>third-largest planet</b> by mass. It experiences the fastest winds in the solar system, reaching up to <b>1,200 miles per hour</b>.
                <br>Neptune is a <b>gas giant</b> with a dynamic atmosphere and a collection of 14 known moons. Its most famous moon, Triton, is thought to be a captured Kuiper Belt object. Neptune's rings are faint but consist of dust and ice particles.
            </p>
        </div>
    </div>
    <main id="main" class="d-flex flex-row">
        <div class="main__left">
            <h2 class="text-center">Travel Info</h2>
            <p>Welcome to Neptune, the windiest planet in the solar system, famous for its stunning blue hue and unique atmospheric phenomena! A journey to this distant giant offers an extraordinary adventure filled with scientific intrigue and breathtaking views. With the right preparation, Neptune will captivate you.</p>
                <div class="main__left__section1 d-flex flex-row justify-content-center align-items-center">
                    <div class="main__left__section1__date d-flex flex-column align-items-center justify-content-around">
                        <span class="price">
                            <?php
                            if (isset($infoArray)) {
                                $event = $infoArray[$nomeEvento][0]; //accedo al primo evento associato a Nettuno ($nomeEvento)
                                echo $event['prezzoevento'];    //accedo al campo del prezzo del sottoarray
                            }
                            ?>
                            &#8364;</span>
                        <div class="main__left__section1__date__days d-flex flex-row align-items-center justify-content-between">
                            <i class="fa-solid fa-calendar-days fa-beat fa-xl" style="color: #ffffff;"></i>
                            <span class="days">
                                <?php
                                if (isset($infoArray)) {
                                    $event = $infoArray[$nomeEvento][0]; //accedo al primo evento associato a Nettuno ($nomeEvento)
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
                                <p><span>The Great Dark Spot:</span> Witness this massive storm system, comparable to Jupiter's Great Red Spot.</p>
                            </li>
                            <li>
                                <p><span>Triton:</span> Explore Neptune's largest moon, known for its retrograde orbit and geysers of liquid nitrogen.</p>
                            </li>
                            <li>
                                <p><span>Faint Rings:</span> Admire the delicate and intricate ring system that surrounds this mysterious planet.</p>
                            </li>
                            <li>
                                <p><span>Cloud Tops:</span> Observe the dynamic and fast-moving clouds in Neptune's upper atmosphere.</p>
                            </li>
                        </ol>
                    </div>
                </div>
                <div class="main__left__tripKnowledge">
                    <h3 class="text-center">Everything you need to know about this trip</h3>
                    <p>
                        Get ready for a one-of-a-kind experience on <b>Neptune!</b> This distant world features <b>intense weather</b>, unique ring structures, and fascinating moons. Equip yourself with specialized suits for the low temperatures and follow our expert guides to uncover Neptune's secrets. Discover the myths associated with the Roman god Neptune and the scientific breakthroughs about this gas giant. The trip lasts 15 days, offering daily excursions and moments of relaxation in our advanced habitats.
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
                                    <p><strong>Round-trip Space Transportation</strong>: Comfortable and safe travel from Earth to Neptune and back.</p>
                                </li>
                                <li>
                                    <p><strong>Accommodation</strong>: Stay in our state-of-the-art <b>space habitat</b> with all the amenities you need for a comfortable stay.</p>
                                </li>
                                <li>
                                    <p><strong>Guided Tours</strong>: Daily <b>guided tours</b> to explore the most fascinating sites on Neptune, led by our expert space guides.</p>
                                </li>
                                <li>
                                    <p><strong>Meals</strong>: Enjoy a variety of <b>gourmet meals</b> prepared by our onboard chefs, including Neptune-themed dishes.</p>
                                </li>
                                <li>
                                    <p><strong>Space Suit Rental</strong>: High-quality <b>space suits</b> provided for your safety and comfort during all outdoor activities.</p>
                                </li>
                                <li>
                                    <p><strong>Pre-trip Training</strong>: Comprehensive <b>training sessions</b> to prepare you for the unique conditions of space travel and Neptune exploration (optional).</p>
                                </li>
                                <li>
                                    <p><strong>24/7 Support</strong>: Our team of space travel specialists is available around the clock to assist you with any needs or questions.</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="main__left__tripKnowledge__item">
                        <div class="main__left__tripKnowledge__item__question d-flex justify-content-between align-items-center">
                           
                        <p class="text-center">FAQs about the trip</p>
                        <span class="main__left__tripKnowledge__arrow">&#x25BC;</span>
                    </div>
                    <div class="main__left__tripKnowledge__item__answer">
                        <ul>
                            <li>
                                <p><strong>Is it safe to travel to Neptune?</strong>: Absolutely! Our advanced space travel technology and experienced crew ensure a safe and smooth journey.</p>
                            </li>
                            <li>
                                <p><strong>What should I pack?</strong>: We recommend lightweight personal items. Specialized gear and suits will be provided by us.</p>
                            </li>
                            <li>
                                <p><strong>Can children participate?</strong>: Yes, but they must be over 10 years old and accompanied by an adult.</p>
                            </li>
                            <li>
                                <p><strong>What happens in case of emergencies?</strong>: Our state-of-the-art habitats and spaceships are equipped with emergency systems and professional medical staff.</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="main__right">
            <h2 class="text-center">Plan Your Adventure</h2>
            <p>
                Take the first step toward your interstellar journey by exploring our detailed plans and schedules. From departure dates to accommodations, we’ve got you covered.
                Don’t miss the opportunity to explore Neptune, a planet of mystery and wonder.
            </p>
            <button type="button" class="text-uppercase" onclick="window.location.href='pages/booking/Booking.php'">
                Book Now
            </button>
        </div>
    </main>
    <?php
    require_once "../../../../components/footer/footer.php"; // include footer
    ?>
    <script src="assets/js/main.js"></script>
    <script>
        // Toggle functionality for the expandable FAQ sections
        document.querySelectorAll('.main__left__tripKnowledge__item').forEach(item => {
            const question = item.querySelector('.main__left__tripKnowledge__item__question');
            const answer = item.querySelector('.main__left__tripKnowledge__item__answer');
            question.addEventListener('click', () => {
                answer.classList.toggle('visible');
            });
        });
    </script>
</body>
</html>