<html>

<!-- A cosa serve questo file> -->

<head>
    <meta charset="UTF-8">
    <title>Conferma</title>
    <base href="../" />
    <style>
        @import '../css/Global.css';

        body {
            background-color: black;
            background-repeat: no-repeat;
            background-size: cover;
            height: 100vh;
            display: flex;
            flex-direction: column;
        }

        #conferma {
            display: inline-block;
            color: white;
            font-weight: bold;
            background-color: #1fe100;
            border-radius: 5px;
            font-size: 1.2em;
            z-index: 1;
        }

        #goHome {
            display: inline-block;
            color: white;
            font-weight: bold;
            background-color: #008cff;
            border-radius: 5px;
            font-size: 1.2em;
        }
        #goHome:hover {
            background-color: black;
            transition: 0.7s;
        }

        main {
            /* fonte https://www.w3schools.com/css/css3_flexbox_container.asp */
            display: flex;
            gap: 1em;
            flex-direction: column;
            height: 70%;
            width: 100%;
            align-items: center;
            justify-content: center;
        }

        main * {
            padding: 5px;
        }
        #sfondo{
            position: absolute;
            z-index: -1;
            margin: 0px;
            padding: 0px;
            height: 100vh;
            width: 100vw;
            object-fit: cover;
        }
    </style>
</head>

<body>
<video autoplay muted loop src="assets/images/space/nebulosa.mov" id="sfondo" >
    Video cannot be displayed.
</video>
<main style="margin-top: 5%;">
    <div id="conferma"><?php echo $_GET["confermaDinamica"] ?></div>
    <a href="php/index.php" style="text-decoration: none;">
        <div id="goHome">Home</div>
    </a>
</main>
</body>

</html>