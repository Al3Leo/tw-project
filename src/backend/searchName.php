<?php
require_once "ConnettiDb.php";

if (isset($_GET['destination'])) {
    $destination = ucfirst(strtolower($_GET['destination'])); /* Rendo maiuscola l'iniziale e minuscolo il resto */
    $query = "SELECT DISTINCT nomeevento, etichetta FROM viaggio WHERE nomeevento = '$destination'"; 

    $result= pg_query($db_connection, $query)or die('Item not found! ' . pg_last_error());
    $eventsName = []; //Puó essere sfruttato in futuro per implementare una ricerca progressiva
    while ($row = pg_fetch_assoc($result)) {  // itero su tutte le righe ottenute dalla query (in questo caso restituisce 1 solo elemento)
        $eventsName[]= [
            'nomeevento' => $row['nomeevento'],
            'etichetta' => $row['etichetta']
        ]; 
    }
}
pg_close($db_connection);
if(isset($eventsName)){
    echo json_encode($eventsName); //restituisco i dati in formato json
}
?>
