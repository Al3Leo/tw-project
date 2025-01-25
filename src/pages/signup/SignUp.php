<!DOCTYPE html>
<html lang="en">

<head>
        <?php require_once "../../components/utils/headMetadata.html" ?>
        <title>Sign up</title>
        <link rel="stylesheet" href="signup.css">
        <base href="../../">
        <style></style>
</head>

<body>
        <?php include_once "../../components/header/header.php" ?>
        <main class="main_signup">
                <div class="contenitore">
                        <div class="input d-flex flex-column ">
                                <h3 style="text-align: center;">Sign Up</h3>
                                <form method="POST" action="backend/RegistraUtente.php" onsubmit="window.open('../../backend/ConfermaDinamica.php?confirmsignupname=true', 'blank')" class="d-grid">
                                        <div class="oggetto d-flex flex-column" id="oggetto_signup">
                                                <label for="username">Username</label>
                                                <input type="text" id="username" name="user_username" required>
                                        </div>
                                        <div class="oggetto d-flex flex-column" id="oggetto_signup">
                                                <label for="name">Name</label>
                                                <input type="text" id="name" name="user_name">
                                        </div>
                                        <div class="oggetto d-flex flex-column" id="oggetto_signup">
                                                <label for="surname">Surname</label>
                                                <input type="text" id="surname" name="user_surname">
                                        </div>

                                        <div class="oggetto d-flex flex-column" id="oggetto_signup">
                                                <label for="email">Email</label>
                                                <input type="email" id="email" name="user_email" required>
                                        </div>

                                        <div class="oggetto d-flex flex-column" id="oggetto_signup">
                                                <label for="password">Password</label>
                                                <input type="password" id="password" name="user_password" required>
                                        </div>
                                        <div class="oggetto d-flex flex-column" id="oggetto_signup">
                                                <label for="password-confirm">Confirm Password</label>
                                                <input type="password" id="password-confirm" name="password_confirm" required>
                                        </div>
                                        <div class="oggetto d-flex flex-column" id="oggetto_signup">
                                                <label for="birthday">Date of birth</label>
                                                <input type="date" id="birthday" name="user_birthday" required>
                                        </div>

                                        <div class="oggetto d-flex flex-column" id="oggetto_signup">
                                                <label for="country">Country</label>
                                                <select id="country" name="user_country" required>
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
                                                        <label for="sessoM"><input id="sessoM" type="radio" name="user_gender" value="M" required>
                                                                M</label>
                                                        <label for="sessoF"><input id="sessoF" type="radio" name="user_gender" value="F">
                                                                F</label></label>
                                        </div>
                                        <button type="submit">Sign Up</button>
                                </form>
                        </div>
                </div>
        </main>
        <?php include_once "../../components/footer/footer.html" ?>
</body>

</html>