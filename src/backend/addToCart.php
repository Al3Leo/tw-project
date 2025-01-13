<?php
/*
 * il carrello è un array di informazioni,
 * informaazioni che sono a loro volta array
 * in fine il carrello è salvato in stringa con encoder json nei cookie
 */
echo "<script>alert('g');</script>";
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
$id = $_GET['id'];
$query = "SELECT nomeevento FROM viaggio WHERE idevento='$id'";
$return = pg_query($db_connection, $query) or die('Errore: ' . pg_last_error($db_connection));
$prodotto = pg_fetch_row($return)[0];
$query = "SELECT prezzoevento FROM viaggio WHERE idevento='$id'";
$return = pg_query($db_connection, $query) or die('Errore: ' . pg_last_error($db_connection));
$prezzo = pg_fetch_row($return)[0];
pg_close($db_connection);

// Se il carrello non esiste nei cookie lo crea vuoto altrimenti decoder
if (isset($_COOKIE['cart'])) {
    $cart = json_decode($_COOKIE['cart'], true); //associativo? true
} else {
    $cart = [];
}

// preparo il prodotto come array
$info = array(
    "nome" => $prodotto,
    "prezzo" => $prezzo
);

// check se il prodotto è già presente nel carrello
$duplicato = false;
foreach ($cart as $index_main_array => $sottoarray) {
    // Confronta il nome del prodotto
    if ($sottoarray['nome'] == $prodotto) {
        $duplicato = true;
        break;
    }
}
// se il prodotto non è un duplicato, aggiungilo al carrello
if (!$duplicato) {
    $cart[] = $info; // sintassi add at the end
}

setcookie('cart', json_encode($cart), time() + 3600); // Imposta il cookie con il carrello aggiornato
// ritorna al carrello
//header("Location: " . $_SERVER['HTTP_REFERER']);
?>