<?php
//connessione
$host = 'localhost';
$port = '9999';
$db = 'GRUPPO05';
$username = 'www';
$password = 'tw2024';
$connection_string = "host=$host port=$port dbname=$db user=$username password=$password";
$db_connection =pg_connect($connection_string) or die('impossibile connettersi al databse<br>'.pg_last_error());
//get id disponibile
$query = "SELECT numero_visite FROM info_server";
$user_id = pg_query($db_connection, $query) or die('Errore durante la lettura del id: ' . pg_last_error());
//query add
if(!empty($_POST)) {
    $user_nome = $_POST['user_nome'];
    $user_cognome = $_POST['user_cognome'];
    $user_sesso = $_POST['user_sesso'];
    $user_username = $_POST['user_username'];
    $user_password = password_hash($_POST['user_password'], PASSWORD_DEFAULT);
    $sql = "INSERT INTO utente (id, nome, cognome, username, password, sesso) VALUES ($1, $2, $3, $4, $5, $6)";
    $result = pg_prepare("inserisciUtente", $sql);
    if ($result) {
        $result2 = pg_execute("inserisciUtente", array($user_id, $user_nome, $user_cognome, $user_username, $user_password, $user_sesso));
        if(!$result2)
            echo pg_last_error($db_connection);
    }else
        echo pg_last_error($db_connection);
}
//update numero utenti registrati
$sql = "UPDATE info_server SET numero_utenti = numero_utenti + 1";
$result = pg_query($db_connection, $sql);
if ($result)
    pg_last_error();
//close
pg_close($db_connection);
?>