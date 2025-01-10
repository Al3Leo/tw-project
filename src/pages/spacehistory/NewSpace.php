<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    *{
        box-sizing: border-box;
        margin: 0;
        padding: 0;
        background-color: #111;
    }


.slideshow-container {
    width: 80%;
    margin: auto;
    position: relative;
    overflow: hidden;
    padding-top: 2rem;
}
.mySlides {
    display: none;
    position: relative;
    text-align: center;
}
.mySlides img {
    object-fit: cover;
    max-height: 70vh;
}
.content_destra {
    position: absolute;
    top: 50%;
    left: 10%;
    transform: translateY(-50%);
    background: rgba(0, 0, 0, 0.7);
    color: #fff;
    padding: 1.5rem;
    border-radius: 10px;
    max-width: 35%;
    text-align: left;
}
.content_destra h1 {
    font-size: 2.5rem;
    margin-bottom: 0.5rem;
}
.content_destra p {
    font-size: 1rem;
    line-height: 1.6;
}
.prev, .next {
    cursor: pointer;
    position: absolute;
    top: 50%;
    padding: 16px;
    color: white;
    font-weight: bold;
    font-size: 18px;
    user-select: none;
    transform: translateY(-50%);
}
.prev {
    left: 0;
}
.next {
    right: 0;
}
.prev:hover, .next:hover {
    background-color: rgba(0, 0, 0, 0.8);
}
.dot {
    cursor: pointer;
    height: 15px;
    width: 15px;
    margin: 5px;
    background-color: #bbb;
    border-radius: 50%;
    display: inline-block;
}
.active, .dot:hover {
    background-color: #717171;
}


  .sezione3 {
    padding: 4rem 0;
    background-color: #111;
    color: white;
    text-align: center;
}

.sezione3_text {
    margin-bottom: 2rem;
}

.card_area {
    display: grid;
    gap: 4.5rem;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
}

.card img {
    max-height: 300px;
    object-fit: cover;
    border-radius: 8px;
}

.card {
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    border-radius: 8px;
    overflow: hidden;
    transition: transform 0.3s ease;
}

.card:hover {
    transform: scale(1.05);
}

.wrapper4 {
    display: flex;
    flex-wrap: wrap;
    gap: 2rem;
    align-items: center;
    padding: 2rem 0;
}

.contenuto4 {
    flex: 1;
    max-width: 600px;
    text-align: left;
    color: white;
}

.contenuto4_img {
    max-width: 100%;
    border-radius: 8px;
}



.video-section {
    position: relative;
    width: 100%;
    height: 100vh; 
    overflow: hidden;
}

.background-video {
    position: absolute;
    top: 50%;
    left: 50%;
    width: 100%;
    height: 100%;
    object-fit: cover; 
    transform: translate(-50%, -50%);
    z-index: 0;
}

.content1 {
    top: 50%;
    position: relative;
    z-index: 1; 
    color: white;
    text-align:start;
    padding: 20px;
}

.content1 h1 {
    font-size: 3.5rem;
    font-weight: bolder;
    text-transform: uppercase;
}

.content1 p {
    font-weight: 600;
    width: 53%;
    font-size: 1.2rem;
    margin-bottom: 1rem;
}
/*sezione newsletter*/
.newletter-sezione{
    display: grid;
  place-items: center;
  min-height: 100vh;
  overflow: hidden;
}
.newsletter-container{
width: 600px;
  height: 450px;
  position: relative;
  display: grid;
  grid-template-columns: 1fr 1fr;
  place-items: center;
  line-height: 1.5;
  padding: 1rem;
  box-shadow: 0 20px 30px rgba(205, 231, 10, 0.185);
}
#newsletter-img{
    width: 250px;
    height: 400px;
    object-fit: contain;
    object-position: center;
}
.newsletter-container-text{
  padding: 10px 40px 10px 10px;
  display: flex;
  flex-direction: column;

}
.newsletter-container-text h2 {
  font-size: 1.2rem;
  color: #1A2250;
}
.newsletter-container-text p {
  font-size: 14px;
  color: #3B4169;
  margin: 10px 0;
}
#form-newsletter input,
#form-newsletter button {
  width: 100%;
  border: none;
  padding: 14px;
  border-radius: 3px;
}
#form-newsletter input {
  border: 2px solid #DADDEC;
  margin: 5px 0 10px;
  font-size: 1rem;
  color: #656880;
}
#form-newsletter button {
  background-image: linear-gradient(to right, #89CAFF, #6589FF);
  display: block;
  color: #fff;
  font-size: 1rem;
  cursor: pointer;
  box-shadow: 0 5px 20px #89caff94;
  transition: box-shadow 0.3s ease-in-out;
}
#form-newsletter button:hover {
  box-shadow: none;
}
.newsletter-container-text span {
  display: block;
  text-align: center;
  margin: 20px 0 0;
  color: #BABDCB;
  font-size: 12px;
}

    </style>
</head>

<body>
    <section class="video-section">
        <video autoplay muted loop playsinline class="background-video" src="../img/space/video2.mp4">
            Video cannot be displayed.
        </video>
        <div class="content1">
            <h1>True wounderers look up at the space</h1>
            <p>How much do you know about space.<br>
                Learn more about this interesting miracle.<br>
                Stay captivated by the wonders of space, with facts that no one has ever told you before...</p>
        </div>
    </section>

    <section class="slideshow-container">
        
        <div class="mySlides fade">
            <div class="numbertext">1 / 8</div>
            <div class="content_destra">
                <h3>The Blue Planet</h3>
                <h1>EARTH</h1>
                <hr>
                <p>Earth, our home planet, is the third rock from the Sun and the only known world teeming with life. It boasts diverse ecosystems, from lush rainforests to arid deserts. The planet's surface is 71% water, primarily in oceans. Earth's atmosphere, rich in nitrogen and oxygen, supports life and shields us from harmful solar radiation. With its dynamic climate and ever-changing landscapes, Earth remains a marvel in the vastness of space.</p>
            </div>
            <img src="../img/space/terra.png" style="width:100%">
        </div>
    

    
        <div class="mySlides fade">
            <div class="numbertext">2 / 8</div>
            <div class="content_destra">
                <h3>The Morning Star</h3>
                <h1>Venus</h1>
                <hr>
                <p>
                    Venus is similar in size and structure to Earth but is
                    shrouded in thick, toxic clouds of sulfuric acid,
                    creating a runaway greenhouse effect. This makes
                    it the hottest planet in our solar system. Venus is often visible just before sunrise or after sunset, earning it the name "The Morning Star."
                </p>
            </div>
            <img src="../img/space/venere.png" style="width:100%">
        </div>
    

    
        <div class="mySlides fade">
            <div class="numbertext">3 / 8</div>
                <div class="content_destra">
                    <h3>The Swift Planet</h3>
                    <h1>Mercury</h1>
                    <hr>
                    <p>
                        Mercury is the smallest planet in our solar system and the closest to the Sun. It's named after the Roman messenger god and zips around the Sun in just 88 Earth days. Despite being so close to the Sun, Mercury has no atmosphere to retain heat, making its temperature fluctuate drastically.
                    </p>
                </div>
            <img src="../img/space/mercurio.png" style="width:100%">
        </div>

        <div class="mySlides fade">
            <div class="numbertext">4 / 8</div>
                <div class="content_destra">
                    <h3>The Red Planet</h3>
                    <h1>Mars</h1>
                    <hr>
                    <p>
                        Mars is known for its reddish appearance, which comes from iron oxide, or rust, on its surface. Mars has the tallest volcano and the deepest canyon in our solar system. It's a prime candidate for future human exploration due to evidence of ancient water flows.
                    </p>
                </div>
                <img src="../img/space/marte.png" style="width:100%">
        </div>

        <div class="mySlides fade">
            <div class="numbertext">5 / 8</div>
                <div class="content_destra">
                    <h3>The Giant Planet</h3>
                    <h1>Jupiter</h1>
                    <hr>
                    <p>
                        Jupiter is the largest planet in our solar system and is known for its Great Red Spot, a massive storm larger than Earth. This gas giant has a strong magnetic field and more than 75 moons, including Ganymede, the largest moon in the solar system.
                    </p>
                </div>
            <img src="../img/space/giove.png" style="width:100%">
        </div>

        <div class="mySlides fade">
            <div class="numbertext">6 / 8</div>
                <div class="content_destra">
                    <h3>The Ringed Planet</h3>
                    <h1>Saturn</h1>
                    <hr>
                    <p>
                        Saturn is easily recognizable by its stunning ring system, composed of ice and rock particles. This gas giant is mostly made of hydrogen and helium and has over 80 moons, with Titan being the largest and possessing a thick atmosphere.
                    </p>
                </div>
            <img src="../img/space/saturno2.png" style="width:100%">
        </div>

        <div class="mySlides fade">
            <div class="numbertext">7 / 8</div>
                <div class="content_destra">
                    <h3>The Ice Giant</h3>
                    <h1>Uranus</h1>
                    <hr>
                    <p>
                        Uranus has a bluish color due to methane in its atmosphere and is unique because it rotates on its side. Its axial tilt of 98 degrees means it has extreme seasons. Uranus is surrounded by a faint ring system and has 27 known moons.
                    </p>
                </div>
            <img src="../img/space/urano.webp" style="width:100%">
        </div>

        <div class="mySlides fade">
            <div class="numbertext">8 / 8</div>
                <div class="content_destra">
                    <h3>The Windy Planet</h3>
                    <h1>Neptune</h1>
                    <hr>
                    <p>
                        Neptune, the farthest planet from the Sun, is known for its deep blue color and strong winds, which can reach speeds of over 1,500 miles per hour. This ice giant has 14 known moons and a thin ring system.
                    </p>
                </div>
            <img src="../img/space/nettuno.png" style="width:100%">
        </div>

        <a class="prev" onclick="plusSlides(-1)">❮</a>
        <a class="next" onclick="plusSlides(1)">❯</a>
        <div style="text-align:center">
            <span class="dot" onclick="currentSlide(1)"></span>
            <span class="dot" onclick="currentSlide(2)"></span>
            <span class="dot" onclick="currentSlide(3)"></span>
            <span class="dot" onclick="currentSlide(4)"></span>
            <span class="dot" onclick="currentSlide(5)"></span>
            <span class="dot" onclick="currentSlide(6)"></span>
            <span class="dot" onclick="currentSlide(7)"></span>
            <span class="dot" onclick="currentSlide(8)"></span>
        </div>
    </section>

    <section class="sezione3">
        <div class="sezione3_text">
            <h1>Pioneers of Space Exploration</h1>
            <p>Space exploration has been made possible by the courage and determination of many remarkable astronauts. Here are a few who have left an indelible mark on history</p>
        </div>
        <div class="wrapper">
            <div class="card_area">
            <div class="card">
                <img src="../img/space/neil.jpg">
                <div class="overlay">
                    <h1>
                        Neil Armstrong
                    </h1>
                    <p>Neil Armstrong is best known for being the first person to walk on the Moon on July 20, 1969. As the commander of Apollo 11, his famous words, "That's one small step for [a] man, one giant leap for mankind," still resonate as a monumental moment in human history.</p>
                </div>
            </div>

            <div class="card">
                <img src="../img/space/valentinajpg.jpg">
                <div class="overlay">
                    <h1>
                        Valentina Tereshkova
                    </h1>
                    <p>
                        Valentina Tereshkova, a Soviet cosmonaut, became the first woman to fly in space on June 16, 1963. Her mission aboard Vostok 6 made her an inspiration and a trailblazer for women in space exploration.
                    </p>
                </div>
            </div>
            
            <div class="card">
                <img src="../img/space/Yurijpg.jpg">
                <div class="overlay">
                    <h1>
                        Yuri Gagarin
                    </h1>
                    <p>
                        Yuri Gagarin, a Soviet cosmonaut, became the first human to journey into outer space on April 12, 1961. His spacecraft, Vostok 1, completed an orbit of Earth, making Gagarin an international hero and a symbol of Soviet space achievement.
                    </p>
                </div>
            </div>
        </div>
    </div>
        
        </div>
    </section>

    <section class="sezione4">
        <div class="wrapper4">
            <div class="contenuto4">
                <img class="contenuto4_img" src="../img/space/vostok.jpg">
            </div>
            <div class="contenuto4">
                <h3>Vostok 1: The Dawn of Human Space Exploration</h3>
                <p>
                    The Vostok 1 mission, launched on April 12, 1961, marked the first time humans ventured into space. The spacecraft completed a full orbit of the Earth in approximately 108 minutes. It demonstrated the Soviet Union's advanced capabilities in space technology, setting a significant milestone in the space race. The success of Vostok 1 was a testament to the potential of human ingenuity and engineering. This mission opened the doors to future space exploration, inspiring generations to look beyond our planet.
                </p>
            </div>
        </div>
    </section>


    <section class="newletter-sezione">
        <div class="newsletter-container">
            <img id="newsletter-img"
              src="https://images.unsplash.com/photo-1534670007418-fbb7f6cf32c3?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=634&q=80"
              alt="image">
            <div class="newsletter-container-text">
              <h2>Subscribe to our<br>Newsletter</h2>
              <p>Subscribe to our newsletter to receive <br>the lastest ticket offers and stay updated on news about space.<br>Don't miss the change to stay informed!</p>
              <form id="form-newsletter">
              <input type="email" placeholder="Email address" required id="email" name="email">
              <button type="submit">Subscribe</button>
            </form>
            <span>No spams included</span>
            </div>
          </div>
    </section>
    

<script>
let slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}
</script>

</body>
</html> 

