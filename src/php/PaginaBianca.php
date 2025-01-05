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
<body>

<!--mi sa che il base href vale solo per html e non php-->
<?php include_once '../html/TopMenu.html'?>
<?php require_once '../html/PopupLogin.html' ?>


<main>
    <form method="get" action="ConfermaDinamica.php">
        <input type="hidden" name="confermaDinamica" value="confermato dinamicamente">
        <button type="submit">provami ora!</button>
    </form>
</main>
<br><br>

<?php
echo "<span style='color: #1fe100'>";
if (isset($_SESSION['username'])) {
    echo "Sessione attiva: " . $_SESSION['username']; // Verifica se la sessione è attiva
} else {
    echo "Sessione non trovata.";
}
echo "</span>";
?>
<?php include_once '../html/Footer.html'?>
</body>
</html>