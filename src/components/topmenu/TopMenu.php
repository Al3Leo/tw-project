<style>  
    .btn{
        float: right;
        margin: 1rem 1vw;
        width: 5rem;
        height: 2rem;
    }

    #login {
        border: 3px solid #1d0b42;
        border-radius: 25px;
        font-size: small;
    }
    #login:hover{
        border-color: rgb(170, 56, 255) !important;
        transition: 500ms;
    }

    #signup, #cartbtn{
        border: 3px solid #1d0b42;
        border-radius: 25px;
        font-size: small;
    }
    #signup:hover, #cartbtn:hover{
        border-color: rgb(170, 56, 255) !important;
        transition: 500ms;
    }

    #logout {
        border: 3px solid #ff0000;
        border-radius: 25px;
        background-color: rgba(255, 0, 0, 0.9);
        font-size: small;
    }

    #logout:hover {
        background-color: rgb(255, 0, 0) !important;
        border-color: rgb(255, 255, 255) !important;
        transition: 500ms;
    }

    #sideMenu {
        background-color: #1fe100;
        border: none;
        width: 2rem;
        height: 2rem;
        border-radius: 5px;
    }

    #topbar {
        display: flex;
        flex-direction: row;
        width: 100%;
        justify-content: space-between;
    }

    .showMenu {
        width: 100%;
        height: 100%;
        color: rgba(128, 128, 128, 0.65);
    }

    .toggleMenu {
        display: none;
    }

    /*tasto x side menu*/
    .toggleCross {
        display: block !important;
        font-size: xx-large;
        font-weight: lighter;
        color: #ffffff;
        background-color: black;
        border: 0;
        float: right;
    }

    .sideBar {
        display: none;
    }

    /*menu laterale*/
    .toggleShow {
        display: block !important;
        float: right;
        clear: right;
        overflow-block: visible;
        padding-right: 3rem;
        padding-top: 1rem;
        background-color: var(--secondaryColor);
        height: 100vh;
        width: 25vw;
        position: fixed;
        top: 0;
        right: 0;
        z-index: 6;
    }

    #sidebar {
        float: right;
    }

    /*rimuovi puntini list*/
    ul {
        list-style: none;
    }

   .sideBar ul #li-speciale{
    border-bottom: none;
    }

    /*opzioni del menu laterale*/
    #sideBar li {
        clear: right;
        display: block;
        margin: 1rem;
        font-size: 1.5rem;
        align-items: center;
        font-weight: lighter;
        border-bottom: 1px solid #dedede;
    }

    #sideBar li>a {
        text-decoration: none;
        color: white !important;
    }

    #sideBar li>a:hover {
        color: rgb(187, 187, 187) !important;
        transition: 500ms;
        font-weight: bold;
    }


    .userinfoList {
        color: #ffffff;
        border-bottom: none;
        font-size: 80%;
        font-weight: bold;
        text-align: left;
    }
    .tuttoadestra {
        display: flex;
        flex-direction: row;
        width: auto;
        position: relative;
    }

    #userinfo {
        margin: 1em;
        padding: 0;
        color: #ffffff;
        text-align: right;
        list-style: none;
        flex-direction: column;
        gap: 0.5rem;
    }
    #carrello{
        border: 3px solid #47008f;
        display: none;
        z-index: 3;
        background-color: black;
        height: 25vh;
        border-radius: 15px;
        background-image: url('assets/images/space/mars.jpg');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        position: fixed;
    }
    #carrello_tbl{
        margin: 3%;
        margin-top: 5%;
        padding: 1%;
        text-align: center;
    }
</style>
<script>
    function toggleSideMenu() {
        let menu = document.getElementById("sideMenu");
        menu.classList.toggle("toggleMenu");
        let cross = document.getElementById("goBack");
        cross.classList.toggle("toggleCross");
        let bar = document.getElementById("sideBar");
        bar.classList.toggle("toggleShow");
        bar.style.borderBottom = "0";
        let cart=document.getElementById("carrello");
        let btn = document.getElementsByClassName("btn")[1];
        if (btn.style.display != "none") {
            cart.style.display="none";
            btn.style.display = "none";
            btn = document.getElementsByClassName("btn")[2];
            btn.style.display = "none";
        } else {
            btn.style.display = "inline";
            btn = document.getElementsByClassName("btn")[2];
            btn.style.display = "inline";
        }
        //a scopo didattico sono stati usati due metodi diversi (toggle e style di js)
    }
    function openCart(){ //refactoring name in toggle prima o poi
        let cart=document.getElementById("carrello");
        if (cart.style.display != "none")
            cart.style.display="none";
        else
            cart.style.display="flex";
    }
</script>
<header id="topbar">
    <!--logo login e signup-->
    <a href="pages/homepage.php">   <!--svg per il logo-->
        <svg width="158" height="62" viewBox="0 0 158 62" fill="none" xmlns="http://www.w3.org/2000/svg">
<rect width="158" height="62" fill="#1E1E1E"/>
<rect width="165" height="102" transform="translate(-7 -14)" fill="black"/>
<text fill="#F9F4F4" xml:space="preserve" style="white-space: pre" font-family="Inter" font-size="45" font-weight="800" letter-spacing="0em"><tspan x="0" y="54.3636">SPACE&#10;</tspan></text>
<text fill="#F7E951" xml:space="preserve" style="white-space: pre" font-family="Inter" font-size="20" font-weight="400" letter-spacing="0.3em"><tspan x="24" y="19.17">OUTER</tspan></text>
</svg>
</a>
    <div class="tuttoadestra">
        <button class="btn" id="cartbtn" onclick="openCart()">
            <i class="fa-solid fa-cart-shopping"></i> <!--Logo font-awesome-->
        </button>
        <a href="pages/signup/SignUp.php"><button class="btn" id="signup">SignUp</button></a>
        <button class="btn" id="login" onclick="openLoginPopup()">LogIn</button>
        <!--parte di utente loggato-->
        <a href="backend/LogOut.php"><button class="btn" id="logout">LogOut</button></a>
        <div id="userinfo">
            <!--valori da completare in php-->
            <span class="userinfoList"><?php echo $_SESSION['username'] ?></span>
            <br>
            <span class="userinfoList"><?php echo $_SESSION['name']." ".$_SESSION['surname']?></span>
        </div>
        <button class="btn" id="sideMenu" onclick="toggleSideMenu()">&#x2630;</button>
    </div>
    <!-- Sidebar -->
    <div class="sideBar" id="sideBar">
        <ul>
            <li id="li-speciale"><button id="goBack" onclick="toggleSideMenu()">&times</button></li>
            <li><a href="pages/homepage/homepage.php">Home</a></li>
            <li><a href="pages/catalogue/catalogue.php">Catalogue</a></li>
            <li><a href="pages/aboutus/aboutus.php">About us</a></li>
            <li><a href="pages/support/Supporto.php">Contact</a></li>
            <li><a href="pages/spacehistory/NewSpace.php">Space History</a></li>
        </ul>
    </div>
</header>