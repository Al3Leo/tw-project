<?php
if(!isset($_COOKIE['biscotto'])){
    setcookie("biscotto", "oreo", time()+(3));
    // Connessione
    $host = 'localhost';
    $port = '5432';
    $db = 'GRUPPO05';
    $username = 'www';
    $password = 'tw2024';
    $connection_string = "host=$host port=$port dbname=$db user=$username password=$password";
    $db_connection = pg_connect($connection_string) or die('Impossibile connettersi al database: ' . pg_last_error());
    //query
    $sql = "UPDATE info_server SET numero_visite = numero_visite+1";
    pg_query($db_connection, $sql) or die('Errore update numero visite: '.pg_last_error());
}
?>