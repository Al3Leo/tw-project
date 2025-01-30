<!DOCTYPE html>
<?php
session_start();
include_once 'contaVisite.php';
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <meta name="Author" content="Gruppo05"/>
    <base href="../"/>
    <link rel="icon" href="img/favicon.png" type="image/png/">
    <link rel="stylesheet" href="css/body.css" type="text/css"/>
    <script src="js/TopMenu.js"></script>
</head>
<body <?php if($_SESSION['username']) echo "onload=\"loggato()\";"?> style="background-color:blue;">

<!--mi sa che il base href vale solo per html e non php-->
<?php require_once 'header.php' ?>


<main>
    <form method="get" action="../backend/ConfermaDinamica.php">
        <input type="hidden" name="confermaDinamica" value="confermato dinamicamente">
        <button type="submit">provami ora!</button>
    </form>
</main>
<br><br>
<script>temp=9;</script>
<?php
echo "<span style='color: #1fe100'>";
if (isset($_SESSION['username'])) {
    echo "Sessione attiva: " . $_SESSION['username'].$_SESSION['name']; // Verifica se la sessione è attiva
} else {
    echo "Sessione non trovata.";
}
echo "</span>";
if (isset($_SESSION['username'])){
    echo "<script>y();</script>";
}
//session_destroy()
?>
<script>
    function y(){
        temp=1970;
    }
    if(temp==1970){
        let usrinfo=document.getElementById("userinfo");
        usrinfo.style.display = "flex";
        let usrinfoList=getElementById("userinfoList");
        usrinfoList.style.display = "flex";
    }
</script>
<?php include_once '../html/Footer.html'?>
</body>
</html>