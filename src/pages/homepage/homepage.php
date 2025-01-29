<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once "../../components/utils/headMetadata.html" ?>
    <title>Outer Space</title>
    <link rel="stylesheet" href="homepage.css">
    <base href="../../" /> <!-- Torna in /src -->
</head>

<body>
    <?php require_once "../../components/header/header.php" ?>
    <div class="hero">
        <div id="hero__text">
            <h2>Welcome to the Universe</h2>
            <p>Embark on an extraordinary journey beyond the stars. Explore distant planets, witness breathtaking galaxies, and make the impossible your reality. Book your interstellar adventure today and redefine the limits of human exploration!</p>
        </div>
    </div>
    <main id="main" class="d-flex flex-row justify-content-between align-items-start">
        <div id="main__left" class="launch-offer d-flex align-items-center flex-column text-center">
            <div id="main__left__img">
                <img class="responsive" src="assets/images/alien_with_money.png" alt="alien with money">
            </div>
            <div id="main__left__text">
    <?php 
    require_once "../../backend/gestioneCoupon.php";
    if (!isset($_SESSION['username']) || $mostraCoupon == true) { 
    ?>
        <p><b>Exclusive Launch Offer</b></p>
        <p>Be among the first to embark on a journey beyond Earth. Book now and save up to <b>30%</b> on your first space adventure!</p>
        <p><small>Ends in:</small></p>
        <div id="main__left__countdown" class="d-flex">
            <div>
                <p id="main__left__countdown__days">00</p>
                <span>Days</span>
            </div>
            <div>
                <p id="main__left__countdown__hours">00</p>
                <span>Hours</span>
            </div>
            <div>
                <p id="main__left__countdown__minutes">00</p>
                <span>Minutes</span>
            </div>
            <div>
                <p id="main__left__countdown__seconds">00</p>
                <span>Seconds</span>
            </div>
        </div>
        <?php if (!isset($_SESSION['username'])) { ?>
            <button id="getDeal" type="button" onclick="openLoginPopup()">Get Deal!</button>
        <?php } elseif ($mostraCoupon == true) { ?>
            <p><small>A coupon for you!</small></p>
            <button type="button" id="copyToClipboard">PWEDHFRL</button>
        <?php } ?>
    <?php } elseif ($mostraCoupon == false) { ?>
        <p><b>Stay Updated for More Exciting Offers</b></p>
        <p>We hope you enjoyed your recent adventure! Just because you've claimed our current offer doesn't mean the excitement ends here.<br> Make sure to stay tuned for <b>more stellar deals</b> and exclusive promotions:</p>
        <button type="button" onclick="window.open('pages/spacehistory/NewSpace.php#newsletter', '_self')">Stay Tuned!</button>
    <?php } ?>
</div>


        </div>
        <div id="main__right"  style="width:50vw" class="text-center d-flex flex-column align-items-center">
            <h3>Your Gateway to the Universe</h3>
            <div id="main__right__slideshow" class="slideshow">
                <img class="responsive slide" src="assets/images/nasa/moon.jpg" alt="moon">
                <img class="responsive slide" src="assets/images/nasa/kepler.jpg" alt="kepler">
                <img class="responsive slide" src="assets/images/nasa/falcon9-3.jpg" alt="falcon-9">
                <img class="responsive slide" src="assets/images/nasa/galaxies/andromeda.jpg" alt="andromeda">
                <img class="responsive slide" src="assets/images/nasa/satelite.jpg" alt="satelite">
                <img class="responsive slide" src="assets/images/nasa/launch.jpg" alt="space rocket">
                <img class="responsive slide" src="assets/images/nasa/nebulae/carina.jpg" alt="carina nebula">

            </div>
            <div id="main__right__text">
                <h4>Unleash your inner explorer with our tailored interstellar adventures</h4>
                <p>Whether you're dreaming of walking on the moon, marveling at the rings of Saturn, or witnessing a supernova up close, we make it possible. Our state-of-the-art spacecraft and expert crew ensure a safe and unforgettable journey among the stars</p>
            </div>
            <div id="main__right__buttons">
                <a href="pages/aboutus/aboutus.php"><button type="button">About us</button></a>
            </div>
        </div>
    </main>
    <div id="secondary-s" class="d-flex flex-row justify-content-between align-item-center">
        <section class="faq">
            <h3>FAQ - Frequently Asked Question:</h3>
            <div class="faq__item">
                <div class="faq__item__question d-flex justify-content-between align-items-center">
                    <p>Who can travel to space?</p>
                    <span class="faq__item__arrow">&#x25BC</span>
                </div>
                <div class="faq__item__answer">
                    <p>Anyone! Our space journeys are designed to be safe and accessible to everyone, regardless of age or physical condition. If you can board a plane, you can travel to space.</p>
                </div>
            </div>
            <div class="faq__item">
                <div class="faq__item__question d-flex justify-content-between align-items-center">
                    <p>How much does a space trip cost?</p>
                    <span class="faq__item__arrow">&#x25BC</span>
                </div>
                <div class="faq__item__answer">
                    <p>Thanks to cutting-edge technology, space travel is now affordable for everyone! Prices start at $500 for a suborbital flight and increase depending on the destination and trip duration.</p>
                </div>
            </div>
            <div class="faq__item">
                <div class="faq__item__question d-flex justify-content-between align-items-center">
                    <p>What happens during a space trip?</p>
                    <span class="faq__item__arrow">&#x25BC</span>
                </div>
                <div class="faq__item__answer">
                    <p>During the journey, you'll enjoy unique experiences such as floating in zero gravity, spectacular views of deep space, and even gourmet dining with a view of Earth.</p>
                </div>
            </div>
            <div class="faq__item">
                <div class="faq__item__question d-flex justify-content-between align-items-center">
                    <p>Do I need to bring anything?</p>
                    <span class="faq__item__arrow">&#x25BC</span>
                </div>
                <div class="faq__item__answer">
                    <p>No, we've got you covered! Your ticket includes everything you need, from space suits to onboard amenities. Feel free to bring small personal items or keepsakes for the trip.</p>
                </div>
            </div>
            <div class="faq__item">
                <div class="faq__item__question d-flex justify-content-between align-items-center">
                    <p>Are there baggage limits?</p>
                    <span class="faq__item__arrow">&#x25BC</span>
                </div>
                <div class="faq__item__answer">
                    <p>Yes, but nothing complicated! Each traveler can bring one compact personal bag, similar to a standard airline carry-on.</p>
                </div>
            </div>
            <div class="faq__item">
                <div class="faq__item__question d-flex justify-content-between align-items-center">
                    <p>Are meals included on board?</p>
                    <span class="faq__item__arrow">&#x25BC</span>
                </div>
                <div class="faq__item__answer">
                    <p>Absolutely! We offer premium space meals prepared by top chefs, with customizable options to meet all dietary needs.</p>
                </div>
            </div>
            <div class="faq__item">
                <div class="faq__item__question d-flex justify-content-between align-items-center">
                    <p>What's the accommodation like in space?</p>
                    <span class="faq__item__arrow">&#x25BC</span>
                </div>
                <div class="faq__item__answer">
                    <p>Our space resorts provide comfortable cabins with panoramic views, internet connectivity, and even zero-gravity relaxation zones. For longer trips, cabins are equipped with everything you need for a cozy stay.</p>
                </div>
            </div>
            <div class="faq__item">
                <div class="faq__item__question d-flex justify-content-between align-items-center">
                    <p>Can I travel with my family or a group?</p>
                    <span class="faq__item__arrow">&#x25BC</span>
                </div>
                <div class="faq__item__answer">
                    <p>Definitely! We offer special packages for families, groups of friends, or private events. Share this unforgettable experience with your loved ones.</p>
                </div>
            </div>
        </section>
        <section id="testimonial">
            <h3>Testimonial - Hear from Our Space Travelers</h3>
            <div id="testimonial__grid" class="d-grid">
                <div class="testimonial__grid__item">
                    <figure>
                        <blockquote>From start to finish, the journey was seamless. No special training required, just a passion for discovery. The view of the Milky Way was awe-inspiring. I felt like a true astronaut!</blockquote>
                        <div class="testimonial__grid__item__arrow"></div>
                        </blockquote>
                        <div class="testimonial__grid__item__author d-flex align-items-center">
                            <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/331810/sq-sample3.jpg" alt="sq-sample3" />
                            <div class="testimonial__grid__item__author__text">
                                <p><b>Alex Morgan</b></p>
                                <p>Teacher</p>
                            </div>
                        </div>
                    </figure>
                </div>
                <div class="testimonial__grid__item">
                    <figure>
                        <blockquote>Exploring the cosmos was beyond my wildest expectations. The spaceship was comfortable, and the views were breathtaking. It's incredible how accessible space travel has become. I recommend it to everyone!</blockquote>
                        <div class="testimonial__grid__item__arrow"></div>
                        </blockquote>
                        <div class="testimonial__grid__item__author d-flex align-items-center">
                            <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/331810/sq-sample3.jpg" alt="sq-sample3" />
                            <div class="testimonial__grid__item__author__text">
                                <p><b>Taylor Jordan</b></p>
                                <p>Space Voyager</p>
                            </div>
                        </div>
                    </figure>
                </div>
                <div class="testimonial__grid__item">
                    <figure>
                        <blockquote>Seeing the vastness of space and the beauty of our planet from orbit changed how I see the world. The crew made the trip enjoyable and safe. This is a must-do for anyone with a spirit of adventure!</blockquote>
                        <div class="testimonial__grid__item__arrow"></div>
                        </blockquote>
                        <div class="testimonial__grid__item__author d-flex align-items-center">
                            <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/331810/sq-sample3.jpg" alt="sq-sample3" />
                            <div class="testimonial__grid__item__author__text">
                                <p><b>Casey Harper</b></p>
                                <p>Galactic Enthusiast</p>
                            </div>
                        </div>
                    </figure>
                </div>
                <div class="testimonial__grid__item">
                    <figure>
                        <blockquote>We took my grandparents on a space trip, and they were over the moon (literally!). The whole experience was comfortable and exciting for all ages. If they can do it, anyone can. It’s a must-try for everyone!</blockquote>
                        <div class="testimonial__grid__item__arrow"></div>
                        </blockquote>
                        <div class="testimonial__grid__item__author d-flex align-items-center">
                            <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/331810/sq-sample3.jpg" alt="sq-sample3" />
                            <div class="testimonial__grid__item__author__text">
                                <p><b>Alex Morgan</b></p>
                                <p>Teacher</p>
                            </div>
                        </div>
                    </figure>
                </div>
            </div>
        </section>
    </div>
    <?php require_once "../../components/footer/footer.php" ?>
    <script src="pages/homepage/homepage.js"></script>
    <script src="assets/js/slideshow.js"></script>
</body>

</html>