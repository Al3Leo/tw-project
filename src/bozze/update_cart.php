<?php
//qui sostanzialmente è un copia e incolla di cart.php adattato ad ajax, uso output perchè altrimenti si crea un casino se copiassi solo da cart.php con un solo echo per tutto il codice
if (isset($_COOKIE['cart'])) {
    $cart = json_decode($_COOKIE['cart'], true);
    $tot = 0;

    $output = "
        <tr>
            <th style='text-align: left'>Where</th>
            <th></th>
            <th>Price</th>
        </tr>
    ";
    foreach ($cart as $key => $value) {
        $tot += $value['prezzo'];
        $output .= "
            <tr>
                <td style='text-align: left; width: fit-content'>" . htmlspecialchars($value['nome']) . "</td>
                <td style='width: 10%'></td>
                <td style='text-align: right; width: fit-content'>" . htmlspecialchars($value['prezzo']) . " $</td>
                <td><a href='../src/backend/RemoveItemFromCart.php?nome=" . urlencode($value['nome']) . "'>&#x1F5D1</a></td>
            </tr>
        ";
    }
    if ($tot != 0) {
        $output .= "
            <tr>
                <td colspan='3'>Total Price: $tot $</td>
                <td><button type='button' id='acquistaButton'>Buy</button></td>
            </tr>";
    } else {
            $output .= "<tr><td colspan='4'>Il carrello è vuoto.</td></tr>
    ";
    }
    echo $output;
} else {
    echo "<tr><td colspan='4'>Il carrello è vuoto.</td></tr>";
}
?>