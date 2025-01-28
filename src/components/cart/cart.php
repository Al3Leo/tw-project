<div id="carrello" class="popup d-flex flex-column scroll" style="display: none;">
    <!-- cart 
    Questo script gestisce la funzionalità del carrello, consentendo agli utenti di visualizzare, aggiornare e acquistare gli articoli nel loro carrello.
     I dati del carrello sono memorizzati nei cookie e gestiti utilizzando PHP e JavaScript.
     -->
    <div id="remove_popup">
        <!-- Pulsante di chiusura per il popup del carrello. Utilizza metodo openCart presente nel file topmenu.php -->
        <button onclick="openCart()"><i class="material-icons" style="font-size:10px;color:white">close</i></button>
    </div>
    <table id="carrello_tbl" style="border-spacing: 18px;">
        <thead>
            <tr>
                <th style="text-align: left">Where</th>
                <th></th>
                <th>Departure</th>
                <th></th>
                <th style="text-align: left" colspan="2">Price</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (isset($_COOKIE['cart'])) {
                $cart = json_decode($_COOKIE['cart'], true);
                $tot = 0;
                foreach ($cart as $key => $value) {
                    $tot += $value['prezzo'];
                    $departureDate = date_create($value['datapartenza'])->format('d F Y');
                    echo "<tr id='volo-" . $value['id'] . "' data-prezzo='" . $value['prezzo'] . "' >"; //Attributo personalizzato data-
                    echo "<td class='nome'style='text-align: left; width: fit-content'>" . $value['nome'] . "</td>";
                    echo "<td style='width: 10%'></td>";
                    echo "<td class='partenza'style='text-align: left; width: fit-content'>" . $departureDate . "</td>";
                    echo "<td style='width: 10%'></td>";
                    echo "<td class='prezzo' style='text-align: right; width: fit-content'>" . $value['prezzo'] . " $</td>";
                    echo "<td><button class='removeButton' onclick='ajax_remove_cart(" . $value['id'] . ")'>&#x1F5D1</button></td>"; // cestino Unicode
                    echo "</tr>";
                }
                if ($tot == 0) {
                    echo "<tr id='row-choose'><td colspan='6'>Choose your next destination</td></tr>";
                }
            } else {
                echo "<tr id='row-choose'><td colspan='6'>Choose your next destination</td></tr>";
            }
            ?>
        </tbody>
        <tfoot id="tfoot"
            <?php
            if (empty($cart)) {
                echo "style='display:none;'";
            } else {
                echo "style='display:'';'";
            }   ?>>
            <td id='total-cart' colspan='5'>
                <?php
                if (isset($cart)) {
                    echo "Total price: " . $tot . '$';
                } ?>
            </td>
            <td><button type='button' onclick='buyCart()' id='acquistaButton' <?php if (!isset($_SESSION['username'])) {
                                                                                    echo "style='display:none;'"; //se l'utente non è loggato vede solo la lista degli elementi
                                                                                }  ?>>Buy
                                                                                </button></td>
        </tfoot>
    </table>
</div>
<script>
    /*
     *Gestisce il processo di acquisto.
     * Questa funzione controlla se l'utente è loggato. Se l'utente è loggato, codifica i dati del carrello in JSON e redireziona alla pagina di pagamento.
     * Se l'utente non è loggato, apre il popup di login.
     */
    function buyCart() {
        <?php if (isset($_SESSION['username'])) { ?>
            const cart = <?php echo json_encode($cart); ?>; // passo all'URL il carrello codificato in JSON
            const encodedCart = encodeURIComponent(JSON.stringify(cart));
            window.location.href = '../src/components/Stripe/Checkout.php?cart=' + encodedCart;
        <?php } else { ?>
            openLoginPopup();
        <?php } ?>
    };

    /**DEVO METTERLA NELLA PAGINA PER CONFERMA
     * Eseguito al caricamento della finestra.
     * Questa funzione viene eseguita quando la finestra del browser è completamente caricata.
     * Verifica la presenza del parametro confirmcheckout nell'URL.
     * Se il parametro è presente, chiama la funzione svuotaCarrelloFrontend() per svuotare il carrello nel frontend.
     */
    window.onload = function() {
        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.has('confirmcheckout')) {
            svuotaCarrelloFrontend();
        }
    };
    /**
     * Svuota il carrello nel frontend.
     *
     * Questa funzione aggiorna l'interfaccia utente per mostrare un carrello vuoto. 
     * Imposta il contenuto del 'tbod' della tabella del carrello per visualizzare un messaggio che invita a scegliere una nuova destinazione
     * e nasconde il 'tfoot'.
     * 
     */
    function svuotaCarrelloFrontend() {
        document.getElementById('carrello_tbl').getElementsByTagName('tbody')[0].innerHTML = `
        <tr id='row-choose'><td colspan="5">Choose your next destination</td></tr>`;
        document.getElementById('tfoot').style.display = 'none';
    }
    /**
     * Rimuove un elemento dal carrello utilizzando una chiamata AJAX.
     *
     * Questa funzione invia una richiesta HTTP POST al server per rimuovere un elemento specificato dal carrello.
     * Se l'elemento viene rimosso con successo, l'interfaccia utente viene aggiornata per riflettere la modifica.
     *
     */
    function ajax_remove_cart(id) {
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
                    const itemElement = document.getElementById('volo-' + id);
                    itemElement.remove();
                    updateCartTotal();
                }
            }
        };
        xhr.send('id=' + id);
    }
    /**
     * Aggiorna il prezzo totale nel carrello.
     *
     * Questa funzione calcola il prezzo totale degli articoli presenti nel carrello, sommando i valori degli attributi 
     * 'data-prezzo' di ogni riga della tabella. Il prezzo totale viene poi visualizzato nell'elemento con ID total-cart.
     * 
     * La funzione viene chiamata sia da ajax_remove() che da ajax_add_cart().
     */
    function updateCartTotal() {
        const righeCart = document.querySelectorAll('tr[data-prezzo]');
        let total = 0;
        righeCart.forEach(function(row) {
            total += parseFloat(row.getAttribute('data-prezzo'));
        });
        document.getElementById('total-cart').textContent = 'Total Price:  ' + total + ' $';
    }
</script>