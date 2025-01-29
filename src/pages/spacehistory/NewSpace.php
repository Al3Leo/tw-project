
<?php
/**
 * Pagina principale del progetto "Spatial History"
 * Questo file PHP gestisce la struttura della pagina principale del progetto "Spatial History".
 * Include varie sezioni informative riguardanti lo spazio, i pianeti e i pionieri dell'esplorazione spaziale e uun form per le iscrizioni delle newsletter.
 */
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <?php require_once "../../components/utils/headMetadata.html"?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spatial History</title>
    <link rel="stylesheet" href="NewSpace.css">
    <base href="../../">
</head>

<body>
<?php include_once "../../components/header/header.php"?>
<main id="main_story">
    <section class="video-section">
        <video autoplay muted loop playsinline class="background-video" src="assets/images/space/video_bg.mp4">
            Video cannot be displayed.
        </video>
        <div class="content1" id="content1">
            <h1>True wounderers look up at the space</h1>
            <p>How much do you know about space.<br>
                Learn more about this interesting miracle.<br>
                Stay captivated by the wonders of space, with facts that no one has ever told you before...</p>
        </div>
    </section>

    <section class="slider d-flex">
        <div class="controls d-flex flex-column">
            <div class="up">▲</div>
            <div class="down">▼</div>
        </div>

        <div class="wrapper d-flex">
            <div class="left">
                <div>
                    <h3>The Blue Planet</h3>
                <h2>EARTH</h2>
                <hr>
                <p>Earth, our home planet, is the third rock from the Sun and the only known world teeming with life. 
                    <br>It boasts diverse ecosystems, from lush rainforests to arid deserts. The planet's surface is 71% water, primarily in oceans. 
                    <br>Earth's atmosphere, rich in nitrogen and oxygen, supports life and shields us from harmful solar radiation. 
                    <br>With its dynamic climate and ever-changing landscapes, Earth remains a marvel in the vastness of space.</p>
            </div>

                <div>
                    <h3>The Morning Star</h3>
                <h2>Venus</h2>
                <hr>
                <p>
                    Venus is similar in size and structure to Earth but is
                    shrouded in thick, toxic clouds of sulfuric acid,
                    creating a runaway greenhouse effect.<br> This makes
                    it the hottest planet in our solar system. <br>Venus is often visible just before sunrise or after sunset, earning it the name "The Morning Star."
                </p> </div>
                <div>
                    <h3>The Swift Planet</h3>
                    <h2>Mercury</h2>
                    <hr>
                    <p>
                        Mercury is the smallest planet in our solar system and the closest to the Sun.<br> It's named after the Roman messenger god and zips around the Sun in just 88 Earth days. <br>Despite being so close to the Sun, Mercury has no atmosphere to retain heat, making its temperature fluctuate drastically.
                    </p>
                </div>
                <div>
                    <h3>The Red Planet</h3>
                    <h2>Mars</h2>
                    <hr>
                    <p>
                        Mars is known for its reddish appearance, which comes from iron oxide, or rust, on its surface.<br> Mars has the tallest volcano and the deepest canyon in our solar system.<br> It's a prime candidate for future human exploration due to evidence of ancient water flows.
                    </p>
                </div>
                <div>
                    <h3>The Giant Planet</h3>
                    <h2>Jupiter</h2>
                    <hr>
                    <p>
                        Jupiter is the largest planet in our solar system and is known for its Great Red Spot, a massive storm larger than Earth. This gas giant has a strong magnetic field and more than 75 moons, including Ganymede, the largest moon in the solar system.
                    </p>
                </div>
                <div>
                    <h3>The Ringed Planet</h3>
                    <h2>Saturn</h2>
                    <hr>
                    <p>
                        Saturn is easily recognizable by its stunning ring system, composed of ice and rock particles. This gas giant is mostly made of hydrogen and helium and has over 80 moons, with Titan being the largest and possessing a thick atmosphere.
                    </p>
                </div>
                <div>
                    <h3>The Ice Giant</h3>
                    <h2>Uranus</h2>
                    <hr>
                    <p>
                        Uranus has a bluish color due to methane in its atmosphere and is unique because it rotates on its side. Its axial tilt of 98 degrees means it has extreme seasons. Uranus is surrounded by a faint ring system and has 27 known moons.
                    </p>
                </div>
                <div>
                    <h3>The Windy Planet</h3>
                    <h2>Neptune</h2>
                    <hr>
                    <p>
                        Neptune, the farthest planet from the Sun, is known for its deep blue color and strong winds, which can reach speeds of over 1,500 miles per hour. This ice giant has 14 known moons and a thin ring system.
                    </p>                   
                </div>
            </div>

            <div class="right">
                <div>
                    <img src="assets/images/space/terra.jpg" alt="Earth">
                </div>
                <div>
                    <img src="assets/images/space/venere.jpg" alt="Venus">
                </div>
                <div>
                    <img src="assets/images/space/mercurio.jpg" alt="Mercury">
                </div>
                <div>
                    <img src="assets/images/space/marte.jpg" alt="Mars">
                </div>
                <div>
                    <img src="assets/images/space/giove.jpg" alt="Jupiter">
                </div>
                <div>
                    <img src="assets/images/space/saturno.jpg" alt="Saturn">
                </div>
                <div>
                    <img src="assets/images/space/urano.jpg" alt="Uranus">
                </div>
                <div>
                    <img src="assets/images/space/nettuno.jpg" alt="Neptune">
                </div>
            </div>
        </div>
</section>

    <section class="sezione3">
        <div class="sezione3_text">
            <h2 style="text-transform: uppercase;">Pioneers of Space Exploration</h2>
            <p>Space exploration has been made possible by the <span>courage and determination</span> of many remarkable astronauts. Here are a few who have left an indelible mark on history</p>
        </div>
        <div class="wrapper">

            <div class="card_area d-grid" id="card_area">

            <div class="card">
                <img src="assets/images/space/neil.jpg" alt="Neil Armstrong">
                <div class="overlay" id="overlay">
                    <h5>
                        Neil Armstrong
                    </h5>
                    <p>Neil Armstrong is best known for being the first person to walk on the Moon on July 20, 1969. As the commander of Apollo 11, his famous words, "That's one small step for [a] man, one giant leap for mankind," still resonate as a monumental moment in human history.</p>
                </div>
            </div>

            <div class="card">
            <img src="assets/images/space/valentina.jpg" alt="Valentina Tereshkova">
            <div class="overlay" id="overlay">
                    <h5>
                        Valentina Tereshkova
                    </h5>
                    <p>
                        Valentina Tereshkova, a Soviet cosmonaut, became the first woman to fly in space on June 16, 1963. Her mission aboard Vostok 6 made her an inspiration and a trailblazer for women in space exploration.
                    </p>
            </div></div>

            <div class="card">
            <img src="assets/images/space/sally.jpg" alt="Sally Ride">
            <div class="overlay" id="overlay">
                    <h5>
                    Sally Ride
                    </h5>
                <p>Sally Ride was an American astronaut and the first American woman to fly in space. On June 18, 1983, she flew aboard the Space Shuttle Challenger on mission STS-7. Her historic flight paved the way for future generations of women in space exploration.</p>
            </div></div>
            
            <div class="card">
            <img src="assets/images/space/Yurijpg.jpg" alt="Yuri Gagarin">
                <div class="overlay" id="overlay">
                    <h5>
                        Yuri Gagarin
                    </h5>
                    <p>
                        Yuri Gagarin, a Soviet cosmonaut, became the first human to journey into outer space on April 12, 1961. His spacecraft, Vostok 1, completed an orbit of Earth, making Gagarin an international hero and a symbol of Soviet space achievement.
                    </p>
                </div>
            </div></div> 
        </div>
    </section>

    <section class="sezione4 ">
        <div class="wrapper4 flex-column d-flex">
        <h2>Vostok 1: The Dawn of Human Space Exploration</h2>
            <div class="contenuto4">
                <div><img class="contenuto4_img" src="assets/images/space/vostok.jpg">             
               </div>
                 <p>
                    The Vostok 1 mission, launched on April 12, 1961, marked the <b>first time humans ventured into space</b>. The spacecraft completed a full orbit of the Earth in approximately 108 minutes. It demonstrated the Soviet Union's advanced capabilities in space technology, setting a significant milestone in the space race. The success of Vostok 1 was a testament to the potential of human ingenuity and engineering. This mission opened the doors to future space exploration, inspiring generations to look beyond our planet.
                </p>
            </div>


        </div>
    </section>

    <section class="news-sezione d-flex align-items-center flex-column" id="news-sezione" >
    <div class="news-testo d-flex flex-column"> 
    <h3>Discover the Latest Spaceflight News</h3> 
    <p>Enter a date to find news closest to that day about spaceflights. 
        <br>You will receive updates and information on space events related to the day you choose.</p>
    <form id="newsForm">  
        <input type="date" id="dob" name="dob">   
    </form> </div>
    <div class="news-container card_area d-grid" id="newsContainer" style="display: none;"></div>
    </section>

    <section class="newletter-sezione" id="newsletter">
        <div class="newsletter-container">
            <img id="newsletter-img"
              src="assets/images/space/news.jpg"
              alt="image">
            <div class="newsletter-container-text">
              <h2>Subscribe to our<br>Newsletter</h2>
              <p>Subscribe to our newsletter to receive <br>the lastest ticket offers and stay updated on news about space.<br>Don't miss the change to stay informed!</p>
              <form id="form-newsletter" action="pages/spacehistory/newsletter.php" method="POST">
              <?php if (isset($_GET['status'])): ?> 
                <div class="message"> 
                    <?php if ($_GET['status'] == 'success') { 
                        echo "<p>Email inserted successfully!</p>"; 
                        } elseif ($_GET['status'] == 'error') {
                            echo "<p>Error while inserting the email. Please try again later.</p>"; 
                            } elseif ($_GET['status'] == 'esiste') { 
                                echo "<p>Email is already subscribed to the newsletter.</p>"; 
                                echo "<input type=\"email\" placeholder=\"Email address\" required id=\"email\" name=\"email_news\">"; 
                                echo "<button type=\"submit\">Subscribe</button>";
                                } elseif ($_GET['status'] == 'invalid') { 
                                    echo "<p>Invalid email. Please enter a valid email.</p>"; 
                                    } ?> 
                    </div> 
                <?php else: ?> 
                    <input type="email" placeholder="Email address" required id="email" name="email_news"> 
                    <button type="submit">Subscribe</button> <?php endif; ?>
                </form>
            <span>No spams included</span>
            </div>
        </div>
    </section>
</main>
    <?php include_once "../../components/footer/footer.php"?>
    <script src="pages/spacehistory/NewSpace.js"></script>   
</body>
</html> 
