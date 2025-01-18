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
        }
        #main_history{
            border: 3px solid red;
            margin: auto;
            display: flex;
            flex-direction: row;
            color: red;
            height: 95%;
            margin-top: 1.5em;
        }
        #menu_ordini{
            border: 1px solid blue;
            width: 20%;
            height: 80%;
            margin: auto;
            display: flex;
            flex-direction: column;
            background-color: rgba(0, 0, 0, 0.5);
            border-radius: 20px;
        }
        .opzione{
            border: 1px solid #aaff00;
            height: 20%;
        }
        #ordini{
            border: 3px solid green;
            width: 75%;
            height: 80%;
            margin: auto;
        }
        #list_ord{
            border: 3px solid #e600ff;
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
            border: 3px solid blue;
            height: 33%;
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
            margin-right: 5rem;
            margin-top: 7%;
            font-weight: bold;
            font-size: 3em;
        }
        .ticket_link:hover{
            color: #8546ff;
            transition: 0.3s;
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
            a
        </div>
        <div class="opzione">
            b
        </div>
        <div class="opzione">
            c
        </div>
        <div class="opzione">
            d
        </div>
        <div class="opzione">
            e
        </div>
    </aside>
    <section id="ordini">
        <div id="list_ord">
            <div class="mini_order">
                <div class="row">
                    <section style="margin-left: 1%; display:flex; flex-direction:column; gap: 0.1%;">
                        Order Number: #<span id="today"></span><script>today();</script><br>
                        Trip name: <span id="total_price"></span><br>
                        Launch Location: <span id="launch_loc"></span><br>
                        Launch Date: <span id="launch_date"></span><br>
                        Return Date: <span id="return_date"></span><br>
                        Total Price: <span id="total_price"></span><br>
                    </section>
                    <aside class="ticket_link">
                        il tuo biglietto qui
                    </aside>
                </div>
            </div>
            <div class="mini_order">
                <section style="margin-left: 1%; display:flex; flex-direction:column; gap: 0.1%;">
                    Order Number: #<span id="today"></span><script>today();</script><br>
                    Trip name: <span id="total_price"></span><br>
                    Launch Location: <span id="launch_loc"></span><br>
                    Launch Date: <span id="launch_date"></span><br>
                    Return Date: <span id="return_date"></span><br>
                    Total Price: <span id="total_price"></span><br>
                </section>
            </div><div class="mini_order">
                <section style="margin-left: 1%; display:flex; flex-direction:column; gap: 0.1%;">
                    Order Number: #<span id="today"></span><script>today();</script><br>
                    Trip name: <span id="total_price"></span><br>
                    Launch Location: <span id="launch_loc"></span><br>
                    Launch Date: <span id="launch_date"></span><br>
                    Return Date: <span id="return_date"></span><br>
                    Total Price: <span id="total_price"></span><br>
                </section>
            </div><div class="mini_order">
                <section style="margin-left: 1%; display:flex; flex-direction:column; gap: 0.1%;">
                    Order Number: #<span id="today"></span><script>today();</script><br>
                    Trip name: <span id="total_price"></span><br>
                    Launch Location: <span id="launch_loc"></span><br>
                    Launch Date: <span id="launch_date"></span><br>
                    Return Date: <span id="return_date"></span><br>
                    Total Price: <span id="total_price"></span><br>
                </section>
            </div><div class="mini_order">
                <section style="margin-left: 1%; display:flex; flex-direction:column; gap: 0.1%;">
                    Order Number: #<span id="today"></span><script>today();</script><br>
                    Trip name: <span id="total_price"></span><br>
                    Launch Location: <span id="launch_loc"></span><br>
                    Launch Date: <span id="launch_date"></span><br>
                    Return Date: <span id="return_date"></span><br>
                    Total Price: <span id="total_price"></span><br>
                </section>
            </div><div class="mini_order">
                <section style="margin-left: 1%; display:flex; flex-direction:column; gap: 0.1%;">
                    Order Number: #<span id="today"></span><script>today();</script><br>
                    Trip name: <span id="total_price"></span><br>
                    Launch Location: <span id="launch_loc"></span><br>
                    Launch Date: <span id="launch_date"></span><br>
                    Return Date: <span id="return_date"></span><br>
                    Total Price: <span id="total_price"></span><br>
                </section>
            </div><div class="mini_order">
                <section style="margin-left: 1%; display:flex; flex-direction:column; gap: 0.1%;">
                    Order Number: #<span id="today"></span><script>today();</script><br>
                    Trip name: <span id="total_price"></span><br>
                    Launch Location: <span id="launch_loc"></span><br>
                    Launch Date: <span id="launch_date"></span><br>
                    Return Date: <span id="return_date"></span><br>
                    Total Price: <span id="total_price"></span><br>
                </section>
            </div><div class="mini_order">
                <section style="margin-left: 1%; display:flex; flex-direction:column; gap: 0.1%;">
                    Order Number: #<span id="today"></span><script>today();</script><br>
                    Trip name: <span id="total_price"></span><br>
                    Launch Location: <span id="launch_loc"></span><br>
                    Launch Date: <span id="launch_date"></span><br>
                    Return Date: <span id="return_date"></span><br>
                    Total Price: <span id="total_price"></span><br>
                </section>
            </div>

        </div>
    </section>
</main>
<? require_once '../../components/footer/footer.html' ?>
</body>
</html>