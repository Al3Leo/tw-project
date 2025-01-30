<?php
/*
 *  Questo script php consente di prelevare tutti i viaggi univoci (non duplicati) del catalogo dal database, con il relativo tipo (etichetta) e il prezzo .
 *  Puó essere usato per prelevare tutte le generiche destinazioni, le quali vengono salvate in un array associativo, la cui chiave corrisponde al nome dell'evento, mentre
 *  il tipo corrisponde all'etichetta, ossia alla tipologia del viaggio.
 *  Un secondo array 'priceArray', é sfruttato invece per salvare le coppie nomeEvento => prezzo.
 */

$getItems = "SELECT DISTINCT nomeevento,etichetta,prezzoevento FROM viaggio ORDER BY etichetta, nomeevento";     //ottengo i viaggi presenti nel db
$catalogueUniqueItems = pg_query($db_connection, $getItems) or die('Item not found! found! ' . pg_last_error());
$eventsArray = []; //array contente tutti gli item del catalogo
if ($catalogueUniqueItems) {
    while ($row = pg_fetch_assoc($catalogueUniqueItems)) {  // itero su tutte le righe ottenute dalla query
        $eventsArray[$row['nomeevento']] = $row['etichetta']; // key: nome corpo celeste, value: tipologia
        $priceArray[$row['nomeevento']] = $row['prezzoevento'];
    }
    $jsonUniqueEventsArray = json_encode($eventsArray); //converte l'array in json per manipolarlo piú facilmente con js
    $jsonUniquePriceArray = json_encode($priceArray); 
}
pg_close($db_connection);
?>