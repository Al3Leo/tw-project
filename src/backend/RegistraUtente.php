<?php
//connessione
require_once "ConnettiDb.php";
//get id disponibile
$query = "SELECT id_utenti FROM info_server";
$ret = pg_query($db_connection, $query) or die('Errore durante la lettura del id: ' . pg_last_error($db_connection));
$user_id=pg_fetch_row($ret)[0];
//query add
/*echo "<pre>";
print_r($_POST);
echo "</pre>";*/
if(!empty($_POST)) {
    $user_name = $_POST['user_name'];
    $user_surname = $_POST['user_surname'];
    $user_gender = $_POST['user_gender'];
    $user_username = $_POST['user_username'];
    $user_country = $_POST['user_country'];
    $user_email = $_POST['user_email'];
    $user_birthday = $_POST['user_birthday'];
    $user_password = password_hash($_POST['user_password'], PASSWORD_DEFAULT);
    echo "<h3>Verifica dei dati ricevuti:</h3>";
    echo "Nome: " . htmlspecialchars($user_name) . "<br>";
    echo "Cognome: " . htmlspecialchars($user_surname) . "<br>";
    echo "Sesso: " . htmlspecialchars($user_gender) . "<br>";
    echo "Username: " . htmlspecialchars($user_username) . "<br>";
    echo "Paese: " . htmlspecialchars($user_country) . "<br>";
    echo "Password (hash): " . htmlspecialchars($user_password) . "<br>";
    $sql = "INSERT INTO utente (id, name, surname, username, password, gender, country, email, dateofbirth) VALUES ($1, $2, $3, $4, $5, $6, $7, $8, $9)";
    $result = pg_prepare("inserisciUtente", $sql);
    if ($result) {
        $result2 = pg_execute("inserisciUtente", array($user_id, $user_name, $user_surname, $user_username, $user_password, $user_gender, $user_country, $user_email, $user_birthday));
        if(!$result2)
            echo "er2: ".pg_last_error($db_connection);
    }else
        echo "er1: ".pg_last_error($db_connection);
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