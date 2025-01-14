<?php
//connessione
$host = 'localhost';
$port = '5432';
$db = 'GRUPPO05';
$username = 'www';
$password = 'tw2024';
$connection_string = "host=$host port=$port dbname=$db user=$username password=$password";
$db_connection =pg_connect($connection_string) or die('impossibile connettersi al databse<br>'.pg_last_error());
//query, prende nome e prezzo di un evento (genericamente oggetto)
$id=$_POST['id'];
$query = "SELECT nomeevento FROM viaggio WHERE idevento='$id'";
$return = pg_query($db_connection, $query) or die('errore: ' . pg_last_error($db_connection));
$prodotto=pg_fetch_row($return)[0];

//trova unsetta e salva
$cart = unserialize($_COOKIE['cart']);
foreach ($cart as $indice => $sottoarray) {
    if ($sottoarray['nome'] === $prodotto)
        unset($cart[$indice]);
}


setcookie('cart', serialize($cart), time() + 3600);
header("Location: carrello_prova.php");
?>