<?php
/*
 * Questo script php consente di prelevare tutti gli item (viaggi) del catalogo dal database. Puó essere usato per 
 * prelevare tutte le destinazioni, le quali vengono salvate in un array associativo.
 *
 */
$getItems = "SELECT DISTINCT nomeevento FROM viaggio";     //ottengo i viaggi presenti nel db
$catalogueItems = pg_query($db_connection, $getItems) or die('No price found! ' . pg_last_error());
$eventsArray = []; //array contente tutti gli item del catalogo
if ($catalogueItems) {
    while ($row = pg_fetch_assoc($catalogueItems)) {  // itero su tutte le righe ottenute dalla query
        $eventsArray[$row['nomeevento']] = $row['nomeevento']; // uso un array associativo la cui chiave é uguale al valore
    }
    /*print_r($eventsArray);*/
    $jsonEventsArray = json_encode($eventsArray); //converte l'array in json per manipolarlo piú facilmente con js
}
