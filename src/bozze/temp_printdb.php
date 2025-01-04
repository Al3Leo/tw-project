<?php
//connessione
$host = 'localhost';
$port = '9999';
$db = 'GRUPPO05';
$username = 'www';
$password = 'tw2024';
$connection_string = "host=$host port=$port dbname=$db user=$username password=$password";
$db_connection =pg_connect($connection_string) or die('impossibile connettersi al databse<br>'.pg_last_error());
//query
$sql = "SELECT username FROM utente";
$result = pg_query($db, $sql);
if (!$result) {
    die('Errore nella query: ' . pg_last_error($db));
}

while ($row = pg_fetch_assoc($result)) {
    echo $row['username'];
}
//close e free per ottimizzazione anche se si effettuano in automatico alla fine dello script
pg_free_result($result);
pg_close($db);
?>
