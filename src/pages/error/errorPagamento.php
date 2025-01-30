<?php
/**
 * Questo script PHP serve a mostrare una pagina di errore all'utente, dopo che ha completato checkout.
 * Notifica l'utente che il pagamento con Stripe non è andato a buon fine
 */
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once "../../components/utils/headMetadata.html" ?>
    <title>Error</title>
    <base href="../../">
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
            background-color:#8f000f;
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
        main .btn_err{
            background-color: var(--tertiaryColor);
            border: solid #000;
            color: #000;
        }
    </style>

</head>

<body>
<?php require_once "../../components/header/header.php"?>
    <main class=" mainconfirm d-flex  flex-column align-items-center justify-content-center">

        <div class="confirm_div d-flex justify-content-evenly flex-column " style="border: 2px solid #000;
    border-radius: 15px;">
            <div class="div_up d-flex  flex-column align-items-center" style="border: 2px solid #000;
    border-radius: 15px; padding:1em">
                <img alt="errorimg" src="assets/images/error2.png" />
            </div>
            <div class="div_down d-flex  flex-column align-items-center" style="margin: 1em">
                <p>We apologize, but your payment was <strong style="color:#8f000f">unsuccessful</strong>. Please check your payment details and try again.</p>
                <button class="btn_err" onclick="openCart()">Try Again</button>
            </div>
        </div>
    </main>
    <?php require_once "../../components/footer/footer.php"?>
</body>

<script>
    function apriHome() {
        window.location.href = 'pages/homepage/homepage.php';
    }
</script>

</html>