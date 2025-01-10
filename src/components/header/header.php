<?php
/* 
ABILITA I LOG
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
*/

/*
require_once '../topmenu/TopMenu.php';
require_once '../login/PopupLogin.html';
require_once '../cart/cart.php';
*/

require_once $_SERVER['DOCUMENT_ROOT'] . '/tw-project/src/components/topmenu/TopMenu.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/tw-project/src/components/login/PopupLogin.html';
require_once $_SERVER['DOCUMENT_ROOT'] . '/tw-project/src/components/cart/cart.php';


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
