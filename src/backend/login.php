<?php
/*
 * gestisce il login
 * setta username come var di sessione se logga
 */
// Connessione
$host = 'localhost';
<<<<<<< HEAD
<<<<<<< HEAD
$port = '5432';
=======
$port = '9999';
>>>>>>> eb391e0e1a245688146621b45c06fe21931c7870
=======
$port = '5432';
>>>>>>> 4fcf1090370b23b13499b7123b1ef615008c71c0
$db = 'GRUPPO05';
$username = 'www';
$password = 'tw2024';
$connection_string = "host=$host port=$port dbname=$db user=$username password=$password";
$db_connection = pg_connect($connection_string) or die('Impossibile connettersi al database: ' . pg_last_error());
// Inizio login
if (isset($_POST['user_username']) && isset($_POST['user_password'])) {
    $user = $_POST['user_username'];
    $password = $_POST['user_password'];
<<<<<<< HEAD
<<<<<<< HEAD
    $sql = "SELECT passworduser, nome, cognome FROM utente WHERE username = $1";
=======
    $sql = "SELECT password, name, surname FROM utente WHERE username = $1";
>>>>>>> eb391e0e1a245688146621b45c06fe21931c7870
=======
    $sql = "SELECT passworduser, nome, cognome FROM utente WHERE username = $1";
>>>>>>> 4fcf1090370b23b13499b7123b1ef615008c71c0
    $result = pg_prepare($db_connection, "sqlPassword", $sql);
    if ($result) {
        $ret = pg_execute($db_connection, "sqlPassword", array($user));
        if ($ret) {
            $row = pg_fetch_assoc($ret);
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 4fcf1090370b23b13499b7123b1ef615008c71c0
           
            if($row){
                 $hash = $row['passworduser'];
            if ($password==$hash) { /////ALTRO METODO DA UTILIZZARE
                $name = $row['nome'];
                $surname = $row['cognome'];
<<<<<<< HEAD
=======
            $hash = $row['password'];
            if (password_verify($password, $hash)) {
                $name = $row['name'];
                $surname = $row['surname'];
>>>>>>> eb391e0e1a245688146621b45c06fe21931c7870
=======
>>>>>>> 4fcf1090370b23b13499b7123b1ef615008c71c0
                session_start();
                $_SESSION['username'] = $user;
                $_SESSION['name'] = $name;
                $_SESSION['surname'] = $surname;
                header("Location: " . $_SERVER['HTTP_REFERER']);
            } else {
                echo "Password errata<br>";
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 4fcf1090370b23b13499b7123b1ef615008c71c0
            }}else{
                echo"Utente non trovato";
            }


<<<<<<< HEAD
=======
            }
>>>>>>> eb391e0e1a245688146621b45c06fe21931c7870
=======
>>>>>>> 4fcf1090370b23b13499b7123b1ef615008c71c0
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