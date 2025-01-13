<?php
/*
 * il carrello è un array di informazioni,
 * informaazioni che sono a loro volta array
 * in fine il carrello è salvato in stringa con encoder json nei cookie
 */
session_start();
<<<<<<< HEAD
<<<<<<< HEAD

// Connessione al database
$host = 'localhost';
$port = '5432';
=======
// Connessione al database
$host = 'localhost';
$port = '9999';
>>>>>>> eb391e0e1a245688146621b45c06fe21931c7870
=======
// Connessione al database
$host = 'localhost';
$port = '9999';
>>>>>>> 4fcf1090370b23b13499b7123b1ef615008c71c0
$db = 'GRUPPO05';
$username = 'www';
$password = 'tw2024';
$connection_string = "host=$host port=$port dbname=$db user=$username password=$password";
$db_connection = pg_connect($connection_string) or die('Impossibile connettersi al database<br>' . pg_last_error());

<<<<<<< HEAD
<<<<<<< HEAD

$id = $_GET['id'];
$query = "SELECT nomeevento, prezzoevento FROM viaggio WHERE idevento='$id'";



$return = pg_query($db_connection, $query) or die('Errore: ' . pg_last_error($db_connection));
$prodotto = pg_fetch_assoc($return);
=======
// Query per ottenere nome e prezzo del prodotto
$id = $_POST['id'];
=======
// Query per ottenere nome e prezzo del prodotto
$id = $_GET['id'];
>>>>>>> 4fcf1090370b23b13499b7123b1ef615008c71c0
$query = "SELECT nomeevento FROM viaggio WHERE idevento='$id'";
$return = pg_query($db_connection, $query) or die('Errore: ' . pg_last_error($db_connection));
$prodotto = pg_fetch_row($return)[0];
$query = "SELECT prezzoevento FROM viaggio WHERE idevento='$id'";
$return = pg_query($db_connection, $query) or die('Errore: ' . pg_last_error($db_connection));
$prezzo = pg_fetch_row($return)[0];
<<<<<<< HEAD
>>>>>>> eb391e0e1a245688146621b45c06fe21931c7870
=======
>>>>>>> 4fcf1090370b23b13499b7123b1ef615008c71c0
pg_close($db_connection);

// Se il carrello non esiste nei cookie lo crea vuoto altrimenti decoder
if (isset($_COOKIE['cart'])) {
<<<<<<< HEAD
<<<<<<< HEAD
    $cart = json_decode($_COOKIE['cart'], true);
=======
    $cart = json_decode($_COOKIE['cart'], true); //associativo? true
>>>>>>> eb391e0e1a245688146621b45c06fe21931c7870
=======
    $cart = json_decode($_COOKIE['cart'], true); //associativo? true
>>>>>>> 4fcf1090370b23b13499b7123b1ef615008c71c0
} else {
    $cart = [];
}

<<<<<<< HEAD
<<<<<<< HEAD

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

=======
=======
>>>>>>> 4fcf1090370b23b13499b7123b1ef615008c71c0
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

<<<<<<< HEAD

setcookie('cart', json_encode($cart), time() + 3600); // Imposta il cookie con il carrello aggiornato
// ritorna al carrello
header("Location: " . $_SERVER['HTTP_REFERER']);
>>>>>>> eb391e0e1a245688146621b45c06fe21931c7870
=======
setcookie('cart', json_encode($cart), time() + 3600); // Imposta il cookie con il carrello aggiornato
// ritorna al carrello
header("Location: " . $_SERVER['HTTP_REFERER']);
>>>>>>> 4fcf1090370b23b13499b7123b1ef615008c71c0
?>