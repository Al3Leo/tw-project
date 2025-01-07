<html>

<head>
    <meta charset="UTF-8">
    <title>Supporto Spaziale</title>
    <meta name="Author" content="Gruppo05" />
    <base href="../" />
    <link rel="icon" href="img/favicon.png" type="image/png/">
    <link rel="stylesheet" type="text/css" href="css/Supporto.css">
    <script src="js/TopMenu.js"></script>
</head>

<body <?php if($_SESSION['username']) echo "onload=\"loggato()\";"?>>
<?php if($_SESSION['username']) echo "<h1 style='color: #1fe100'>provaaaaaaaaa</h1><br><br>"?>
    <?php include_once '../html/TopMenu.html' ?>
    <?php include_once '../html/PopupLogin.html' ?>
    <?php include_once '../html/Supporto.html' ?>
    <?php include_once '../html/footer.html' ?>
</body>

</html>