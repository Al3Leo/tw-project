
<?php
/**
 *  Gestione dell'iscrizione alla newsletter persente nel file NewSpace.php
 * Questo file PHP gestisce l'inserimento delle email nel database per l'iscrizione alla newsletter.
 */
require_once"../../backend/ConnettiDb.php";
    if (isset($_POST['email_news'])) {        
        $email=$_POST['email_news'];
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            //l'email è valida, verifico se gia esiste nel database
            $sql = "SELECT email FROM newsletter WHERE email='$email'";
            $ret = pg_query($db_connection, $sql);
            if(pg_num_rows($ret) == 0){//query restituisce falso se non trova nulla
                $query="INSERT INTO newsletter (email) VALUES ('$email')";
                $insert_ret=pg_query($db_connection, $query);
                if($insert_ret){
                    //iscrizione avvenuta con successo
                    header("Location: NewSpace.php?status=success#newsletter");
                }else{
                    //inserimento non avvenuto
                    header("Location: NewSpace.php?status=error#newsletter");
                }
            }else{
                //email gia esiste
                header("Location: NewSpace.php?status=esiste#newsletter");
            }

        }else{
            //email inserita non  è corretta
            header("Location: NewSpace.php?status=invalid#newsletter");
        }
    }
    // Chiudi la connessione
    pg_close($db_connection);
?>