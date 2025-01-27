<?php
//query
$idvolo=$r['idvolo'];
// Valore variabile (esempio)
$idvolo = $r['idvolo'];
$query = "SELECT * FROM viaggio WHERE idevento = $1";
$return = pg_query_params($db_connection, $query, [$idvolo]);
if($return) {
    $row = pg_fetch_assoc($return);
    if ($row) {
        $price = $row["prezzoevento"];
        $name = $row["nomeevento"];
        $ritorno = $row["dataritorno"];
        $partenza = $row["datapartenza"];
        $location = $row['launchlocation'];
    } else {
        $price = 0;
        $name = "null";
        $ritorno = "null";
        $partenza = "null";
        $location = "null";
    }
}
?>