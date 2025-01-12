<?php
/*
 * il carrello è un array di informazioni,
 * informaazioni che sono a loro volta array
 * in fine il carrello è salvato in stringa con encoder json nei cookie
 */
session_start();

// Connessione al database
$host = 'localhost';
$port = '5432';
$db = 'GRUPPO05';
$username = 'www';
$password = 'tw2024';
$connection_string = "host=$host port=$port dbname=$db user=$username password=$password";
$db_connection = pg_connect($connection_string) or die('Impossibile connettersi al database<br>' . pg_last_error());

$id = $_GET['id'];
$query = "SELECT nomeevento, prezzoevento FROM viaggio WHERE idevento='$id'";
$return = pg_query($db_connection, $query) or die('Errore: ' . pg_last_error($db_connection));
$prodotto = pg_fetch_assoc($return);
pg_close($db_connection);

// Se il carrello non esiste nei cookie lo crea vuoto altrimenti decoder
if (isset($_COOKIE['cart'])) {
    $cart = json_decode($_COOKIE['cart'], true);
} else {
    $cart = [];
}

$info = array(
    "nome" => $prodotto['nomeevento'] ?? null,
    "prezzo" => $prodotto['prezzoevento'] ?? null
);

    $duplicato = false;
    foreach ($cart as $index_main_array => $sottoarray) {
        if ($sottoarray['nome'] == $prodotto['nomeevento']) {
            $duplicato = true;
            break;
        }
    }
// se il prodotto non è un duplicato, aggiungilo al carrello
    if (!$duplicato) {
        $cart[] = $info;
    }

    setcookie('cart', json_encode($cart), time() + 3600, "/");

    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit();

?>
