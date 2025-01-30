<?php
require_once "ConnettiDb.php";
header('Content-Type: application/json');
function respond($success, $message) {
    echo json_encode(['success' => $success, 'error' => $message]);
    exit;
}
if (isset($_POST['user_username']) && isset($_POST['user_password'])) {
    $username = $_POST['user_username'];
    $password = $_POST['user_password'];
    $sql = "SELECT passworduser, nome, cognome, indirizzo FROM utente WHERE username = $1";
    $result = pg_prepare($db_connection, "sqlPassword", $sql);
    if ($result) {
        $ret = pg_execute($db_connection, "sqlPassword", array($username));
        if ($ret) {
            $row = pg_fetch_assoc($ret);
            if($row) {
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
                    respond(true, "");
                } else {
                    respond(false, "Password incorretta");
                }
            } else {
                respond(false, "Utente non trovato");
            }
        } 
    } 
}
pg_close($db_connection);
?>
