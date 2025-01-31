<?php
//connessione
require_once "ConnettiDb.php";
ini_set('display_errors', 'On');
ini_set('display_errors', 1);
ini_set('display_errors', '1');

if (isset($_GET['type'])) {
    $type = $_GET['type'];
    $sql = "SELECT DISTINCT nomeevento,etichetta FROM viaggio WHERE etichetta = '$type'";
    $eventsType = []; //array contente

    $result = pg_query($db_connection, $query)or die('Item not found! ' . pg_last_error());
    while ($row = pg_fetch_assoc($result)) { 
        $eventsBudget []= [
            'nomeevento' => $row['nomeevento'],
            'etichetta' => $row['etichetta']
        ]; 
    }
    
    pg_close($db_connection);
    echo json_encode($eventsType);
}
?>
