<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 4fcf1090370b23b13499b7123b1ef615008c71c0
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <base href="../">
    <style>
    @import "assets/css/Global.css";

*{
    box-sizing: border-box;
}
.mainconfirm .confirm_div {
    gap: 0.5em;
    background-color: aliceblue;
    width: 50vh;
    height: auto;
    box-shadow: 0 20px 30px rgba(205, 231, 10, 0.185);
}

.confirm_div .div_down p{
    color: rgb(40, 39, 39);
    
}
.confirm_div>div:first-child{
    background-color: #7f0ab9;
    text-shadow:0 0.15ch 15px oklch(25% 0.2  320),0 -2px 0 oklch(98% 0.05  320);
}
body{
    height: 100vh;
}
.confirm_div .div_up img{
object-fit: contain;
}
main {height: 65vh; 
   }
   .confirm_div .div_down p{
    font-size: 0.7em;
   }   
    </style>

</head>
<body >
<?php require_once __DIR__ . '../../components/header/header.php'?>
<main class=" mainconfirm d-flex  flex-column align-items-center justify-content-center"  >
    
    <div class="confirm_div d-flex justify-content-evenly flex-column "  style="border: 2px solid #000;
    border-radius: 15px;">
        <div class="div_up d-flex  flex-column align-items-center"  style="border: 2px solid #000;
    border-radius: 15px; padding:1em" >
            <img alt="svgImg" src="assets/images/check.jpg"/> 
        </div>
        <div class="div_down d-flex  flex-column align-items-center" style="margin: 1em">
        <?php if (isset($_GET['confirmsignupname'])){ //se il parametro  'confirmsignup' e presente nell'url
        $name=$_GET['confirmsignupname'];
        echo "<p>Hello <strong>$name</strong>, your registration has been successfully completed.<br>Continue your experience on our site, and don't miss out on our latest offers and special deals.</p>";
     }elseif(isset($_GET['confirmcheckout'])){
        echo"<p>Thank you for your purchase. Your payment has been successfully processed.<br> <p>Continue enjoying our services and be sure to check out our latest offers and exclusive deals.</p>";
     }
 ?>
 <button onclick="apriHome()">Continue</button></a>
        </div>  
    </div>

</main>
<?php require_once __DIR__ ."../../components/footer/footer.html"?>
</body>

<script>
function apriHome(){
    window.location.href='pages/homepage/homepage.php';
}
</script>
<html>
    
<!-- A cosa serve questo file> -->

<head>
    <meta charset="UTF-8">
    <title>Conferma</title>
    <base href="../" />
    <style>
        @import '../css/Global.css';

        body {
            background-image: linear-gradient(75deg, rgb(14, 11, 19), rgb(82, 0, 124));
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
        }

        #goHome {
            display: inline-block;
            color: white;
            font-weight: bold;
            background-color: #008cff;
            border-radius: 5px;
            font-size: 1.2em;
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
    </style>
</head>

<body>
    <?php include_once '../html/TopMenu.php' ?>
    <main>
        <div id="conferma"><?php echo $_GET["confermaDinamica"] ?></div>
        <a href="php/index.php" style="text-decoration: none;">
            <div id="goHome">Home</div>
        </a>
    </main>
    <?php include_once '../html/Footer.html' ?>
</body>
</html>