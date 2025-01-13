<!-- cart -->
<div id="carrello" class="popup">
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 4fcf1090370b23b13499b7123b1ef615008c71c0
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
<<<<<<< HEAD
        if (isset($_COOKIE['cart'])) {
            $cart = json_decode($_COOKIE['cart'], true);
            $tot = 0;
            foreach ($cart as $key => $value) {
                $tot += $value['prezzo'];
                echo "<tr>";
                echo "<td style='text-align: left; width: fit-content'>" . $value['nome'] . "</td>";
                echo "<td style='width: 10%'></td>";
                echo "<td style='text-align: right; width: fit-content'>" . $value['prezzo'] . " $</td>";
                echo "<td><a href='../src/backend/RemoveItemFromCart.php?nome=" . $value['nome'] . "'>&#x1F5D1</a></td>";  // cestino Unicode
                echo "</tr>";
            }
            if ($tot != 0)
                echo "<tr>
                    <td colspan='3'>Total Price: $tot $</td>
                    <td><button type='button' id='acquistaButton'>Buy</button></td>
                  </tr>";
            else {
                echo "<tr><td colspan='4'>Il carrello è vuoto.</td></tr>";
            }
        }
=======
            if (isset($_COOKIE['cart'])) {
                $cart = json_decode($_COOKIE['cart'], true);
                $tot = 0;
                foreach ($cart as $key => $value) {
                    $tot += $value['prezzo'];
                    echo "<tr>";
                    echo "<td style='text-align: left; width: fit-content'>" . $value['nome'] . "</td>";
                    echo "<td style='width: 10%'></td>";
                    echo "<td style='text-align: right; width: fit-content'>" . $value['prezzo'] . " $</td>";
                    echo "<td><a href='../src/backend/RemoveItemFromCart.php?nome=" . $value['nome'] . "'>&#x1F5D1</a></td>";  // cestino Unicode
                    echo "</tr>";
                }
                if ($tot != 0)
                    echo "<tr>
                    <td colspan='3'>Total Price: $tot $</td>
                    <td><button type='button' id='acquistaButton'>Buy</button></td>
                  </tr>";
                else {
                    echo "<tr><td colspan='4'>Il carrello è vuoto.</td></tr>";
                }
            }
>>>>>>> 4fcf1090370b23b13499b7123b1ef615008c71c0
        ?>
    </table>
</div>

<script>
document.getElementById('acquistaButton').addEventListener('click', function() {
    const cart = <?php echo json_encode($cart); ?>; // Ottieni i dati del carrello dal PHP
    const encodedCart = encodeURIComponent(JSON.stringify(cart));
    window.location.href='../src/components/Stripe/Checkout.php?cart='+encodedCart; // Reindirizza l'utente alla pagina di checkout
});
</script>
<<<<<<< HEAD
=======
    <table id="carrello_tbl">
        <tr>
            <th>Nome</th>
            <th>Quantità</th>
            <th>Prezzo</th>
        </tr>
        <?php
        if (isset($_COOKIE['cart'])) {
            if (isset($_COOKIE['cart']))
                $cart = json_decode($_COOKIE['cart'], true);
            $tot = 0;
            foreach ($cart as $key => $value) {
                $tot+=$value['prezzo'];
                echo "<tr>";
                echo "<td>". $value['nome'] . "</td>";
                echo "<td></td>";
                echo "<td>" . $value['prezzo'] . " €</td>";
                echo "<td><a href='php/RemoveItemFromCart.php?nome=" . $value['nome'] . "'>&#x1F5D1</a></td>";  // cestino Unicode
                echo "</tr>";
            }
        }else $tot = 0;
        echo "
             <tr>
                <td>totale:</td>
                <td></td>
                <td>$tot €</td>
            </tr>
             ";
        ?>
    </table>
</div>
>>>>>>> eb391e0e1a245688146621b45c06fe21931c7870
=======
>>>>>>> 4fcf1090370b23b13499b7123b1ef615008c71c0
