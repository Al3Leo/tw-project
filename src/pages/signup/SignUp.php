<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once "../../components/utils/headMetadata.html"?>
    <title>Sign up</title>
    <style>
        .input {
            background-color: aliceblue;
            border: 1px solid #ddd;
            margin-right: 10px;
            margin-left: 10px;
            padding: 30px;
            max-width: 400px;
            width: 100%;
        }
        body {
            font-family: Arial;
            background-color: aliceblue;
            padding: 30px;
            display: flex;
            justify-content: center;
        }
        .input label {
            font-weight: bold;
            margin-right: 20px;
            margin-bottom: 20px;
            display: block;
        }
        .input input, .input select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }
        .input button {
            width: 50%;
            padding: 10px;
            background-color: #2d0453;
            color: white;
            font-size: 16px;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
<div class="input">
    <form method="POST" action="RegistraUtente.php" id="signupForm" onsubmit="window.open('../../backend/ConfermaDinamica.php?confermaDinamica=Your account has been created', 'blank')">
        <label for="username">Username</label>
        <input type="text" id="username" name="user_username" required>

        <label for="country">Country</label>
        <select id="country" name="user_country" required>
            <option value="it">Italy</option>
            <option value="us">United States</option>
            <option value="cn">Canada</option>
            <option value="fr">France</option>
            <option value="gr">Germany</option>
            <option value="uk">United Kingdom</option>
        </select>

        <label for="name">Name</label>
        <input type="text" id="name" name="user_name" required>

        <label for="surname">Surname</label>
        <input type="text" id="surname" name="user_surname" required>

        <label>date of birth</label>
        <input type="date" id="birthday" name="user_birthday" required>

        <label for="password">Password</label>
        <input type="password" id="password" name="user_password" required>

        <label for="password-confirm">Confirm Password</label>
        <input type="password" id="password-confirm" name="password_confirm" required>

        <label for="email">Email</label>
        <input type="email" id="email" name="user_email" required>

        <label>Gender</label>
        <label>
            <input type="radio" name="user_gender" value="M" required>
            Male
        </label>
        <label>
            <input type="radio" name="user_gender" value="F">
            Female
        </label>

        <button type="submit">Sign Up</button>
    </form>
</div>
<script type="text/javascript">
    document.getElementById('signupForm').addEventListener('submit', function(event) {
    const username = document.getElementById('username').value.trim();
    const password = document.getElementById('password').value.trim();
    const confirmPassword = document.getElementById('password-confirm').value.trim();
    const name = document.getElementById('name').value.trim();
    const surname = document.getElementById('surname').value.trim();
    let errors = [];

    if(username.length < 3 || username.length> 20) {
        errors.push("error");
    }

    if(name == '' || surname == '') {
        errors.push("error");
    }

    if(password.length < 8) {
        errors.push("error");
    }else if(password != confirmPassword) {
        errors.push("error");
    }

    if(errors.length > 0) {
        event.preventDefault();
        alert(errors);
    }
});
    </script>

    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $errors = [];
    }

    $username = trim($_POST['user_username']);
    $name = trim($_POST['user_name']);
    $surname = trim($_POST['user_surname']);
    $password = trim($_POST['user_password']);
    $confirmPassword = trim($_POST['password_confirm']);
    $email = trim($_POST['user_email']);
    $country = trim($_POST['user_country']);
    $gender = trim($_POST['user_gender']);
    $birthday = trim($_POST['user_birthday']);

    if(strlen($username) < 3 || strlen($username) > 20) {
        $errors[] = "error"; 
    }

    if(empty($name) || empty($surname)) {
        $errors[] = "error";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "error";
    }

    if(strlen($password) < 8) {
        $errors[] = "error";
    }elseif($password != $confirmPassword) {
        $errors[] = "error";
    }
    
    if($gender !== "M" && $gender !== "F") {
        $errors[] = "error";
    }

    $countries = ["it", "us", "cn", "fr", "gr", "uk"];
    if (!in_array($country, $countries)) {
        $errors[] = "error";
    }
    
    $birthDate = DateTime::createFromFormat('Y-m-d', $birthday);
    if (!$birthDate || $birthDate > new DateTime()) {
        $errors[] = "error";
    }

    if(empty($errors)) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        echo "Registration successful!";
    }else {
        echo "<ul>";
        foreach ($errors as $error) {
            echo "<li>$error</li>";
        }
        echo "</ul>";
    }
    ?>

</body>
</html>