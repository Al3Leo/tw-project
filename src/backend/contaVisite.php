<?php
if(!isset($_COOKIE['biscotto'])){
    setcookie("biscotto", "oreo", time()+(600));
    // Connessione
    require_once "ConnettiDb.php";
    //query
    $sql = "UPDATE info_server SET numero_visite = numero_visite+1";
    pg_query($db_connection, $sql) or die('Errore update numero visite: '.pg_last_error());
}
?>