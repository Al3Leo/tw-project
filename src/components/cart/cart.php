<!-- cart -->
<div id="carrello" class="popup">
    <div id="remove_popup" style="margin-top: 3%; text-align: right; width: 90%">
        <span style="background-color: red; color: white;" onclick="openCart()">close</span>
    </div>
    <table id="carrello_tbl">

        <tr>
            <th style="text-align: left">Nome</th>
            <th></th>
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
                echo "<td style='text-align: left; width: fit-content'>". $value['nome'] . "</td>";
                echo "<td style='width: 10%'></td>";
                echo "<td style='text-align: right; width: fit-content'>" . $value['prezzo'] . " €</td>";
                echo "<td><a href='backend/RemoveItemFromCart.php?nome=" . $value['nome'] . "'>&#x1F5D1</a></td>";  // cestino Unicode
                echo "</tr>";
            }
        }else $tot = 0;
        echo "
            <tr><td style='visibility: hidden'>nascosto per provare l'attributo hidden, potevamo usare css</td></tr>
             <tr>
                <td style='text-align: left'>totale:</td>
                <td></td>
                <td>$tot €</td>
            </tr>
             ";
        ?>
    </table>
</div>