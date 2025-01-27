<?php
/**
 * Verifica se i campi del form sono stati inviati tramite POST e assegna i valori corrispondenti alle variabili. 
 * In caso contrario, assegna stringhe vuote.
 */
$nome = isset($_POST['user_name']) ? $_POST['user_name'] : "";
$cognome = isset($_POST['user_surname']) ? $_POST['user_surname'] : "";
$email = isset($_POST['user_email']) ? $_POST['user_email'] : "";
$user = isset($_POST['user_username']) ? $_POST['user_username'] : "";
$pass = isset($_POST['user_password']) ? $_POST['user_password'] : "";
$repassword = isset($_POST['password_confirm']) ? $_POST['password_confirm'] : "";
$nascita = isset($_POST['user_birthday']) ? $_POST['user_birthday'] : "";
$indirizzo = isset($_POST['user_country']) ? $_POST['user_country'] : "";
$sesso = isset($_POST['user_gender']) ? $_POST['user_gender'] : "";

/**
 * Esegue controlli sulla password. 
 * 1. Se la password non corrisponde alla conferma della password, visualizza un messaggio di errore. 
 * 2. Se le password corrispondono, verifica se lo username esiste già. 
 * 3. Se lo username non esiste, inserisce il nuovo utente nel database.
 */
  if (!empty($pass)) {
        if ($pass != $repassword) {
            $errore = "Password mismatch. Try again.";
            echo "<script>alert('$errore');</script>";
            $pass = "";
        } else {
            if (username_exist($user)) {
                $errore = "Username $user already exists. Try again.";
                echo "<script>alert('$errore');</script>";
            } else {
                if (insert_utente($nome, $cognome, $sesso, $user, $pass, $indirizzo, $nascita)) {
                    $errore = "User registered successfully!";
                    echo "<script>alert('$errore');</script>";
                } else {
                    $errore = "Registration error. Try again.";
                    echo "<script>alert('$errore');</script>";
                }
            }
        }
    }
/**
 * Funzione che verifica se un username esiste già nel database. 
 * Verifica se un username esiste già nel database.
 * @param user L'username da verificare.
 * @return true se l'username esiste, false altrimenti.
 */
function username_exist($user){
    require_once "ConnettiDb.php"; 
    $sql = "SELECT username FROM utente WHERE username=$1";
    $prep = pg_prepare($$db_connection, "sqlUsername", $sql);
    $ret = pg_execute($$db_connection, "sqlUsername", array($user));
    if (!$ret) {
        echo "ERRORE QUERY: " . pg_last_error($db);
        return false;
    } else {
        return pg_fetch_assoc($ret) ? true : false;
    }
}

/**
 * Funzione che inserisce un nuovo utente nel database. Hash della password per sicurezza. 
 * @param nome Il nome dell'utente.
 * @param cognome Il cognome dell'utente.
 * @param sesso Il sesso dell'utente.
 * @param user Lo username dell'utente.
 * @param pass La password dell'utente.
 * @param indirizzo L'indirizzo dell'utente.
 * @param nascita La data di nascita dell'utente.
 * @return true se l'inserimento ha successo, false altrimenti.
 */
function insert_utente($nome, $cognome, $sesso, $user, $pass, $indirizzo, $nascita){
    require_once "ConnettiDb.php"; 
    $hash = password_hash($pass, PASSWORD_DEFAULT);
    $sql = "INSERT INTO utente(nome, cognome, sesso, username, passworduser, indirizzo, datanascita) VALUES($1, $2, $3, $4, $5, $6, $7)";
    $prep = pg_prepare($$db_connection, "insertUser", $sql);
    $ret = pg_execute($$db_connection, "insertUser", array($nome, $cognome, $sesso, $user, $hash, $indirizzo, $nascita));
    if (!$ret) {
        echo "ERRORE QUERY: " . pg_last_error($db);
        return false;
    } else {
        return true;
    }
}
?>

<!--
HTML per lo sticky form di registrazione utente.
Utilizza POST per inviare i dati a backend/RegistraUtente.php.
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
    require_once "../components/utils/headMetadata.html" ;
    ?>
    <title>Sign up</title>
    <link rel="stylesheet" href="../pages/signup/signup.css">
    <base href="../">
</head>
<body>
    <?php include_once "../components/header/header.php" ?>
    <main class="main_signup">
        <div class="contenitore">
            <div class="input d-flex flex-column ">
                <h3 style="text-align: center;">Sign Up</h3>
                <div id="errore_signup" style="display: none; color: red; font-size:3px"></div> 
                <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>" class="d-grid">
                    <div class="oggetto d-flex flex-column" id="oggetto_signup">
                        <label for="username">Username</label>
                        <input type="text" id="username" name="user_username" value="<?php echo $user?>" required>
                    </div>
                    <div class="oggetto d-flex flex-column" id="oggetto_signup">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="user_name" value="<?php echo $nome?>">
                    </div>
                    <div class="oggetto d-flex flex-column" id="oggetto_signup">
                        <label for="surname">Surname</label>
                        <input type="text" id="surname" name="user_surname" value="<?php echo $cognome?>">
                    </div>

                    <div class="oggetto d-flex flex-column" id="oggetto_signup">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="user_email"value="<?php echo $email?>" required>
                    </div>

                    <div class="oggetto d-flex flex-column" id="oggetto_signup">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="user_password" value="<?php echo $pass?>"  required>
                    </div>
                    <div class="oggetto d-flex flex-column" id="oggetto_signup">
                        <label for="password-confirm">Confirm Password</label>
                        <input type="password" id="password-confirm" name="password_confirm" value="<?php echo $repassword?>" required>
                    </div>
                    <div class="oggetto d-flex flex-column" id="oggetto_signup">
                        <label for="birthday">Date of birth</label>
                        <input type="date" id="birthday" name="user_birthday" value="<?php echo $nascita?>" >
                    </div>

                    <div class="oggetto d-flex flex-column" id="oggetto_signup">
                        <label for="country">Country</label>
                        <select id="country" name="user_country" >
                            <option value="it">Italy</option>
                            <option value="us">United States</option>
                            <option value="cn">Canada</option>
                            <option value="fr">France</option>
                            <option value="gr">Germany</option>
                            <option value="uk">United Kingdom</option>
                        </select>
                    </div>
                    <div class="oggetto d-flex flex-column" id="oggetto_signup">
                        <label class="d-flex flex-row">Gender:
                            <label for="sessoM"><input id="sessoM" type="radio" name="user_gender" value="M" >
                                M</label>
                            <label for="sessoF"><input id="sessoF" type="radio" name="user_gender" value="F">
                                F</label></label>
                    </div>
                    <button type="submit">Sign Up</button>
                </form>
            </div>
        </div>
    </main>
    <?php include_once "../components/footer/footer.html" ?>
</body>

</html>
