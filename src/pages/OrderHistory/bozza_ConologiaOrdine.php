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
            background-image: url("st_space.jpg");
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
        aside{
            border: 3px solid blue;
            width: 20%;
            height: 80%;
            margin: auto;
        }
        section{
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
        }
        .mini_order{
            margin-top: 1rem;
            border: 3px solid blue;
            height: 33%;
            width: 100%;
            border-radius: 25px;
            background-color: #F2F3F4;
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
    <aside>
        menu
    </aside>
    <section>
        ordini
        <div id="list_ord">
            <div class="mini_order">
                Order Number: #<span id="today"></span><script>today();</script><br>

            </div>
            <div class="mini_order">ciao</div>
            <div class="mini_order">ciao</div>
            <div class="mini_order">ciao</div>
            <div class="mini_order">ciao</div>
            <div class="mini_order">ciao</div>
            <div class="mini_order">ciao</div>

        </div>
    </section>
</main>
<? require_once '../../components/footer/footer.html' ?>
</body>
</html>