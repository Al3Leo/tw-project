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
<?php echo include_once '../php/header.php'; ?>
<div class="hero">
    <div class="parallax"></div>
</div>
<?php include_once 'prodottopage.php'?>
<?php require_once '../html/footer.html';
?>
</body>

</html>