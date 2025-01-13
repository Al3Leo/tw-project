<?php

/* Abilita log */
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/../topmenu/TopMenu.php';
require_once __DIR__ . '/../login/PopupLogin.html';
require_once __DIR__ . '/../cart/cart.php';

if (isset($_SESSION["username"])) {
    echo "
    <script defer>
        let login=document.getElementById(\"login\");
        login.style.setProperty('display', 'none', 'important');
        let signup=document.getElementById(\"signup\");
        signup.style.setProperty('display', 'none', 'important');
    </script>
    ";
} else {
    echo "
    <script defer>
        let logout=document.getElementById(\"logout\");
        logout.style.setProperty('display', 'none', 'important');
        let userinfo=document.getElementById(\"userinfo\");
        userinfo.style.setProperty('display', 'none', 'important');
    </script>
    ";
}
?>
