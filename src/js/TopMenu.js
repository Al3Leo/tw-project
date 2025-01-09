function toggleSideMenu() {
    let menu = document.getElementById("sideMenu");
    menu.classList.toggle("toggleMenu");
    let cross = document.getElementById("goBack");
    cross.classList.toggle("toggleCross");
    let bar = document.getElementById("sideBar");
    bar.classList.toggle("toggleShow");
    bar.style.borderBottom="0";
    let btn = document.getElementsByClassName("btn")[1];
    if (btn.style.display != "none") {
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