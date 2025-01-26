<?php
/**
 * Questo script PHP gestisce la conferma dell'acquisto di un utente. Una volta che il pagamento è stato effettuato, 
 * esegue i seguenti passaggi:
 * 1.Gestione della Sessione
 * 2.Connessione al Database
 * 3.Salvataggio dell'Acquisto nel Database generando un numero ordine unico basato sulla data e sull'username dell'utente.
 * 4.Svuotaggio del Carrello
 * 5.Chiusura Database
 */
session_start();
require_once "ConnettiDb.php";
if (isset($_GET['confirmcheckout'])) {
    if (isset($_COOKIE['cart'])) {
        //se ha effettuato il pagamento:
        //-Aggiungo al database nella tabella acquisti: email e id del volo
        $cart = json_decode($_COOKIE['cart'], true);
        //verifico se è vuota
        if (isset($_SESSION['email'])&&isset($_SESSION['username'])) { 
            $email_utente = $_SESSION['email']; //email dell'utente loggato che ha fatto l'acquisto
            $username=$_SESSION['username'];//username che deve essere univoco nel db
            foreach ($cart as $oggetto) { //per ciascun elemento del carrello faccio un insert
                //creo un numero ordine sulla base della data di acquisto
                $today=new DateTime();
                $day=$today->format('d');
                $month=$today->format('m');
                $year=$today->format('Y');
                $random_number=rand(1, 777);
                $numordine=$day.$month.$year.$_SESSION['username'].$random_number;
                $query = "INSERT INTO acquisti (acquirente, acquirenteuser, idacquisto) VALUES ('$email_utente', '$username', '$numordine')";
                $result = pg_query($db_connection, $query); 
                if (!$result) { 
                    echo "Errore durante l'inserimento dell'acquistom nel db: " . pg_last_error($db_connection) . "<br>"; 
                } 
            }
            // Rimuovo tutti gli articoli dal carrello 
            $cart_vuoto = []; 
            setcookie('cart', json_encode($cart_vuoto), time() + 3600, "/");
    }else { 
        echo "Errore: email utente non trovata nella sessione.<br>"; 
    } } else { echo "Errore: carrello non trovato.<br>"; }
    
}
pg_close($db_connection);   

    
?>
