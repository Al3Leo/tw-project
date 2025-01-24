<!-- cart -->
 <style>
    /*tutto scrollbar*/
 .popup::-webkit-scrollbar { 
    width: 0.5rem; 
    height: 0.5rem; 
} 
.popup::-webkit-scrollbar-track { 
    background-color:transparent;  
} 
.popup::-webkit-scrollbar-thumb { 
        background-color: var(--accent); 
        border-radius: 100px;
}
.popup::-webkit-scrollbar-corner{
    background-color: transparent;
}
 </style>
<div id="carrello" class="popup d-flex flex-column" style="overflow: auto; padding:0.3rem">
    <div id="remove_popup" style="margin-top: 3%; text-align: right; width: 90%">
        <span style="background-color: red; color: white;" onclick="openCart()">close</span>
    </div>



    <table id="carrello_tbl" style="border-spacing: 20px;">
        <tr>
            <th style="text-align: left">Where</th>
            <th></th>
            <th>Price</th>
        </tr>
        <?php
            if (isset($_COOKIE['cart'])) {
                $cart = json_decode($_COOKIE['cart'], true);
                $tot = 0;
                foreach ($cart as $key => $value) {
                    $tot += $value['prezzo'];
                    echo "<tr>";
                    echo "<td style='text-align: left; width: fit-content'>" . $value['nome'] . "</td>";
                    echo "<td style='width: 10%'></td>";
                    echo "<td style='text-align: right; width: fit-content'>" . $value['prezzo'] . " $</td>";
                    echo "<td><button onclick='ajax_remove(" . $value['id'] . ")'>&#x1F5D1</button></td>"; // cestino Unicode
                    echo "</tr>";
                }
                if ($tot != 0)
                    echo "<tr>
                    <td colspan='3'>Total Price: $tot $</td>
                    <td><button type='button' id='acquistaButton'>Buy</button></td>
                  </tr>";
                else {
                    echo "<tr><td colspan='4'>Choose your next destination</td></tr>";
                }
            }
        ?>
    </table>
</div>

<script>
document.getElementById('acquistaButton').addEventListener('click', function() {
    const cart = <?php echo json_encode($cart); ?>; // passo all'url il carrello codificato in json
    const encodedCart = encodeURIComponent(JSON.stringify(cart));
    window.location.href = '../src/components/Stripe/Checkout.php?cart='+encodedCart;
});



//Se l'url ha confirmcheckout mi deve aggiornare il frontend del carrello
window.onload = function() { 
    const urlParams = new URLSearchParams(window.location.search); 
    if (urlParams.has('confirmcheckout')) { 
        svuotaCarrelloFrontend();
    }
};
function svuotaCarrelloFrontend() { 
    document.getElementById('carrello_tbl').innerHTML = `<tr> <th style="text-align: left">Where</th> <th></th> <th>Price</th> </tr> <tr><td colspan="4">Choose your next destination</td></tr>`;
}

function ajax_remove(id) {
    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'backend/RemoveItemFromCart.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            // Aggiorna l'interfaccia utente dopo aver rimosso l'elemento
            document.location.reload(true);
        }
    };
    xhr.send('id=' + id);
}


</script>
