<?php
// Connessione
$host = 'localhost';
$port = '9999';
$db = 'GRUPPO05';
$username = 'www';
$password = 'tw2024';
$connection_string = "host=$host port=$port dbname=$db user=$username password=$password";
$db_connection = pg_connect($connection_string) or die('Impossibile connettersi al database: ' . pg_last_error());
// Inizio login
if (isset($_POST['user_username']) && isset($_POST['user_password'])) {
    $user = $_POST['user_username'];
    $password = $_POST['user_password'];
    $sql = "SELECT password FROM utente WHERE username = $1";
    $result = pg_prepare($db_connection, "sqlPassword", $sql);
    if ($result) {
        $ret = pg_execute($db_connection, "sqlPassword", array($user));
        if ($ret) {
            $row = pg_fetch_assoc($ret);
            $hash = $row['password'];
            if (password_verify($password, $hash)) {
                session_start();
                $_SESSION['username'] = $user;
                header("Location: PaginaBianca.php");
            } else {
                echo "Password errata<br>";
            }
        } else {
            echo "Errore durante l'esecuzione della query: " . pg_last_error($db_connection);
        }
    } else {
        echo "Errore durante la preparazione della query: " . pg_last_error($db_connection);
    }
} else {
    echo "Username o password mancanti<br>";
}
// Chiudi la connessione
pg_close($db_connection);
?>