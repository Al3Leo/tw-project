<?php
require_once "ConnettiDb.php";

if (isset($_GET['destination'])) {
    $destination = ucfirst($_GET['destination']);
    $query = "SELECT nomeevento, etichetta FROM viaggio WHERE nomeevento = '$destination'"; 

    $result= pg_query($db_connection, $query)or die('Item not found! ' . pg_last_error());
    $eventsName = []; //Puó essere sfruttato in futuro per implementare una ricerca progressiva
    $eventiInseriti = [];
    while ($row = pg_fetch_assoc($result)) {  // itero su tutte le righe ottenute dalla query (in questo caso restituisce 1 solo elemento)
            if (!isset($eventiInseriti[$row['nomeevento']])) { //inserisco nell sottoarray una sola volta il nome del corpo celeste e la relativa etichetta che soddisfa il budget
            //se la condizione è falsa cioè non è gia stata inserita in eventiInseriti allora inserisco etichetta e corpo celleste in eventsBudget
            $eventsName[]= [
                'nomeevento' => $row['nomeevento'],
                'etichetta' => $row['etichetta']
            ]; 
            //segno come inserito anche nel eventInseriti cosi da non ripeterli dopo
            $eventiInseriti[$row['nomeevento']] = true;
        }
    }

    pg_close($db_connection);
    echo json_encode($eventsName); //restituisco i dati in formato json
}
?>
