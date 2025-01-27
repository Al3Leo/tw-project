<?php
/*
 * il carrello è un array di informazioni,
 * informaazioni che sono a loro volta array
 * in fine il carrello è salvato in stringa con encoder json nei cookie
 */
session_start();

// Connessione al database
require_once __DIR__ . "/ConnettiDb.php";

$id = $_POST['id'];
$query = "SELECT * FROM viaggio WHERE idevento='$id'";

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
    "nome" => $prodotto['nomeevento'],
    "prezzo" => $prodotto['prezzoevento'],
    "id" => $prodotto['idevento']
);

    $duplicato = false;
    foreach ($cart as $sottoarray) {
        if ($sottoarray['id'] == $prodotto['idevento']) {
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