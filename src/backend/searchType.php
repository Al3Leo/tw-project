<?php
require_once "ConnettiDb.php";
error_reporting(E_ALL);
ini_set('display_errors', 'On');

if (isset($_GET['type'])) {
    $type = $_GET['type'];
    $query = "SELECT DISTINCT nomeevento , etichetta FROM viaggio WHERE etichetta = '$type'";
    $eventsType = []; //array contente gli eventi

    $result = pg_query($db_connection, $query)or die('Item not found! ' . pg_last_error());
    while ($row = pg_fetch_assoc($result)) { 
        $eventsType []= [
            'nomeevento' => $row['nomeevento'],
            'etichetta' => $row['etichetta']
        ]; 
    }
} 
pg_close($db_connection);
if(isset($eventsType)){
    echo json_encode($eventsType);
}
?>
