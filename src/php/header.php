<?php
require_once '../html/TopMenu.html';
require_once '../html/PopupLogin.html';
if($_SESSION['utente']){
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
}
?>