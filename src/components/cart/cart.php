<!-- cart -->
<div id="carrello" class="popup d-flex flex-column scroll" style="overflow: auto; padding:0.3rem; display:none;">
    <div id="remove_popup" style="margin-top: 2%; text-align: right; width: 90%">
        <button style="background-color: red; color: white; cursor:pointer; padding: 4px;" onclick="openCart()"><i class="material-icons" style="font-size:10px;color:white">close</i></button>
    </div>
    <table id="carrello_tbl" style="border-spacing: 18px;">
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
                echo "<tr id='item-" . $value['id'] . "' destinazione-prezzo='" . $value['prezzo'] . "'>";
                echo "<td style='text-align: left; width: fit-content'>" . $value['nome'] . "</td>";
                echo "<td style='width: 10%'></td>";
                echo "<td style='text-align: right; width: fit-content'>" . $value['prezzo'] . " $</td>";
                echo "<td><button onclick='ajax_remove(" . $value['id'] . ")'>&#x1F5D1</button></td>"; // cestino Unicode
                echo "</tr>";
            }
            if ($tot != 0)
                echo "<tr>
                    <td id='total-cart' colspan='3'>Total Price: $tot $</td>
                    <td><button type='button'onclick='buy' id='acquistaButton'>Buy</button></td>
                  </tr>";
            else {
                echo "<tr><td colspan='4'>Choose your next destination</td></tr>";
            }
        }
        ?>
    </table>
</div>
<script>
    function buy() {
        <?php if (isset($_SESSION['username'])) { ?>
            const cart = <?php echo json_encode($cart); ?>; // passo all'URL il carrello codificato in JSON
            const encodedCart = encodeURIComponent(JSON.stringify(cart));
            window.location.href = '../src/components/Stripe/Checkout.php?cart=' + encodedCart;
        <?php } else { ?>
            openLoginPopup();
        <?php } ?>
    };

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
                const response = JSON.parse(xhr.responseText);
                if (response.cartEmpty) {
                    svuotaCarrelloFrontend();
                } else {
                    const itemElement = document.getElementById('item-' + id);
                    if (itemElement) {
                        itemElement.remove();
                        updateCartTotal();
                    }
                }
            }
        };
        xhr.send('id=' + id);
    }

    function updateCartTotal() {
        const righeCart = document.querySelectorAll('tr[destinazione-prezzo]');
        let total = 0;
        righeCart.forEach(function(row) {
            total += parseFloat(row.getAttribute('destinazione-prezzo'));
        });
        document.getElementById('total-cart').textContent = 'Total Price:  ' + total + ' $';
    }
</script>