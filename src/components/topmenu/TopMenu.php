
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
            <li id="li-speciale"><button id="goBack" onclick="toggleSideMenu()">&times;</button></li>
            <li><a href="pages/homepage/homepage.php">Home</a></li>
            <li><a href="pages/catalogue/catalogue.php">Catalogue</a></li>
            <li><a href="pages/aboutus/aboutus.php">About us</a></li>
            <li><a href="pages/support/Supporto.php">Contact</a></li>
            <li><a href="pages/spacehistory/NewSpace.php">Space History</a></li>
        </ul>
    </div>
</header>