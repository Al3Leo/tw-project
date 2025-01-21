/* Questo script js generico puó essere utilizzato per aprire un popUp in qualunque pagina del sito*/

function openDialog(){
    let cart=document.getElementById("carrello");
    cart.style.display="none";
    document.getElementById("loginpopup").style.display = "flex";
    getPos();
}
function closeLoginPopup(){
    document.getElementById("loginpopup").style.display = "none";
}