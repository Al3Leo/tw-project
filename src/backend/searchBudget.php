<?php
//connessione
require_once "ConnettiDb.php";

if (isset($_GET['range'])) {
    $range = $_GET['range'];
    $sql = "SELECT nomeevento, etichetta FROM viaggio WHERE "; //query selezione

    if ($range == '< 2000') {
        $sql .= "prezzoevento <= 2000";
    } elseif ($range == '2000 | 3000') {
        $sql .= "prezzoevento BETWEEN 2000 AND 3000";
    } elseif ($range == '3000 | 4000') {
        $sql .= "prezzoevento BETWEEN 3000 AND 4000";
    } elseif ($range == '> 4000') {
        $sql .= "prezzoevento > 4000";
    }
    $result= pg_query($db_connection, $sql);//esecuzione della query
    $eventsBudget = [];//array che deve contenere i solo i corpi celeste che rispecchiano il budget e la loro etichetta
    $eventiInseriti = []; //array per tener traccia di quelli inseriti, cosi da evitare i duplicati
    //verifico l'esito dell'operazione di selezione
    if($result){
        while ($row = pg_fetch_assoc($result)) {
            // itero su tutte le righe ottenute dalla query
            if (!isset($eventiInseriti[$row['nomeevento']])) { //inserisco nell sottoarray una sola volta il nome del corpo celeste e la relativa etichetta che soddisfa il budget
                //se la condizione è falsa cioè non è gia stata inserita in eventiInseriti allora inserisco etichetta e corpo celleste in eventsBudget
                $eventsBudget []= [
                    'nomeevento' => $row['nomeevento'],
                    'etichetta' => $row['etichetta']
                ]; 
                //segno come inserito anche nel eventInseriti cosi da non ripeterli dopo
                $eventiInseriti[$row['nomeevento']] = true;
            }
        }
    }else{
        echo "Error:". pg_last_error($db_connection);
    }
    pg_close($db_connection);
    echo json_encode($eventsBudget);
}
?>
