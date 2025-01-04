<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <meta name="Author" content="Gruppo05"/>
    <base href="../"/>
    <link rel="icon" href="img/favicon.png" type="image/png/">
    <link rel="stylesheet" href="css/body.css" type="text/css"/>
    <script src="js/TopMenu.js"></script>
</head>
<body>
<!--mi sa che il base href vale solo per html e non php-->
<?php include_once '../html/TopMenu.html'?>
<?php require_once '../html/PopupLogin.html' ?>


<main>
    <form method="get" action="php/ConfermaDinamica.php">
        <input type="hidden" name="confermaDinamica" value="confermato dinamicamente">
        <button type="submit">provami</button>
    </form>
</main>

<?php include_once '../html/Footer.html'?>
</body>
</html>