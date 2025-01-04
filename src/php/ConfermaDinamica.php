<html>
<head>
    <meta charset="UTF-8">
    <title>Conferma</title>
    <base href="../"/>
    <style>
        html, body { /*forzo il full screen*/
            margin: 0;
            padding: 0;
            font-family: -apple-system, BlinkMacSystemFont, sans-serif;
        }
        body {
            background-image: linear-gradient(75deg, rgb(14,11,19), rgb(82, 0, 124));
            background-repeat: no-repeat;
            background-size: cover;
            height: 100vh;
            display: flex;
            flex-direction: column;
        }
        #conferma{
            display: inline-block;
            color: white;
            font-weight: bold;
            background-color: #1fe100;
            border-radius: 5px;
            font-size: 1.2em;
        }
        #goHome{
            display: inline-block;
            color: white;
            font-weight: bold;
            background-color: #008cff;
            border-radius: 5px;
            font-size: 1.2em;
        }
        main{
            /* fonte https://www.w3schools.com/css/css3_flexbox_container.asp */
            display: flex;
            gap: 1em;
            flex-direction: column;
            height: 70%;
            width: 100%;
            align-items: center;
            justify-content: center;
        }
        main *{
            padding: 5px;
        }
    </style>
</head>
<body>
    <?php include_once '../html/TopMenu.html'?>
    <main>
            <div id="conferma"><?php echo $_GET["confermaDinamica"]?></div>
            <a href="php/index.php" style="text-decoration: none;"><div id="goHome">Home</div></a>
    </main>
    <?php include_once '../html/Footer.html'?>
</body>
</html>