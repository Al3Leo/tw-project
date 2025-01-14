<?php
//non giocare con questo file
//connessione
echo "start...<br>";
$host = 'localhost';
$port = '5432';
$db = 'GRUPPO05';
$username = 'www';
$password = 'tw2024';
$connection_string = "host=$host port=$port dbname=$db user=$username password=$password";
$db_connection = pg_connect($connection_string) or die('impossibile connettersi al databse<br>' . pg_last_error());
echo "connected<br>";
//reset info_database
echo "reset info db<br>";
$sql = "UPDATE info_server SET numero_utenti=0";
pg_query($db_connection, $sql) or die('er1');
$sql = "UPDATE info_server SET numero_visite=0";
pg_query($db_connection, $sql) or die('er2');
$sql = "UPDATE info_server SET id_utenti=1";
pg_query($db_connection, $sql) or die('er3');
echo "db info nuked<br>";
echo "reset users<br>";
$sql = "DELETE FROM utente";
$result = pg_query($db_connection, $sql) or die('er4');
echo "users nuked<br>";
//end and close
pg_close($db_connection);
?>