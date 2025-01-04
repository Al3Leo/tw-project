<?php
echo "Connetto...<br>";

$host = 'localhost';
$port = '9999';
$db = 'GRUPPO05';
$username = 'www';
$password = 'tw2024';

// Crea la stringa di connessione
$connection_string = "host=$host port=$port dbname=$db user=$username password=$password";

// Connetti al database
$db_connection = pg_connect($connection_string) or die('Non va bene: ' . pg_last_error());

echo "Connesso al database<br>";

// Query di inserimento
$sql = "INSERT INTO utente(username) VALUES('gamer')";

// Esegui la query
pg_query($db_connection, $sql);

// Messaggio di fine
echo "Fine";

// Chiudi la connessione
pg_close($db_connection);
?>