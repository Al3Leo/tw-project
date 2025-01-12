<?php
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

// Debug: Verifica i dati recuperati dal database
echo "<pre>";
print_r($prodotto);
echo "</pre>";

if (isset($_COOKIE['cart'])) {
    $cart = json_decode($_COOKIE['cart'], true);
} else {
    $cart = [];
}

$info = array(
    "nome" => $prodotto['nomeevento'] ?? null,
    "prezzo" => $prodotto['prezzoevento'] ?? null
);

// Debug: Verifica i dati del prodotto
if ($info['nome'] === null || $info['prezzo'] === null) {
    echo "Dati del prodotto mancanti o non validi.<br>";
} else {
    $duplicato = false;
    foreach ($cart as $index_main_array => $sottoarray) {
        if ($sottoarray['nome'] == $prodotto['nomeevento']) {
            $duplicato = true;
            break;
        }
    }

    if (!$duplicato) {
        $cart[] = $info;
    }

    setcookie('cart', json_encode($cart), time() + 3600, "/");

    // Debug: verifica il contenuto del cookie
    echo "<pre>";
    print_r($cart);
    echo "</pre>";

    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit();
}
?>
