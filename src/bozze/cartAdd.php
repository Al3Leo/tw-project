<?php
function addToCart($qty_total, $prodotto, $prezzo, $cart) {
    // Aggiungi il prodotto al carrello con l'indice qty_total solo se non gia presente
    foreach ($cart as $key => $sottoarray) {
        if ($sottoarray['nome'] == $prodotto)
            return $cart;
    }
    $cart[$qty_total] = array(
        "nome" => $prodotto,
        "prezzo" => $prezzo
    );
    return $cart;
}

session_start();
// Connessione al database
$host = 'localhost';
$port = '9999';
$db = 'GRUPPO05';
$username = 'www';
$password = 'tw2024';
$connection_string = "host=$host port=$port dbname=$db user=$username password=$password";
$db_connection = pg_connect($connection_string) or die('Impossibile connettersi al database<br>' . pg_last_error());

// Query per ottenere nome e prezzo del prodotto
$id = $_POST['id'];
$query = "SELECT nomeevento FROM viaggio WHERE idevento='$id'";
$return = pg_query($db_connection, $query) or die('Errore: ' . pg_last_error($db_connection));
$prodotto = pg_fetch_row($return)[0];

$query = "SELECT prezzoevento FROM viaggio WHERE idevento='$id'";
$return = pg_query($db_connection, $query) or die('Errore: ' . pg_last_error($db_connection));
$prezzo = pg_fetch_row($return)[0];

pg_close($db_connection);

// Se il carrello non esiste nei cookie, lo crea vuoto
if (isset($_COOKIE['cart'])) {
    $cart = unserialize($_COOKIE['cart']);
} else {
    $cart = [];
}

// Se qty_total esiste nei cookie, incrementalo, altrimenti inizializzalo a 0
if (isset($_COOKIE['qty_total'])) {
    $qty_total = $_COOKIE['qty_total'] + 1;
} else {
    $qty_total = 0;
}

// aggiungi il prodotto al carrello
$cart = addToCart($qty_total, $prodotto, $prezzo, $cart);

// salva il carrello aggiornato nei cookie e aggiorna qty_total
setcookie('cart', serialize($cart), time() + 3600);
setcookie('qty_total', $qty_total, time() + 3600);

// ritorna al carrello
header("Location: carrello_prova.php");
?>