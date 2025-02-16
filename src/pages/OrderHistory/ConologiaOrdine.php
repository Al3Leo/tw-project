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
    <title>History Orders</title>
    <meta charset="UTF-8">
    <style>
        body{
            margin: 0;
            padding: 0;
            background-image: url("../../assets/images/cosmo.jpg");
            background-size: cover;
            background-repeat: no-repeat;
        }
        #main_history{
            margin: auto;
            display: flex;
            flex-direction: row;
            color: #ffffff;
            height: 95%;
            margin-top: 1.5em;
        }
        #menu_ordini{
            width: 20%;
            height: 80%;
            margin: auto;
            display: flex;
            flex-direction: column;
            background-color: rgba(45, 45, 45, 0.5);
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
            background-color: rgba(45, 45, 45, 0.5);
            padding: 1em;
            border-radius: 20px;
        }
        .mini_order{
            margin-top: 1rem;
            height: 25ex; /*volevo provare ex e mi serviva un unità statica*/
            width: 100%;
            border-radius: 25px;
            background-image: url("../../assets/images/background_order.jpeg");
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            display: flex;
            flex-direction: column;
            border: 2px solid white;
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
            background-image: url("../../assets/images/ticket.png");
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
            color: #0066ff;
            font-size: 250%;
            transition: 0.5s;
            font-weight: bold;
        }

        .dettagli_ordine{
            margin-left: 1%;
            margin-top: 1%;
            display:inline-block;
            height: 100%;
            width: 50%;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
        }

    </style>
    <?php require_once "../../components/utils/headMetadata.html" ?>
    <base href="../../"><!--punta a ~/pages/-->
</head>
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
<body>
<!-- per staccare dalle altre pagine ho aggiunto un side menu e tolto header e footer-->
<main id="main_history">
    <aside id="menu_ordini">
        <div class="opzione">
            <a href="pages/homepage/homepage.php">Home</a>
        </div>
        <div class="opzione">
            <a href="pages/catalogue/catalogue.php">Catalogue</a>
        </div>
        <div class="opzione">
            <a href="pages/support/Supporto.php">Support</a>
        </div>
        <div class="opzione">
            <a href="pages/spacehistory/NewSpace.php">Space News</a>
        </div>
        <div class="opzione" style="border: none">
            <a href="pages/aboutus/aboutus.php">About us</a>
        </div>
    </aside>
    <section id="ordini">
    <div id="list_ord">
    <?php
    // Connetti al database e recupera gli acquisti per l'utente loggato
    require_once '../../backend/ConnettiDb.php';
    $usr = trim($_SESSION['username']); 
    $sql = "SELECT * FROM acquisti WHERE acquirenteuser = $1";
    $res = pg_prepare($db_connection, "a", $sql);
    $res = pg_execute($db_connection, "a", array($usr));
    if ($res) {
        while ($r = pg_fetch_assoc($res)) {
            require 'GetInfo.php'; //GetInfo.php popola $name, $location, $partenza, $ritorno, $price
            echo "<div class=\"mini_order\">
                    <div class=\"row\">
                        <section class=\"dettagli_ordine\">
                            <strong>Order Number: #</strong><span id=\"today\">" . $r['idacquisto'] . "</span><br>
                            <strong>Trip name:</strong> <span id=\"name\">" . $name . "</span><br>
                            <strong>Launch Location:</strong> <span id=\"launch_loc\">" . $location . "</span><br>
                            <strong>Launch Date:</strong> <span id=\"launch_date\">" . $partenza . "</span><br>
                            <strong>Return Date:</strong> <span id=\"return_date\">" . $ritorno . "</span>
                            <div style=\"margin-top: 7%;\"><strong>Total Price:</strong> <span id=\"total_price\">$" . $price . "</span></div><br>
                        </section>
                        <aside class=\"ticket_link\">
                            <!--%20 spazio con url encoding, è anche un rfc-->
                            <a href=\"pages/OrderHistory/ticket.php?titolo=" . $name . "&rampa=" . $location . "&partenza=" . $partenza . "&num_ordine=" . $r['idacquisto'] . "\">Click Here</a>
                            </aside>
                    </div>
                </div>";
        }
    } else {
        echo "Error: " . pg_last_error($db_connection);
    }

    pg_close($db_connection);
    ?>
</div>

    </section>
</main>
</body>
</html>