<?php
require_once "ConnettiDb.php";

if (isset($_GET['destination'])) {
    $destination = $_GET['destination'];
    $query = "SELECT nomeevento FROM viaggio WHERE nomeevento = '$destination'"; 

    $result= pg_query($db_connection, $query)or die('Item not found! ' . pg_last_error());
    $eventsName = []; //Puó essere sfruttato in futuro per implementare una ricerca progressiva

    while ($row = pg_fetch_assoc($result)) {  // itero su tutte le righe ottenute dalla query (in questo caso restituisce 1 solo elemento)
        $eventsName[] = $row['nomeevento'];
    }

    pg_close($db_connection);

    echo json_encode($eventsName); //restituisco i dati in formato json
}
?>
