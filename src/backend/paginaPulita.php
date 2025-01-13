<!DOCTYPE html>
<?php session_start();
include_once 'contaVisite.php'; ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Catalogue</title>
    <base href="../">
    <link rel="stylesheet" href="css/catalogue.css">

</head>

<body>
<?php  require_once '../components/header/header.php'; ?>
<?php  require_once '../bozze/ajax_cart.php'; ?>
<?php require_once '../components/footer/footer.html'; ?>
</body>

</html>