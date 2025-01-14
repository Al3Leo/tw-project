
<?php
    $host = "localhost";
    $port = "5432";
    $db_name = "GRUPPO05";
    $user = "www";
    $password = "tw2024";
    $connection_string = "host=$host dbname=$db_name user=$user password=$password";
    $db_connection = pg_connect($connection_string) or die('Impossibile connettersi al database: ' . pg_last_error());
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
                    header("Location: NewSpace.php?status=success");
                }else{
                    //inserimento non avvenuto
                    header("Location: NewSpace.php?status=error");
                }
            }else{
                //email gia esiste
                header("Location: NewSpace.php?status=esiste");
            }

        }else{
            //email inserita non  è corretta
            header("Location: NewSpace.php?status=invalid");
        }
    }
    // Chiudi la connessione
    pg_close($db_connection);
?>