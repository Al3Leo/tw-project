<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <style>
        html,body{
            margin: 0;
        }

        body {
            background-image: linear-gradient(75deg, rgb(14,11,19), rgb(82, 0, 124));
            background-repeat: no-repeat;
            background-size: cover;
            height: 100vh;
            display: flex;
            flex-direction: column;
        }
        /* sezione login */
        .popup{
            position: absolute;
            margin-top: 10em;
            margin-left: 35%;
            color: white;
            height: auto;
            width: 25%;
            display: flex;
            flex-direction: column;
            align-items: center;
            font-size: 90%;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            background-color: #8546ff;
            border: 3px solid #1d0b42;
        }
        .popuphead{
            background-color: #5000fd;
            display: flex;
            width: 100%;
            justify-content: space-between;
            margin-bottom: 1%;
        }
        #loginpopup{
            display: none;
        }
        #closePopup{
            color: #ffffff;
            font-size: 80%;
            text-align: center;
            background-color: red;
            width: 3%;
            height: auto;
            align-self: center;
            cursor: pointer;
        }
        #popupMain{
            margin-top: 7%;
        }
    </style>
    <meta name="Author" content="Gruppo05"/>
    <base href="../"/>
    <link rel="icon" href="img/favicon.png" type="image/png/">
    <script src="js/TopMenu.js"></script>
</head>
<body>
<!--mi sa che il base href vale solo per html e non php-->
<?php include_once '../html/TopMenu.html'?>

<div class="popup" id="loginpopup">
    <header class="popuphead">Login
        <span id="closePopup" onclick="closeLoginPopup()">x</span>
    </header>
    <main id="popupMain">
        <form method="post">
            <label>Username</label><br>
            <input type="text" name="username" placeholder="Username" required>
            <br>
            <label>Password</label><br>
            <input type="password" name="password" placeholder="Password" required>
            <br>
            <label><a href="RecuperaPassword.php">Password smarrita?</a> </label>
            <br>
            <input type="submit" value="Login" style="margin-left: 37%; margin-top: 10%; margin-bottom: 7%; border: 1px solid black; border-radius: 5px; background-color: #adadad; color: white">
        </form>
    </main>
</div>

<script>
    function openLoginPopup(){
        document.getElementById("loginpopup").style.display = "flex";
    }
    function closeLoginPopup(){
        document.getElementById("loginpopup").style.display = "none";
    }
</script>


<main>
    <form method="get" action="php/ConfermaDinamica.php">
        <input type="hidden" name="confermaDinamica" value="confermato dinamicamente">
        <button type="submit">provami</button>
    </form>
</main>

<?php include_once '../html/Footer.html'?>
</body>
</html>