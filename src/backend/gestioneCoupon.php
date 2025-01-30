<?php
/**
 * questo file viene utilizzato nella homepage,php per la gestione della home dinamica:
 * se l'utente loggato ha effettuato almeno un acquisto la funzione mostraCoupon restituisce true, altrimenti false.
 */
require_once "ConnettiDb.php";
function mostraCoupon(){
    global $db_connection;
    if (isset($_SESSION['username'])) {
        $acquirente = $_SESSION['username'];
        $sql = "SELECT * FROM acquisti WHERE acquirenteuser='$acquirente' "; //query selezione
        $result = pg_query($db_connection, $sql); //esecuzione della query
        if ($result) {
            if (pg_num_rows($result) > 0) {
                //se la query restituisce qualcosa significa che l'utente ha fatto acquisti per cui
                //non viene mostrato il coupon
                return false;
            } else {
                //l'utente non è presente nella tabella acquisti del db-> non ha mai fatto 
                //un ordine per cui puo ricevere il coupon
                return true;
            }
        } else {
            echo "Errore nella query: " . pg_last_error($db_connection);
            return null; 
        }
    }return null; 
}
$mostraCoupon = mostraCoupon();
pg_close($db_connection);
?>