<html>
<head>
    <meta charset="UTF-8">
    <title>Supporto Spaziale</title>
    <style>
        html, body {
            margin: 0;
            padding: 0;
        }
        body {
            background-image: linear-gradient(75deg, rgb(14,11,19), rgb(82, 0, 124));
            background-repeat: no-repeat;
            background-size: cover;
            display: flex;
            flex-wrap: wrap;
            flex-direction: column;
            font-family: -apple-system, BlinkMacSystemFont, sans-serif;
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
        }
        input, textarea{
            display: block;
            margin-bottom: 1%;
            height: 2rem;
            width: 40rem;
            border-radius: 7px;
        }
        textarea{
            height: 7rem !important;
        }
        #mailtoemail{
            color: white;
        }
        #mailtoemail:hover{
            color: #1fe100;
        }
        main{
            min-height: 100%;
            width: 100%;
            display: flex;
            align-items: center;
            flex-direction: column;
            flex-wrap: nowrap;
            height: 80%;
        }
    </style>
    <meta name="Author" content="Gruppo05"/>
    <base href="../"/>
    <link rel="icon" href="img/favicon.png" type="image/png/">
    <script src="js/TopMenu.js"></script>
</head>
<body>
<?php include_once '../html/TopMenu.html' ?>
<main>
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
        <div style="color: white; display: block; font-weight: bold; margin-top: 0.7em; margin-bottom: 0.2em;">Messaggio:</div>
        <textarea type="text" name="body" style="height: 25%; resize: none"></textarea>
        <input type="hidden" name="confermaDinamica" value="Supporto richiesto con successo">
        <input type="submit" value="Invia!" style="color: #ffffff;
            background-color: #00c4ff;
            margin-top: 2%;
            width: auto;
            height: auto;
            padding: 1.2%;
            font-size: x-large;
            margin-left: 45%;
            border: 2px solid #ffffff;">
    </form>
</main>
<?php include_once '../html/Footer.html'?>
</body>
</html>
