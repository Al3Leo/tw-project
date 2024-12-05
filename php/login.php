<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<style>
    input {
        background-color: aliceblue;
       
    }
    ul {
        list-style: none;
    }


</style>
<link rel="icon" href="img/favicon.png" type="image/png/">
<link rel="stylesheet" href="css/TopMenu.css"/>
</head>
<body>
    <?php include_once 'TopMenu.html'?>
<div class="input">
    <ul>
   <li> <label for="username">Username</label> 
    <input type="text" id="username" name="username"> </li> <br>
    <li>  <label for="country">Country</label> 
    <input type="text" id="country" name="country"> </li> <br>
    <li>  <label for="name">Name</label>
    <input type="text" id="name" name="name"> </li> <br>
    <li>  <label for="Surname">Surname</label>
    <input type="text" id="surname" name="surname"> </li> <br>
    <li>  <label for="password">Passowrd</label>
    <input type="password" id="password" name="password"> </li> <br> 
    <li>  <label for="password-confirm">Confirm Password</label>
    <input type="password" id="password-confirm" name="password-confirm"> </li> <br>
    <li>  <label for="adress">E-mail</label>
    <input type="email" id="adress" name="adress">
    <li>   <label> </li> <br>
     <input type="radio" name="genere" value="M"> 
    <span>M</span> 
    </label>
    <label>
    <input type="radio" name="genere" value="F"> 
    <span>F</span>
    </label> <br> 
    <li>  <button>Sign Up</button> </li> <br>
</ul>

</div>
</body>
</html>