<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <style>
        html, body { /*forzo il full screen*/
            height: 100%;
            margin: 0;
            padding: 0;
        }
        body {
            background-image: linear-gradient(75deg, rgb(14,11,19), rgb(82, 0, 124));
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
    <meta name="Author" content="Gruppo05"/>
    <base href="../"/>
    <link rel="icon" href="img/favicon.png" type="image/png/">
    <script src="js/TopMenu.js"></script>
</head>
<body>
<!--mi sa che il base href vale solo per html e non php-->
<?php include_once '../html/TopMenu.html'?>
<form method="get" action="php/ConfermaDinamica.php">
    <input type="hidden" name="confermaDinamica" value="confermato dinamicamente">
    <button type="submit">provami</button>
</form>
<?php include_once '../html/Footer.html'?>
</body>
</html>