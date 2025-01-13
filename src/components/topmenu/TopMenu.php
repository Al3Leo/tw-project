<style>  
    .btn{
        float: right;
        margin: 1rem 1vw;
        width: 5rem;
        height: 2rem;
        padding: 0.5em;
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

    #signup {
        border: 3px solid #1d0b42;
        border-radius: 25px;
        font-size: small;
    }
    #signup:hover{
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
<<<<<<< HEAD
<<<<<<< HEAD
        z-index: 6;
=======
        z-index: 1;
>>>>>>> eb391e0e1a245688146621b45c06fe21931c7870
=======
        z-index: 6;
>>>>>>> 4fcf1090370b23b13499b7123b1ef615008c71c0
    }

    #sidebar {
        float: right;
    }

    /*rimuovi puntini list*/
    ul {
        list-style: none;
    }

<<<<<<< HEAD
<<<<<<< HEAD
   .sideBar ul #li-speciale{
    border-bottom: none;
=======
    /*la x nel menu*/
    #li-speciale {
        border-bottom: none;
>>>>>>> eb391e0e1a245688146621b45c06fe21931c7870
=======
   .sideBar ul #li-speciale{
    border-bottom: none;
>>>>>>> 4fcf1090370b23b13499b7123b1ef615008c71c0
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
<<<<<<< HEAD
<<<<<<< HEAD
        border: 3px solid #47008f;
=======
        border: 3px solid #ffffff;
>>>>>>> eb391e0e1a245688146621b45c06fe21931c7870
=======
        border: 3px solid #47008f;
>>>>>>> 4fcf1090370b23b13499b7123b1ef615008c71c0
        display: none;
        z-index: 3;
        background-color: black;
        height: 25vh;
        border-radius: 15px;
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 4fcf1090370b23b13499b7123b1ef615008c71c0
        background-image: url('assets/images/space/mars.jpg');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        position: fixed;
<<<<<<< HEAD
=======
>>>>>>> eb391e0e1a245688146621b45c06fe21931c7870
=======
>>>>>>> 4fcf1090370b23b13499b7123b1ef615008c71c0
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
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 4fcf1090370b23b13499b7123b1ef615008c71c0
        let cart=document.getElementById("carrello");
        let btn = document.getElementsByClassName("btn")[1];
        if (btn.style.display != "none") {
            cart.style.display="none";
<<<<<<< HEAD
=======
        let btn = document.getElementsByClassName("btn")[1];
        if (btn.style.display != "none") {
>>>>>>> eb391e0e1a245688146621b45c06fe21931c7870
=======
>>>>>>> 4fcf1090370b23b13499b7123b1ef615008c71c0
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
<<<<<<< HEAD
<<<<<<< HEAD
    function openCart(){ //refactoring name in toggle prima o poi
=======
    function openCart(){
>>>>>>> eb391e0e1a245688146621b45c06fe21931c7870
=======
    function openCart(){ //refactoring name in toggle prima o poi
>>>>>>> 4fcf1090370b23b13499b7123b1ef615008c71c0
        let cart=document.getElementById("carrello");
        if (cart.style.display != "none")
            cart.style.display="none";
        else
            cart.style.display="flex";
    }
</script>
<header id="topbar">
    <!--logo login e signup-->
    <a href="pages/homepage.php"><img  src="" alt="logo"/></a>
    <div class="tuttoadestra">
        <button class="btn" id="cartbtn" onclick="openCart()">
            <i class="fa-solid fa-cart-shopping"></i> <!--Logo font-awesome-->
        </button>
        <a href="pages/signup/SignUp.php"><button class="btn" id="signup">SignUp</button></a>
        <button class="btn" id="login" onclick="openLoginPopup()">LogIn</button>
        <!--parte di utente loggato-->
<<<<<<< HEAD
<<<<<<< HEAD
        <a href="backend/LogOut.php"><button class="btn" id="logout">LogOut</button></a>
=======
        <a href="components/LogOut.php"><button class="btn" id="logout">LogOut</button></a>
>>>>>>> eb391e0e1a245688146621b45c06fe21931c7870
=======
        <a href="backend/LogOut.php"><button class="btn" id="logout">LogOut</button></a>
>>>>>>> 4fcf1090370b23b13499b7123b1ef615008c71c0
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
            <li><a href="pages/catalogue/catalogue.php">Catalogo</a></li>
            <li><a href="pages/aboutus/aboutus.php">About us</a></li>
            <li><a href="pages/support/Supporto.php">Contact</a></li>
            <li><a href="pages/spacehistory/NewSpace.php">Space History</a></li>
        </ul>
    </div>
</header>