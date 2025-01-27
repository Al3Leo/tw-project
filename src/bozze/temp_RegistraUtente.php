<?php
//connessione
$host = 'localhost';
$port = '5432';
$db = 'GRUPPO05';
$username = 'www';
$password = 'tw2024';
$connection_string = "host=$host port=$port dbname=$db user=$username password=$password";
$db_connection =pg_connect($connection_string) or die('impossibile connettersi al databse<br>'.pg_last_error());
//get id disponibile
$query = "SELECT id_utenti FROM info_server";
$ret = pg_query($db_connection, $query) or die('Errore durante la lettura del id: ' . pg_last_error($db_connection));
$user_id=pg_fetch_row($ret)[0];
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
            echo "mino".pg_last_error($db_connection);
    }else
        echo "jo".pg_last_error($db_connection);
}
//update numero utenti registrati
$sql = "UPDATE info_server SET numero_utenti = numero_utenti+1";
pg_query($db_connection, $sql) or die('Errore update numero utenti: '.pg_last_error());
//update id
$query = "UPDATE info_server SET id_utenti = id_utenti+1";
pg_query($db_connection, $query) or die('Errore durante update id: ' . pg_last_error($db_connection));
//close
pg_close($db_connection);
?>