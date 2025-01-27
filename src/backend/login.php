g<?php
/*
 * Questo script PHP gestisce il processo di login per gli utenti. Esegue i seguenti passaggi:
 * setta username come var di sessione se logga
 * 1.Connessione al Database
 * 2.Verifica delle credenziali
 * 3.Verifica password
 * 4.In caso di successo impostazioni delle variabili di Sessione
 * 5.Reindirizzamento alla pagina precedente
 * 6.Chiusura del database
 */
// Connessione
require_once "ConnettiDb.php";
// Inizio login
if (isset($_POST['user_username']) && isset($_POST['user_password'])) {
    $username = $_POST['user_username'];
    $password = $_POST['user_password'];
    $sql = "SELECT passworduser, nome, cognome, indirizzo FROM utente WHERE username = $1";
    $result = pg_prepare($db_connection, "sqlPassword", $sql);
    if ($result) {
        $ret = pg_execute($db_connection, "sqlPassword", array($username));
        if ($ret) {
            $row = pg_fetch_assoc($ret);
           
            if($row){
                 $hash = $row['passworduser'];
            if (password_verify($password, $hash)) {
                //Controlliamo la password inserita dall'utente rispetto 
                //all'hash presente nel database (con password_verify()) e se 
                //il controllo è positivo, vengono settate
                //opportune variabili di sessione
                $name = $row['nome'];
                $surname = $row['cognome'];
                $email = $row['indirizzo'];
                session_start();
                $_SESSION['username'] = $username;
                $_SESSION['name'] = $name;
                $_SESSION['surname'] = $surname;
                $_SESSION['email'] = $email;
                header("Location: " . $_SERVER['HTTP_REFERER']);
            } else {
                echo "Password errata<br>";
            }}else{
                echo"Utente non trovato";
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