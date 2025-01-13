<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="conferma.css">

</head>
<body >
<?php require_once __DIR__ . '/../components/header/header.php'?>
<main class=" mainconfirm d-flex  flex-column align-items-center justify-content-center"  >
    
    <div class="confirm_div d-flex justify-content-evenly flex-column "  style="border: 2px solid #000;
    border-radius: 15px;">
        <div class="div_up d-flex  flex-column align-items-center"  style="border: 2px solid #000;
    border-radius: 15px; padding:1em" >
            <img alt="svgImg" src="check.jpg"/> 
        </div>
        <div class="div_down d-flex  flex-column align-items-center" style="margin: 1em">
        <?php if (isset($_GET['confirmsignupname'])){ //se il parametro  'confirmsignup' e presente nell'url
        $name=$_GET['confirmsignupname'];
        echo "<p>Hello <strong>$name</strong>, your registration has been successfully completed.<br>Continue your experience on our site, and don't miss out on our latest offers and special deals.</p>";
     }elseif(isset($_GET['confirmcheckout'])){
        echo"<p>Thank you for your purchase. Your payment has been successfully processed.<br> <p>Continue enjoying our services and be sure to check out our latest offers and exclusive deals.</p>";
     }
 ?>
        <button>Continue</button></div>  
    </div>

</main>
<?php require_once __DIR__ ."../../components/footer/footer.html"?>
</body>

<script>

</script>
</html>