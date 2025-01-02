<html>
<head>
    <meta charset="UTF-8">
    <title>Supporto Spaziale</title>
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
        #text_container{
            display: block;
            width: 40vw;
        }
        .text_support{
            color: white;
            display: block;
            font-size: 1.2em;
            width: auto;
            text-align: center;
            padding-bottom: 3%;
            font-family: -apple-system, BlinkMacSystemFont, sans-serif;
        }
        input, textarea{
            display: block;
            margin-bottom: 1%;
            height: 5vh;
            width: 40vw;
            border-radius: 7px;
            border: 1px solid white;
        }
        #mailtoemail{
            color: white;
        }
        #mailtoemail:hover{
            color: #1fe100;
        }
    </style>
    <meta name="Author" content="Gruppo05"/>
    <base href="../"/>
    <link rel="icon" href="img/favicon.png" type="image/png/">
    <script src="js/TopMenu.js"></script>
</head>
<body>
<?php include_once '../html/TopMenu.html' ?>
<main style="min-height: 80vh; margin-left: 33%;"> <!--93 perchè 7 li occupa il footer-->
    <div id="text_container">
        <div class="text_support">
            Hai bisogno di aiuto?<br>Siamo qui per rispondere a ogni tua domanda!
        </div>

        <div class="text_support">
            Che tu stia cercando informazioni sui nostri viaggi spaziali, abbia dubbi sulle prenotazioni o desideri segnalare un problema, il nostro team di supporto è pronto ad assisterti.
        </div>

        <div class="text_support">
            Puoi contattarci tramite il modulo qui sotto o scriverci direttamente all’indirizzo email <strong><a href="mailto:a.leo88@studenti.unisa.it" id="mailtoemail">supporto-spaziale@mars.com</a></strong>.
        </div>
    </div>
    <form class="form_support" method="get" action="mailto:mailto:a.leo88@studenti.unisa.it">
        <input type="text" name="nome" placeholder="Nome" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="text" name="subject" placeholder="Oggetto">
        <input type="tel" name="telefono" placeholder="Telefono (Facoltativo)">
        <input type="text" name="num_ordine" placeholder="N.Ordine (Facoltativo)">
        <div style="color: white; display: block; margin-bottom: 0.5%; margin-top: 0.5%">Messaggio</div>
        <textarea type="text" name="body" style="height: 25%"></textarea>
        <input type="hidden" name="confermaDinamica" value="Supporto richiesto con successo">
        <input type="submit" value="Invia" style="color: white; display: block; margin-bottom: 0.5%; margin-top: 0.5%" onclick="window.open("php/Supporto.php)">
    </form>
    <?php include_once '../html/Footer.html'?>
</main>
</body>
</html>
