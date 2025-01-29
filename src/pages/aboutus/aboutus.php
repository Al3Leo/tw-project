<?php
session_start();
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <?php require_once "../../components/utils/headMetadata.html"?>
    <title>About us</title>
    <link rel="stylesheet" href="aboutUs.css">
    <base href="../../" />

</head>
<body>
    <?php require_once '../../components/header/header.php' ?>
    <div class="ourMission">
        <h1 class="fade-in">About Us</h1>
        <div class="text">
            <div class="text-box">
                <h2 class="fade-in">Our Mission</h2>
                <p>
                Our project aims to create an engaging and functional website dedicated to space travel, a theme that represents 
                the future of exploration and human knowledge. We want to offer users an immersive experience by combining 
                informative content, interactive design, and innovative technology. 
                </p>
            </div>
            <div class="image">
                <img src="assets/images/space/viaggi-spaziali.jpg" alt="Missione Spaziale">
            </div>
        </div>
        <div class="finalGoal">
            <div class="text-box">
                <h2 class="fade-in">Final Goal</h2>
                <p>
                Our goal is to create a site that not only informs but also excites people, igniting a passion for space travel.
                 Whether it's discovering new missions, exploring interplanetary destinations, or simply dreaming about humanity's 
                 future among the stars, our project aims to be a reference point for those looking beyond Earth's horizon.
                </p>
            </div>
            <div class="image">
                <img src="assets/images/space/spazio.jpg" alt="Obiettivo Finale">
            </div>
        </div>
    </div>
    <?php require_once "../../components/footer/footer.php"?>
</body>
</html>
