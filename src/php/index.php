<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Viaggi super spaziali</title>
    <link rel="stylesheet" href="../css/HomePage.css">
    <base href="../" />
</head>

<body>
    <?php include_once '../html/TopMenu.html' ?>
    <div id="hero">
        <div id="hero__text">
            <h2>Welcome to the Universe</h2>
            <p>Embark on an extraordinary journey beyond the stars. Explore distant planets, witness breathtaking galaxies, and make the impossible your reality. Book your interstellar adventure today and redefine the limits of human exploration!</p>
        </div>
    </div>
    <main id="main" class="d-flex flex-row flex-nowrap justify-content-between align-items-start">
        <div id="main__left" class="d-flex align-items-center flex-column text-center">
            <div id="main__left__img">
                <img class="responsive" src="img/alien_with_money.png" alt="alien with money">
            </div>
            <div id="main__left__text">
                <p><b>Exclusive Launch Offer</b><p>
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
            </div>
            <button type="button">Get Deal!</button>

        </div>
        <div id="main__right" class="text-center d-flex flex-column align-items-center">
            <h3>Your Gateway to the Universe</h3>
            <div id="main__right__slideshow">
                <img class="responsive slide" src="img/nasa/jupiter.jpg" alt="slideshow">
                <img class="responsive slide" src="img/nasa/moon.jpg" alt="slideshow">
                <img class="responsive slide" src="img/nasa/kepler.jpg" alt="slideshow">
            </div>
            <div id="main__right__text">
                <h4>Unleash your inner explorer with our tailored interstellar adventures</h4>
                <p>Whether you're dreaming of walking on the moon, marveling at the rings of Saturn, or witnessing a supernova up close, we make it possible. Our state-of-the-art spacecraft and expert crew ensure a safe and unforgettable journey among the stars</p>
            </div>
            <div id="main__right__buttons">
                <a href=""><button type="button">About us</button></a>
            </div>
        </div>
    </main>
    <div id="secondary-s" class="d-flex flex-row justify-content-between">
        <section class="faq">
            <h3>FAQ - Frequently Asked Question:</small></h3>
            <div class="faq__item">
                <div class="faq__item__question d-flex justify-content-between align-items-center">
                    <p>Who can travel to space?</p>
                    <span class="arrow">&#x25BC</span>
                </div>
                <div class="faq__item__answer">
                    <p>Anyone! Our space journeys are designed to be safe and accessible to everyone, regardless of age or physical condition. If you can board a plane, you can travel to space.</p>
                </div>
            </div>
            <div class="faq__item">
                <div class="faq__item__question d-flex justify-content-between align-items-center">
                    <p>How much does a space trip cost?</p>
                    <span class="arrow">&#x25BC</span>
                </div>
                <div class="faq__item__answer">
                    <p>Thanks to cutting-edge technology, space travel is now affordable for everyone! Prices start at $500 for a suborbital flight and increase depending on the destination and trip duration.</p>
                </div>
            </div>
            <div class="faq__item">
                <div class="faq__item__question d-flex justify-content-between align-items-center">
                    <p>What happens during a space trip?</p>
                    <span class="arrow">&#x25BC</span>
                </div>
                <div class="faq__item__answer">
                    <p>During the journey, you’ll enjoy unique experiences such as floating in zero gravity, spectacular views of deep space, and even gourmet dining with a view of Earth.</p>
                </div>
            </div>
            <div class="faq__item">
                <div class="faq__item__question d-flex justify-content-between align-items-center">
                    <p>Do I need to bring anything?</p>
                    <span class="arrow">&#x25BC</span>
                </div>
                <div class="faq__item__answer">
                    <p>No, we’ve got you covered! Your ticket includes everything you need, from space suits to onboard amenities. Feel free to bring small personal items or keepsakes for the trip.</p>
                </div>
            </div>
            <div class="faq__item">
                <div class="faq__item__question d-flex justify-content-between align-items-center">
                    <p>Are there baggage limits?</p>
                    <span class="arrow">&#x25BC</span>
                </div>
                <div class="faq__item__answer">
                    <p>Yes, but nothing complicated! Each traveler can bring one compact personal bag, similar to a standard airline carry-on.</p>
                </div>
            </div>
            <div class="faq__item">
                <div class="faq__item__question d-flex justify-content-between align-items-center">
                    <p>Are meals included on board?</p>
                    <span class="arrow">&#x25BC</span>
                </div>
                <div class="faq__item__answer">
                    <p>Absolutely! We offer premium space meals prepared by top chefs, with customizable options to meet all dietary needs.</p>
                </div>
            </div>
            <div class="faq__item">
                <div class="faq__item__question d-flex justify-content-between align-items-center">
                    <p>What’s the accommodation like in space?</p>
                    <span class="arrow">&#x25BC</span>
                </div>
                <div class="faq__item__answer">
                    <p>Our space resorts provide comfortable cabins with panoramic views, internet connectivity, and even zero-gravity relaxation zones. For longer trips, cabins are equipped with everything you need for a cozy stay.</p>
                </div>
            </div>
            <div class="faq__item">
                <div class="faq__item__question d-flex justify-content-between align-items-center">
                    <p>Can I travel with my family or a group?</p>
                    <span class="arrow">&#x25BC</span>
                </div>
                <div class="faq__item__answer">
                    <p>Definitely! We offer special packages for families, groups of friends, or private events. Share this unforgettable experience with your loved ones.</p>
                </div>
            </div>
        </section>
        <section id="testimonial">
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quaerat ipsam quo reiciendis labore voluptatibus. Numquam assumenda sint id, voluptatem sit perspiciatis, quidem voluptas eligendi nobis omnis dicta, debitis cum. Quaerat!</p>
        </section>
    </div>
    <script src="js/HomePage.js"></script>
</body>

</html>