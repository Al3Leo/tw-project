<?php
//connessione
require_once "ConnettiDb.php";

if (isset($_GET['range'])) {
    $range = $_GET['range'];
    $sql = "SELECT nomeevento FROM viaggio WHERE "; //query selezione

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
    $eventsBudget = []; //Array che deve contenere i solo i corpi celeste che rispecchiano il budget
    //verifico l'esito dell'operazione di selezione
    if($result){
        while ($row = pg_fetch_assoc($result)) {  // itero su tutte le righe ottenute dalla query
            if (!in_array($row['nomeevento'], $eventsBudget)) { //inserisco nell array una sola volta il nome del corpo celeste che soddisfa il budget
                $eventsBudget[] = $row['nomeevento'];
            }
        }
    }else{
        echo "Error:". pg_last_error($db_connection);
    }
    pg_close($db_connection);
    // Restituisci i dati come JSON
    echo json_encode($eventsBudget);
}
?>
