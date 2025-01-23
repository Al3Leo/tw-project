<?php
//questo file accede al nome del volo, prezzo, data partenza/ritorno, numero ordine (omessi dati che non servono alla pagina della cronologia
//connessione al db
$host = "localhost";
$port = '5432';
$db_name = "GRUPPO05";
$user = "www";
$password = "tw2024";
$connection_string = "host=$host dbname=$db_name user=$user password=$password";
$db_connection = pg_connect($connection_string) or die('Impossibile connettersi al database<br>' . pg_last_error());
//query
$usercliente=$_SESSION['username'];
$query="SELECT (numeroordine, idvolo) FROM acquisti where acquirenteuser=$usercliente";//non interagendo con l'utente non la proteggo da sql injection
$result = pg_query($query);
$row=pg_fetch_assoc($result);
$idvolo=$row['idvolo'];
$numord=$row['numeroordine'];
$query="SELECT (prezzoevento, nomeevento, datapartenza, dataritorno, launchlocation) FROM viaggio where id=$1";
$result=pg_prepare($db_connection, "get_info1", $query);
if($result){
    $return=pg_execute($db_connection, "get_info1", array($idvolo));
    $row=pg_fetch_assoc($return);
    if($row){
        $price=$row["prezzoevento"];
        $name=$row["nomeevento"];
        $ritorno=$row["dataritorno"];
        $partenza=$row["datapartenza"];
    }
    else{
        $price=0;
        $name="null";
        $ritorno="null";
        $partenza="null";
    }
} else echo "error query";
pg_close($db_connection);
echo "prova".$price.$name.$ritorno.$partenza;
exit();
?>