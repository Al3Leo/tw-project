<script>
    function toggleSideMenu() {
        let menu = document.getElementById("sideMenu");
        menu.classList.toggle("toggleMenu");
        let cross = document.getElementById("goBack");
        cross.classList.toggle("toggleCross");
        let bar = document.getElementById("sideBar");
        bar.classList.toggle("toggleShow");
        cart.classList.toggle("toggleCart");
        bar.style.borderBottom = "0";
        let btnSignup = document.getElementById("signup");
        let btnLogin = document.getElementById("login");
        let btnLogout = document.getElementById("logout");
        let userinfo=document.getElementById("userinfo");
        let cart = document.getElementById("carrello");
        if (btnSignup.style.display == "none") {//l'utente non è loggato 
            cart.style.display = "none";
            btnSignup.style.display = "none";
            btnLogin.style.display = "none";
            btnLogout.style.display = "inline";
            userinfo.style.display = "inline";
        } else {
            btnSignup.style.display = "inline";
            btnLogin.style.display = "inline";
            btnLogout.style.display = "none";
            userinfo.style.display = "none";
        }
        //a scopo didattico sono stati usati due metodi diversi (toggle e style di js)
    }

    function openCart() { //refactoring name in toggle prima o poi
        let cart = document.getElementById("carrello");
        if (cart.style.display != "none")
            cart.style.display = "none";
        else{
            document.getElementById("loginpopup").style.display = "none";
            cart.style.display = "flex";}
    }
</script>
<header id="topbar">
    <!--logo login e signup-->
    <a href="pages/homepage/homepage.php"> <!--svg per il logo-->
        <svg width="158" height="62" viewBox="0 0 158 62" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect width="158" height="62" />
            <rect width="165" height="102" transform="translate(-7 -13)" />
            <defs>
                <filter id="shadow" x="-50%" y="-50%" width="200%" height="200%">
                    <feDropShadow dx="3" dy="2" stdDeviation="0" flood-color="rgba(212, 187, 221, 0.5)" />
                </filter>
            </defs>
            <text fill="#F9F4F4" xml:space="preserve" style="white-space: pre; font-family: 'Montserrat', serif; 
            font-weight: 650; font-style: normal;" family="Montserrat" font-size="42" filter="url(#shadow)" letter-spacing="0em">
                <tspan x="7" y="54.3636">SPACE&#10;</tspan>
            </text>
            <text fill="#F7E951" xml:space="preserve" style="white-space: pre; font-family: 'Montserrat', serif; 
            font-weight: 602; font-style: normal;" font-size="20" font-weight="350" letter-spacing="0.3em">
                <tspan x="27" y="19.17">OUTER</tspan>
            </text>
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
    <span class="userinfoList" style="text-transform: uppercase;font-family: sans-serif;"><?php if(isset($_SESSION['username'])) { echo $_SESSION['username']; }?></span>
    <br>
    <span class="userinfoList" style="font-weight: 500;"><?php if(isset($_SESSION['name'])) { echo $_SESSION['name']; }?></span>
    <span class="userinfoList" style="font-weight: 500;">
        <?php 
        if(isset($_SESSION['surname'])) echo '&nbsp;' . $_SESSION['surname']; 
        ?>
    </span>
</div>

        <button class="btn" id="sideMenu" onclick="toggleSideMenu()">&#x2630;</button>
    </div>
    <!-- Sidebar -->
    <div class="sideBar" id="sideBar">
        <ul>
            <li id="li-speciale"><button id="goBack" onclick="toggleSideMenu()">&times;</button></li>
            <li><a href="pages/homepage/homepage.php">Home</a></li>
            <li id="vistoStorico"><a href="pages/OrderHistory/ConologiaOrdine.php">Order History</a></li>
            <li><a href="pages/catalogue/catalogue.php">Catalogue</a></li>
            <li><a href="pages/aboutus/aboutus.php">About us</a></li>
            <li><a href="pages/support/Supporto.php">Contact</a></li>
            <li><a href="pages/spacehistory/NewSpace.php">Space History</a></li>
            
        </ul>
    </div>
</header>