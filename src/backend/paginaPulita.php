<!DOCTYPE html>
<?php session_start();
include_once 'contaVisite.php'; ?>
<html lang="en">
<<<<<<< HEAD
=======

>>>>>>> eb391e0e1a245688146621b45c06fe21931c7870
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Catalogue</title>
    <base href="../">
    <link rel="stylesheet" href="css/catalogue.css">
<<<<<<< HEAD

</head>

<body>
<?php echo include_once '../components/header/header.php'; ?>

<a href="backend/addToCart.php?id=1" style="color: #1fe100"> add</a>
<?php require_once '../components/footer/footer.html';
=======
</head>

<body>
<?php echo include_once '../php/header.php'; ?>
<div class="hero">
    <div class="parallax"></div>
</div>
<?php include_once 'prodottopage.php'?>
<?php require_once '../html/footer.html';
>>>>>>> eb391e0e1a245688146621b45c06fe21931c7870
?>
</body>

</html>