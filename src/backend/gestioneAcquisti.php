<?php
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
                $id_volo = $oggetto['id']; 
                $query = "INSERT INTO acquisti (acquirente, acquirenteuser, idvolo) VALUES ('$email_utente', '$username', '$id_volo')"; 
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
   
    
?>
