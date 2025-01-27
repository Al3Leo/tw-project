<?php
/*
 * Questo script php consente di prelevare tutti i viaggi univoci (non duplicati) del catalogo dal database, con il relativo tipo.
 *  Puó essere usato per prelevare tutte le generiche destinazioni, le quali vengono salvate in un array associativo.
 */
$getItems = "SELECT DISTINCT nomeevento,etichetta FROM viaggio";     //ottengo i viaggi presenti nel db
$catalogueUniqueItems = pg_query($db_connection, $getItems) or die('Item not found! found! ' . pg_last_error());
$eventsArray = []; //array contente tutti gli item del catalogo
if ($catalogueUniqueItems) {
    while ($row = pg_fetch_assoc($catalogueUniqueItems)) {  // itero su tutte le righe ottenute dalla query
        $eventsArray[$row['nomeevento']] = $row['etichetta']; // key: nome corpo celeste, value: tipologia
    }
    /*print_r($eventsArray);*/
    $jsonUniqueEventsArray = json_encode($eventsArray); //converte l'array in json per manipolarlo piú facilmente con js
}
?>