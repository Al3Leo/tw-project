<?php

/**
 *  Contiene il form sticky pe la registrazione dell'utente. A seconda degli errori che sono commessi vengono visualizzati
 * messaggi tramite alert
 */
session_start();
require_once "../../backend/ConnettiDb.php";
/**
 * Verifica se i campi del form sono stati inviati tramite POST e assegna i valori corrispondenti alle variabili. 
 * In caso contrario, assegna stringhe vuote.
 */
$nome = isset($_POST['user_name']) ? $_POST['user_name'] : "";
$cognome = isset($_POST['user_surname']) ? $_POST['user_surname'] : "";
$email = isset($_POST['user_email']) ? $_POST['user_email'] : "";
$username = isset($_POST['user_username']) ? $_POST['user_username'] : "";
$pass = isset($_POST['user_password']) ? $_POST['user_password'] : "";
$repassword = isset($_POST['password_confirm']) ? $_POST['password_confirm'] : "";
$nascita = isset($_POST['user_birthday']) ? $_POST['user_birthday'] : NULL;
$indirizzo = isset($_POST['user_country']) ? $_POST['user_country'] : "";
$sesso = isset($_POST['user_gender']) ? $_POST['user_gender'] : "";

/**
 * Esegue controlli sulla lunghezza dei campi.
 * Esegue controlli sulla password. 
 * 1. Se la password non corrisponde alla conferma della password, visualizza un messaggio di errore. 
 * 2. Se le password corrispondono, verifica se lo username esiste già. 
 * 3. Se lo username non esiste, inserisce il nuovo utente nel database.
 */
if (strlen($nome) > 50 || strlen($username) > 25 || strlen($cognome) > 50 || strlen($email) > 50) {
    $errore = "One or more fields are too long.";
    echo "<script>alert('$errore');</script>";
} else {
    if (!empty($pass)) {
        if ($pass != $repassword) {
            $errore = "Password mismatch. Try again.";
            echo "<script>alert('$errore');</script>";
            $pass = "";
        } else {
            if (username_exist($username)) {
                $errore = "Username $username already exists. Try again.";
                echo "<script>alert('$errore');</script>";
            } else {
                if (insert_utente($nome, $cognome, $sesso, $username, $pass, $indirizzo, $nascita, $email)) {
                    header("Location: ../../pages/conferma/Conferma.php?confirmsignup=$username");
                    exit();
                } else {
                    $errore = "Registration error. Try again.";
                    echo "<script>alert('$errore');</script>";
                }
            }
        }
    }
}

/**
 * Funzione che verifica se un username esiste già nel database. 
 * Verifica se un username esiste già nel database.
 */
function username_exist($username)
{
    global $db_connection; //accedo alla variabile globale 
    $sql = "SELECT username FROM utente WHERE username=$1";
    $prep = pg_prepare($db_connection, "sqlUsername", $sql);
    $ret = pg_execute($db_connection, "sqlUsername", array($username));
    if (!$ret) {
        echo "ERRORE QUERY: " . pg_last_error($db_connection);
        return false;
    } else {
        return pg_fetch_assoc($ret) ? true : false;
    }
}

/**
 * Funzione che inserisce un nuovo utente nel database. Hash della password per sicurezza. 
 */
function insert_utente($nome, $cognome, $sesso, $username, $pass, $indirizzo, $nascita, $email)
{
    global $db_connection;
    $hash = password_hash($pass, PASSWORD_DEFAULT);
    $sql = "INSERT INTO utente(nome, cognome, sesso, username, passworduser, indirizzo, datanascita, email_utente ) VALUES($1, $2, $3, $4, $5, $6, $7, $8)";
    $prep = pg_prepare($db_connection, "insertUser", $sql);
    $ret = pg_execute($db_connection, "insertUser", array($nome, $cognome, $sesso, $username, $hash, $indirizzo, !empty($nascita) ? $nascita : NULL, $email) );
    if (!$ret) {
        echo "ERRORE QUERY: " . pg_last_error($db_connection);
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
    <?php require_once "../../components/utils/headMetadata.html" ?>
    <title>Outer Space</title>
    <link rel="stylesheet" href="signup.css">
    <base href="../../" /> <!-- Torna in /src -->
</head>

<body>
    <?php include_once "../../components/header/header.php" ?>
    <main class="main_signup">
        <div class="contenitore">
            <div class="input d-flex flex-column ">
                <h1 style="text-align: center;">Sign Up</h1>
                <!--<p class="required-label text-center"><small>* is required</small></p>-->
                <div id="errore_signup" style="display: none; color: red; font-size:3px"></div>
                <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>" class="d-grid">
                    <div class="oggetto d-flex flex-column" id="oggetto_signup">
                        <label for="username">Username*</label>
                        <input type="text" id="username" name="user_username" value="<?php echo $username ?>" required>
                    </div>
                    <div class="oggetto d-flex flex-column" id="oggetto_signup">
                        <label for="email">Email*</label>
                        <input type="email" id="email" name="user_email" value="<?php echo $email ?>" required>
                    </div>

                    <div class="oggetto d-flex flex-column" id="oggetto_signup">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="user_name" value="<?php echo $nome ?>">
                    </div>
                    <div class="oggetto d-flex flex-column" id="oggetto_signup">
                        <label for="surname">Surname</label>
                        <input type="text" id="surname" name="user_surname" value="<?php echo $cognome ?>">
                    </div>

                    <div class="oggetto d-flex flex-column" id="oggetto_signup">
                        <label for="password">Password*</label>
                        <input type="password" id="password" name="user_password" value="<?php echo $pass ?>" required>
                    </div>
                    <div class="oggetto d-flex flex-column" id="oggetto_signup">
                        <label for="password-confirm">Confirm Password*</label>
                        <input type="password" id="password-confirm" name="password_confirm" required>
                    </div>
                    <div class="oggetto d-flex flex-column" id="oggetto_signup">
                        <label for="birthday">Date of birth</label>
                        <input type="date" id="birthday" name="user_birthday" value="<?php echo $nascita ?>">
                    </div>

                    <div class="oggetto d-flex flex-column" id="oggetto_signup">
                        <label for="country">Country</label>
                        <select id="country" name="user_country">
                            <option value="Afghanistan">Afghanistan</option>
                            <option value="Åland Islands">Åland Islands</option>
                            <option value="Albania">Albania</option>
                            <option value="Algeria">Algeria</option>
                            <option value="American Samoa">American Samoa</option>
                            <option value="Andorra">Andorra</option>
                            <option value="Angola">Angola</option>
                            <option value="Anguilla">Anguilla</option>
                            <option value="Antarctica">Antarctica</option>
                            <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                            <option value="Argentina">Argentina</option>
                            <option value="Armenia">Armenia</option>
                            <option value="Aruba">Aruba</option>
                            <option value="Australia">Australia</option>
                            <option value="Austria">Austria</option>
                            <option value="Azerbaijan">Azerbaijan</option>
                            <option value="Bahamas">Bahamas</option>
                            <option value="Bahrain">Bahrain</option>
                            <option value="Bangladesh">Bangladesh</option>
                            <option value="Barbados">Barbados</option>
                            <option value="Belarus">Belarus</option>
                            <option value="Belgium">Belgium</option>
                            <option value="Belize">Belize</option>
                            <option value="Benin">Benin</option>
                            <option value="Bermuda">Bermuda</option>
                            <option value="Bhutan">Bhutan</option>
                            <option value="Bolivia">Bolivia</option>
                            <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                            <option value="Botswana">Botswana</option>
                            <option value="Bouvet Island">Bouvet Island</option>
                            <option value="Brazil">Brazil</option>
                            <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                            <option value="Brunei Darussalam">Brunei Darussalam</option>
                            <option value="Bulgaria">Bulgaria</option>
                            <option value="Burkina Faso">Burkina Faso</option>
                            <option value="Burundi">Burundi</option>
                            <option value="Cambodia">Cambodia</option>
                            <option value="Cameroon">Cameroon</option>
                            <option value="Canada">Canada</option>
                            <option value="Cape Verde">Cape Verde</option>
                            <option value="Cayman Islands">Cayman Islands</option>
                            <option value="Central African Republic">Central African Republic</option>
                            <option value="Chad">Chad</option>
                            <option value="Chile">Chile</option>
                            <option value="China">China</option>
                            <option value="Christmas Island">Christmas Island</option>
                            <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                            <option value="Colombia">Colombia</option>
                            <option value="Comoros">Comoros</option>
                            <option value="Congo">Congo</option>
                            <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
                            <option value="Cook Islands">Cook Islands</option>
                            <option value="Costa Rica">Costa Rica</option>
                            <option value="Cote D'ivoire">Cote D'ivoire</option>
                            <option value="Croatia">Croatia</option>
                            <option value="Cuba">Cuba</option>
                            <option value="Cyprus">Cyprus</option>
                            <option value="Czech Republic">Czech Republic</option>
                            <option value="Denmark">Denmark</option>
                            <option value="Djibouti">Djibouti</option>
                            <option value="Dominica">Dominica</option>
                            <option value="Dominican Republic">Dominican Republic</option>
                            <option value="Ecuador">Ecuador</option>
                            <option value="Egypt">Egypt</option>
                            <option value="El Salvador">El Salvador</option>
                            <option value="Equatorial Guinea">Equatorial Guinea</option>
                            <option value="Eritrea">Eritrea</option>
                            <option value="Estonia">Estonia</option>
                            <option value="Ethiopia">Ethiopia</option>
                            <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                            <option value="Faroe Islands">Faroe Islands</option>
                            <option value="Fiji">Fiji</option>
                            <option value="Finland">Finland</option>
                            <option value="France">France</option>
                            <option value="French Guiana">French Guiana</option>
                            <option value="French Polynesia">French Polynesia</option>
                            <option value="French Southern Territories">French Southern Territories</option>
                            <option value="Gabon">Gabon</option>
                            <option value="Gambia">Gambia</option>
                            <option value="Georgia">Georgia</option>
                            <option value="Germany">Germany</option>
                            <option value="Ghana">Ghana</option>
                            <option value="Gibraltar">Gibraltar</option>
                            <option value="Greece">Greece</option>
                            <option value="Greenland">Greenland</option>
                            <option value="Grenada">Grenada</option>
                            <option value="Guadeloupe">Guadeloupe</option>
                            <option value="Guam">Guam</option>
                            <option value="Guatemala">Guatemala</option>
                            <option value="Guernsey">Guernsey</option>
                            <option value="Guinea">Guinea</option>
                            <option value="Guinea-bissau">Guinea-bissau</option>
                            <option value="Guyana">Guyana</option>
                            <option value="Haiti">Haiti</option>
                            <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
                            <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                            <option value="Honduras">Honduras</option>
                            <option value="Hong Kong">Hong Kong</option>
                            <option value="Hungary">Hungary</option>
                            <option value="Iceland">Iceland</option>
                            <option value="India">India</option>
                            <option value="Indonesia">Indonesia</option>
                            <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                            <option value="Iraq">Iraq</option>
                            <option value="Ireland">Ireland</option>
                            <option value="Isle of Man">Isle of Man</option>
                            <option value="Israel">Israel</option>
                            <option value="Italy">Italy</option>
                            <option value="Jamaica">Jamaica</option>
                            <option value="Japan">Japan</option>
                            <option value="Jersey">Jersey</option>
                            <option value="Jordan">Jordan</option>
                            <option value="Kazakhstan">Kazakhstan</option>
                            <option value="Kenya">Kenya</option>
                            <option value="Kiribati">Kiribati</option>
                            <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
                            <option value="Korea, Republic of">Korea, Republic of</option>
                            <option value="Kuwait">Kuwait</option>
                            <option value="Kyrgyzstan">Kyrgyzstan</option>
                            <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
                            <option value="Latvia">Latvia</option>
                            <option value="Lebanon">Lebanon</option>
                            <option value="Lesotho">Lesotho</option>
                            <option value="Liberia">Liberia</option>
                            <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                            <option value="Liechtenstein">Liechtenstein</option>
                            <option value="Lithuania">Lithuania</option>
                            <option value="Luxembourg">Luxembourg</option>
                            <option value="Macao">Macao</option>
                            <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
                            <option value="Madagascar">Madagascar</option>
                            <option value="Malawi">Malawi</option>
                            <option value="Malaysia">Malaysia</option>
                            <option value="Maldives">Maldives</option>
                            <option value="Mali">Mali</option>
                            <option value="Malta">Malta</option>
                            <option value="Marshall Islands">Marshall Islands</option>
                            <option value="Martinique">Martinique</option>
                            <option value="Mauritania">Mauritania</option>
                            <option value="Mauritius">Mauritius</option>
                            <option value="Mayotte">Mayotte</option>
                            <option value="Mexico">Mexico</option>
                            <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                            <option value="Moldova, Republic of">Moldova, Republic of</option>
                            <option value="Monaco">Monaco</option>
                            <option value="Mongolia">Mongolia</option>
                            <option value="Montenegro">Montenegro</option>
                            <option value="Montserrat">Montserrat</option>
                            <option value="Morocco">Morocco</option>
                            <option value="Mozambique">Mozambique</option>
                            <option value="Myanmar">Myanmar</option>
                            <option value="Namibia">Namibia</option>
                            <option value="Nauru">Nauru</option>
                            <option value="Nepal">Nepal</option>
                            <option value="Netherlands">Netherlands</option>
                            <option value="Netherlands Antilles">Netherlands Antilles</option>
                            <option value="New Caledonia">New Caledonia</option>
                            <option value="New Zealand">New Zealand</option>
                            <option value="Nicaragua">Nicaragua</option>
                            <option value="Niger">Niger</option>
                            <option value="Nigeria">Nigeria</option>
                            <option value="Niue">Niue</option>
                            <option value="Norfolk Island">Norfolk Island</option>
                            <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                            <option value="Norway">Norway</option>
                            <option value="Oman">Oman</option>
                            <option value="Pakistan">Pakistan</option>
                            <option value="Palau">Palau</option>
                            <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
                            <option value="Panama">Panama</option>
                            <option value="Papua New Guinea">Papua New Guinea</option>
                            <option value="Paraguay">Paraguay</option>
                            <option value="Peru">Peru</option>
                            <option value="Philippines">Philippines</option>
                            <option value="Pitcairn">Pitcairn</option>
                            <option value="Poland">Poland</option>
                            <option value="Portugal">Portugal</option>
                            <option value="Puerto Rico">Puerto Rico</option>
                            <option value="Qatar">Qatar</option>
                            <option value="Reunion">Reunion</option>
                            <option value="Romania">Romania</option>
                            <option value="Russian Federation">Russian Federation</option>
                            <option value="Rwanda">Rwanda</option>
                            <option value="Saint Helena">Saint Helena</option>
                            <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                            <option value="Saint Lucia">Saint Lucia</option>
                            <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                            <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
                            <option value="Samoa">Samoa</option>
                            <option value="San Marino">San Marino</option>
                            <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                            <option value="Saudi Arabia">Saudi Arabia</option>
                            <option value="Senegal">Senegal</option>
                            <option value="Serbia">Serbia</option>
                            <option value="Seychelles">Seychelles</option>
                            <option value="Sierra Leone">Sierra Leone</option>
                            <option value="Singapore">Singapore</option>
                            <option value="Slovakia">Slovakia</option>
                            <option value="Slovenia">Slovenia</option>
                            <option value="Solomon Islands">Solomon Islands</option>
                            <option value="Somalia">Somalia</option>
                            <option value="South Africa">South Africa</option>
                            <option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
                            <option value="Spain">Spain</option>
                            <option value="Sri Lanka">Sri Lanka</option>
                            <option value="Sudan">Sudan</option>
                            <option value="Suriname">Suriname</option>
                            <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                            <option value="Swaziland">Swaziland</option>
                            <option value="Sweden">Sweden</option>
                            <option value="Switzerland">Switzerland</option>
                            <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                            <option value="Taiwan">Taiwan</option>
                            <option value="Tajikistan">Tajikistan</option>
                            <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                            <option value="Thailand">Thailand</option>
                            <option value="Timor-leste">Timor-leste</option>
                            <option value="Togo">Togo</option>
                            <option value="Tokelau">Tokelau</option>
                            <option value="Tonga">Tonga</option>
                            <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                            <option value="Tunisia">Tunisia</option>
                            <option value="Turkey">Turkey</option>
                            <option value="Turkmenistan">Turkmenistan</option>
                            <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                            <option value="Tuvalu">Tuvalu</option>
                            <option value="Uganda">Uganda</option>
                            <option value="Ukraine">Ukraine</option>
                            <option value="United Arab Emirates">United Arab Emirates</option>
                            <option value="United Kingdom">United Kingdom</option>
                            <option value="United States">United States</option>
                            <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                            <option value="Uruguay">Uruguay</option>
                            <option value="Uzbekistan">Uzbekistan</option>
                            <option value="Vanuatu">Vanuatu</option>
                            <option value="Venezuela">Venezuela</option>
                            <option value="Viet Nam">Viet Nam</option>
                            <option value="Virgin Islands, British">Virgin Islands, British</option>
                            <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                            <option value="Wallis and Futuna">Wallis and Futuna</option>
                            <option value="Western Sahara">Western Sahara</option>
                            <option value="Yemen">Yemen</option>
                            <option value="Zambia">Zambia</option>
                            <option value="Zimbabwe">Zimbabwe</option>
                        </select>
                    </div>
                    <div class="oggetto d-flex flex-column" id="oggetto_signup">
                        <div class="d-flex flex-row align-items-center" id="gender"><span>Gender:</span>
                            <label for="sessoM"><input id="sessoM" type="radio" name="user_gender" value="M">
                                M</label>
                            <label for="sessoF"><input id="sessoF" type="radio" name="user_gender" value="F">
                                F</label>
                        </div>

                        
                    </div>
                    <button type="submit">Sign Up</button>
                </form>
            </div>
        </div>
    </main>
    <?php include_once "../../components/footer/footer.php" ?>
</body>

</html>