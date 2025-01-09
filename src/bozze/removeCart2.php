<?php
$prodotto = $_GET['nome'];
$cart = json_decode($_COOKIE['cart'], true); // true per ottenere un array associativo

// Cerca il prodotto nel carrello e rimuovilo
foreach ($cart as $key => $sottoarray) {
    if ($sottoarray['nome'] == $prodotto) {
        unset($cart[$key]);
        break;
    }
}

// aggiorna il carrello nei cookie
setcookie('cart', json_encode($cart), time() + 3600);
header("Location: carrello_prova.php");
?>