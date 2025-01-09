<?php
/* Abilita log 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

/* 
Se scritti in questo modo gli include in sottocartelle di php o html non funzionano 
dato che non trova i percorsi (vedi php/pages/catalogue.php)

    require_once '../html/TopMenu.php';
    require_once '../html/PopupLogin.html';
    require_once '../html/Cart.php';
*/

require_once $_SERVER['DOCUMENT_ROOT'] . '/src/html/TopMenu.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/src/html/PopupLogin.html';
require_once $_SERVER['DOCUMENT_ROOT'] . '/src/html/Cart.php';

if ($_SESSION["username"])
    echo "
    <script>
        let login=document.getElementById(\"login\");
        login.style.setProperty('display', 'none', 'important');
        let signup=document.getElementById(\"signup\");
        signup.style.setProperty('display', 'none', 'important');
    </script>
    ";
else echo "
<script>
let logout=document.getElementById(\"logout\");
logout.style.setProperty('display', 'none', 'important');
let userinfo=document.getElementById(\"userinfo\");
userinfo.style.setProperty('display', 'none', 'important');
</script>
";
