<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .input {
            background-color: aliceblue;
        }
    </style>
</head>
<body>
<div class="input">
    <label for="username">Username</label>
    <input type="text" id="username" name="user_username">
    <label for="country">Country</label>
    <input type="text" id="country" name="user_country">
    <label for="name">Name</label>
    <input type="text" id="name" name="user_nome">
    <label for="Surname">Surname</label>
    <input type="text" id="surname" name="user_cognome">
    <label for="password">Passowrd</label>
    <input type="text" id="password" name="user_password">
    <label for="password-confirm">Confirm Password</label>
    <input type="text" id="password-confirm" name="password-confirm">
    <label for="adress">Adress</label>
    <input type="text" id="address" name="user_address">
    <label>
        <input type="radio" name="user_sesso" value="M">
        <span>M</span>
    </label>
    <label>
        <input type="radio" name="user_sesso" value="F">
        <span>F</span>
    </label>
    <button>Sign Up</button>
</div>
</body>
</html>