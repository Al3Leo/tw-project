<?php
/**
 * Funzioni per conferma di registrazione di un utente o avvenuto pagamento.
 * Questo script PHP serve a mostrare una pagina di conferma all'utente, dopo che ha completato la registrazione o un checkout.
 * Controlla se ci sono parametri specifici nell'URL (confirmsignupname o confirmcheckout). 
 * Se presenti, visualizza un messaggio di conferma personalizzato in base al tipo di operazione completata (registrazione o checkout).
 */
require_once "gestioneAcquisti.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once "../components/utils/headMetadata.html" ?>
    <title>Conferm</title>
    <base href="../">
    <style>
        @import "assets/css/Global.css";
        @import "components/topmenu/topmenu.css";
        @import "components/login/login.css";
        @import "components/footer/footer.css";

        * {
            box-sizing: border-box;
        }

        .mainconfirm .confirm_div {
            gap: 0.5em;
            background-color: aliceblue;
            width: 50vh;
            height: auto;
            box-shadow: 0 20px 30px rgba(205, 231, 10, 0.185);
        }

        .confirm_div .div_down p {
            color: rgb(40, 39, 39);

        }

        .confirm_div>div:first-child {
            background-color: #7f0ab9;
            text-shadow: 0 0.15ch 15px oklch(25% 0.2 320), 0 -2px 0 oklch(98% 0.05 320);
        }

        .confirm_div .div_up img {
            object-fit: contain;
        }

        .mainconfirm {
            height: 65vh;
        }

        .confirm_div .div_down p {
            font-size: 0.7em;
        }
    </style>

</head>

<body>
    <?php include __DIR__ . '../../components/header/header.php' ?>
    <main class=" mainconfirm d-flex  flex-column align-items-center justify-content-center">

        <div class="confirm_div d-flex justify-content-evenly flex-column " style="border: 2px solid #000;
    border-radius: 15px;">
            <div class="div_up d-flex  flex-column align-items-center" style="border: 2px solid #000;
    border-radius: 15px; padding:1em">
                <img alt="svgImg" src="assets/images/check.jpg" />
            </div>
            <div class="div_down d-flex  flex-column align-items-center" style="margin: 1em">
                <?php if (isset($_GET['confirmsignup'])) { //se il parametro  'confirmsignup' e presente nell'url
                    $name = $_GET['confirmsignup'];
                    echo "<p>Hello <strong>$name</strong>, your registration has been successfully completed.<br>Continue your experience on our site, and don't miss out on our latest offers and special deals. <br>Don't forget to login in.</p>";
                } elseif (isset($_GET['confirmcheckout'])) {
                    echo "<p>Thank you for your purchase.<strong>Your payment has been successfully processed</strong>.<br> <p>Continue enjoying our services and be sure to check out our latest offers and exclusive deals.</p>";
                }
                ?>
                <button onclick="apriHome()">Continue</button>
            </div>
        </div>
    </main>
    <?php include __DIR__ . "../../components/footer/footer.php" ?>
</body>

<script>
    function apriHome() {
        window.location.href = 'pages/homepage/homepage.php';
    }
</script>

</html>