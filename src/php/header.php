<?php
require_once '../html/TopMenu.php';
require_once '../html/PopupLogin.html';
require_once '../html/Cart.php';
if($_SESSION["username"])
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
?>