<?php
require_once '../html/TopMenu.php';
require_once '../html/PopupLogin.html';
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
/*
if($_SESSION['utente']) {
    echo "<script type='text/javascript'>let usrinfo=document.getElementById(\"userinfo\");
    usrinfo.style.display = \"flex\";
    let usrinfoList=getElementById(userinfoList);
    usrinfoList.style.display = \"flex\";
    let logout=document.getElementById(\"logout\");
    logout.style.display = \"block\";

    let singup=document.getElementById(\"signup\");
    signup.style.display = \"none\";
    let login=document.getElementById(\"login\");
    login.style.setProperty('display', 'none', 'important');
    </script>";
}*/
?>