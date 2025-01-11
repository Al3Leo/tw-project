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
<?php echo include_once '../components/header/header.php'; ?>

<a href="backend/addToCart.php?id=1" style="color: #1fe100"> add</a>
<?php require_once '../components/footer/footer.html';
?>
</body>

</html>