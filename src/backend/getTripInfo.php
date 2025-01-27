<?php
/*
    Questo script php consente di prelevare dal db le informazioni (righe) associate ad un determinato viaggio,
    il cui nome é stato precedentemente salvato nella variabile $nomeEvento.
*/
if (isset($nomeEvento)) {
    // Prelevo le informazioni relative al viaggio
    $getItems = "SELECT * FROM viaggio WHERE nomeevento = '$nomeEvento'";
    $query = pg_query($db_connection, $getItems) or die('Item not found! ' . pg_last_error());

    $infoArray = []; // Array contenente tutti gli eventi associati

    if ($query) {
        while ($row = pg_fetch_assoc($query)) { // Itero su tutte le righe ottenute dalla query
            // Controllo e inizializzo l'array associato alla chiave 'nomeevento'
            if (!isset($infoArray[$row['nomeevento']])) {
                $infoArray[$row['nomeevento']] = []; // Inizializza l'array se non esiste
            }

            // Aggiungo i valori all'array associato alla chiave 'nomeevento'
            $infoArray[$row['nomeevento']][] = [
                "idevento" => $row['idevento'],
                "prezzoevento" => $row['prezzoevento'],
                "etichetta" => $row['etichetta'],
                "datapartenza" => $row['datapartenza'],
                "dataritorno" => $row['dataritorno'],
                "launchlocation" => $row['launchlocation'],
                "destination"=> $nomeEvento
            ];
        }

        // Converte l'array in JSON per manipolarlo facilmente con JS
        $jsonTripInfoArray = json_encode($infoArray, JSON_PRETTY_PRINT); // Aggiunto JSON_PRETTY_PRINT per leggibilità
    }
}
