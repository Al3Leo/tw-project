<html>
<?php
session_start();
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
} else {
    $username = '-1';
}


?>
<head>
    <title></title>
    <meta charset="UTF-8">
    <style>
        body{
            margin: 0;
            padding: 0;
            background-image: url("starship.JPG");
            background-size: cover;
            background-repeat: no-repeat;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
        }
        #main_history{
            margin: auto;
            display: flex;
            flex-direction: row;
            color: red;
            height: 95%;
            margin-top: 1.5em;
        }
        #menu_ordini{
            width: 20%;
            height: 80%;
            margin: auto;
            display: flex;
            flex-direction: column;
            background-color: rgba(0, 0, 0, 0.5);
            border-radius: 20px;
        }
        #ordini{
            width: 75%;
            height: 80%;
            margin: auto;
        }
        #list_ord{
            width: 95%;
            height: 95%;
            margin: auto;
            display: block;
            overflow-x: hidden;
            overflow-y: auto;
            background-color: rgba(0, 0, 0, 0.5);
            padding: 1em;
            border-radius: 20px;
        }
        .mini_order{
            margin-top: 1rem;
            height: 25ex; /*volevo provare ex e mi serviva un unità statica*/
            width: 100%;
            border-radius: 25px;
            background-image: url("background_order.jpeg");
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            display: flex;
            flex-direction: column;
        }
        .row{
            display: flex;
            flex-direction: row;
            justify-content: space-between;
        }
        .ticket_link{
            margin: auto;
            height: 100%;
            width: 50%;
            font-weight: bold;
            font-size: 2em;
            background-image: url("ticket.png");
            background-repeat: no-repeat;
            background-position: center;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .ticket_link *:hover{
            color: #ffffff;
            transition: 0.3s;
        }
        .ticket_link *:active{
            text-decoration: none;
            color: red;
        }
        .ticket_link *{
            text-decoration: none;
            color: #000000;
        }
        .opzione{
            border-bottom: 1px solid #ffffff;
            height: 20%;
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
        }
        .opzione *{
            color: white;
            font-family: sans-serif;
            font-size: 120%;
            text-decoration: none;
        }
        .opzione *:hover{
            color: #ff00f2;
            font-size: 150%;
            transition: 0.3s;
        }

        .dettagli_ordine{
            margin-left: 1%;
            margin-top: 1%;
            display:inline-block;
            height: 100%;
            width: 50%;
        }

    </style>
    <base href="../">
    <script>
        function today(){
            var today = new Date();
            var day = String(today.getDate());
            var month = String(today.getMonth() + 1);
            var year = today.getFullYear();
            var usrid = "<?php echo $username; ?>";
            document.getElementById("today").innerHTML = day + month + year+usrid;
        }
    </script>
</head>
<body>
<? require_once '../../components/header/header.php' ?>
<main id="main_history">
    <aside id="menu_ordini">
        <div class="opzione">
            <a href="#">Home</a>
        </div>
        <div class="opzione">
            <a href="#">Catalogue</a>
        </div>
        <div class="opzione">
            <a href="#">Support</a>
        </div>
        <div class="opzione">
            <a href="#">Space News</a>
        </div>
        <div class="opzione" style="border: none">
            <a href="#">About us</a>
        </div>
    </aside>
    <section id="ordini">
        <div id="list_ord">
            <div class="mini_order">
                <div class="row">
                    <section class="dettagli_ordine" style="">
                        <strong>Order Number: #</strong><span id="today"></span><script>today();</script><br>
                        <strong>Trip name:</strong> <span id="name">questa è una prova per testare il ticket dinamico</span><br>
                        <strong>Launch Location:</strong> <span id="launch_loc"></span><br>
                        <strong>Launch Date:</strong> <span id="launch_date"></span><br>
                        <strong>Return Date:</strong> <span id="return_date"></span><br>
                        <div style="margin-top: 12%;"><strong>Total Price:</strong> <span id="total_price"></span></div><br>
                    </section>
                    <aside class="ticket_link">
                        <!--%20 spazio con url encoding, è anche un rfc-->
                        <a href="OrderHistory/bozza_ticket.php?titolo=destinazione%20MARTE&rampa=kennedy%20Space%20Center,%20Florida%20USA&partenza=20-02-2025&num_ordine=777">Click Here</a>
                    </aside>
                </div>
            </div>
            <div class="mini_order">
                <div class="row">
                    <section class="dettagli_ordine" style="">
                        <strong>Order Number: #</strong><span id="today"></span><script>today();</script><br>
                        <strong>Trip name:</strong> <span id="name">questa è una prova per testare il ticket dinamico</span><br>
                        <strong>Launch Location:</strong> <span id="launch_loc"></span><br>
                        <strong>Launch Date:</strong> <span id="launch_date"></span><br>
                        <strong>Return Date:</strong> <span id="return_date"></span><br>
                        <div style="margin-top: 12%;"><strong>Total Price:</strong> <span id="total_price"></span></div><br>
                    </section>
                    <aside class="ticket_link">
                        <!--%20 spazio con url encoding, è anche un rfc-->
                        <a href="OrderHistory/bozza_ticket.php?titolo=destinazione%20MARTE&rampa=kennedy%20Space%20Center,%20Florida%20USA&partenza=20-02-2025&num_ordine=777">Click Here</a>
                    </aside>
                </div>
            </div>
            <div class="mini_order">
                <div class="row">
                    <section class="dettagli_ordine" style="">
                        <strong>Order Number: #</strong><span id="today"></span><script>today();</script><br>
                        <strong>Trip name:</strong> <span id="name">questa è una prova per testare il ticket dinamico</span><br>
                        <strong>Launch Location:</strong> <span id="launch_loc"></span><br>
                        <strong>Launch Date:</strong> <span id="launch_date"></span><br>
                        <strong>Return Date:</strong> <span id="return_date"></span><br>
                        <div style="margin-top: 12%;"><strong>Total Price:</strong> <span id="total_price"></span></div><br>
                    </section>
                    <aside class="ticket_link">
                        <!--%20 spazio con url encoding, è anche un rfc-->
                        <a href="OrderHistory/bozza_ticket.php?titolo=destinazione%20MARTE&rampa=kennedy%20Space%20Center,%20Florida%20USA&partenza=20-02-2025&num_ordine=777">Click Here</a>
                    </aside>
                </div>
            </div>
        </div>
        <?php
            echo "<div style='background-color: white;'>ciao";
            require_once "GetInfo.php";
            echo "</div>";
        ?>
    </section>
</main>
<? require_once '../../components/footer/footer.html' ?>
</body>
</html>