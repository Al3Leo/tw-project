<html>
<?php
//questa pagina si apre con una richiesta get che mi manda l'id evento e la partenza
session_start();

$fullname=$_SESSION['name']." ".$_SESSION['surname'];
$partenza=$_GET['partenza']; //stringa in formato "2025-02-28"
require_once "../../backend/ConnettiDb.php";
//finire
?>
?>
<head>
    <title>your floppy ticket</title>
    <meta charset="UTF-8">
    <style>
        @import url('https://fonts.cdnfonts.com/css/nasa');

        body{
            background-color: #000000;
        }
        .orderInfo{
            color: white;
            width: 50%;
            text-align: center;
            padding: 1rem;
            margin: auto;
        }
        #ordine{
            display: flex;
            flex-direction:column;
            color: #ffffff;
            width: 50%;
            height: 75%;
            box-shadow: 0px 0px 7px #000000;
            border-radius: 15px;
            margin: auto;
            margin-top: 2rem;
            background-color: #ff7500;
        }
        #linguetta{
            position: relative;
            background-color: #b6b6b6;
            width: 70%;
            height: 100%;
            border-radius: 10px 10px 0px 0px;
        }
        #vuoto{
            position: absolute;
            margin-left: 15%;
            margin-top: 3%;
            height: 87%;
            width: 25%;
            background-color: #ff7300;
            border-radius: 5px;
        }
        @media (max-height: 650px) {
            #vuoto {
                height: 10%;
            }
        }
        #senzanome{
            width: 55%;
            height: 30%;
            border: 3px solid #000000;
            border-bottom: 0px;
            border-radius: 12px 12px 0px 0px;
            margin: auto auto 0 auto;
        }
        #qr{
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        #descrizione{
            font-family: 'Nasa', sans-serif;
            font-size: 2rem;
        }
        #data{
            font-family: Arial, Verdana, sans-serif;
        }
        #sfondo{
            top: 0;
            margin: 0px;
            padding: 0px;
            position: fixed;
            min-width: 100%;
            min-height: 100%;
            z-index: -1;
        }

        @media print {
            @import url('https://fonts.cdnfonts.com/css/nasa');

            body{
                background-color: #ffffff;
            }
            #ordine{
                width: 700px;
                height: 700px;

            }
        }
        #elichetta_floppydisk{
            border: 2px solid #000000;
            width: 75%;
            background-color: #e0e0e0;
            margin: auto;
        }
    </style>
</head>
<body>
<video autoplay muted loop src="spaceBackgroung.mp4" id="sfondo" >
    Video cannot be displayed.
</video>
<main id="ordine">
<div id="elichetta_floppydisk">
    <section class="orderInfo" id="descrizione">
        <?php
        echo "<span style='color: blue'>IL TUO VIAGGIO SPAZIALE</span></span><br><span style='color: red'>".$nome."</span>";
        ?>
    </section>
    <section class="orderInfo" id="data">
        <?php
        $oggi=time();
        $partenza=strtotime($partenza);
        $diff=($oggi-$partenza)/(60*60*24);
        echo "SI PARTE TRA ".floor($diff)." GIORNI"; //floor arrotonda in basso
        ?>
    </section>
    <section class="orderInfo">
        <?php
        echo "destinazione mare";
        ?>
    </section>
    <section class="orderInfo" id="qr">
        <iframe src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=Example" style="width: 150px">iframe error</iframe>
    </section>
</div>

    <div id="senzanome">
        <div id="linguetta">
            <div id="vuoto">
            </div>
        </div>
    </div>
</main>
</body>
</html>