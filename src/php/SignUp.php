<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
        .input input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            margin-right: 20px;
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
            justify-content: center;
        }
    </style>
</head>
<body>
<div class="input">
    <label for="username">Username</label>
    <input type="text" id="username" name="username">
    <label for="country">Country</label>
    <input type="text" id="country" name="country">
    <label for="name">Name</label>
    <input type="text" id="name" name="name">
    <label for="Surname">Surname</label>
    <input type="text" id="surname" name="surname">
    <label for="password">Passowrd</label>
    <input type="text" id="password" name="password">
    <label for="password-confirm">Confirm Password</label>
    <input type="text" id="password-confirm" name="password-confirm">
    <label for="adress">Adress</label>
    <input type="email" id="adress" name="adress">
    <label>
        <input type="radio" name="genere" value="M">
        <span>M</span>
    </label>
    <label>
        <input type="radio" name="genere" value="F">
        <span>F</span>
    </label>
    <button>Sign Up</button>
</div>
</body>
</html>