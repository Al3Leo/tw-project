/**
 * Funzioni JavaScript per la gestione del carrello degli acquisti.
 *
 * Contiene le funzioni per aggiungere, rimuovere e aggiornare gli elementi del carrello,
 * nonché per creare nuove righe per visualizzare gli articoli nel carrello.
 */

/**
 * Aggiunge un elemento al carrello utilizzando una chiamata AJAX.
 *
 * Questa funzione invia una richiesta HTTP POST al server per aggiungere un elemento specificato al carrello.
 * Se l'elemento viene aggiunto con successo, l'interfaccia utente viene aggiornata per riflettere la modifica.
 *
 */
function ajax_add_cart(id, destinazione, costo, partenza) {
    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'backend/addToCart.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            // Aggiorna il conteggio totale del carrello o mostra una notifica
            updateCartAdd(id, destinazione, costo, partenza);
            verifica = document.getElementById(id + '-span');//faccio questo per i click consegutivo 
            if (!verifica) {
                var btn = document.getElementById(id + '-btn');
                var td = document.getElementById(id + '-td');
                btn.style.display = 'none';
                // Creare uno span con il testo "Added"
                var span = document.createElement('span');
                span.id = id + '-span';
                span.style.fontWeight = '700';
                span.style.color = '#f7e951';
                span.textContent = 'ADDED';
                td.appendChild(span);
            }
        }
    };
    xhr.send('id=' + id);
}
/**
 * Aggiunge una nuova riga al carrello e aggiorna l'interfaccia utente.
 *
 * Questa funzione aggiunge un nuovo elemento al carrello nel frontend. 
 * Se la riga di scelta è presente, viene rimossa e viene aggiunta una nuova riga per il nuovo elemento.
 * Aggiorna anche il totale del carrello.
 *
 */
function updateCartAdd(id, destinazione, costo, partenza) {
    //Se l'utente preme per la prima volta il button per l'aggiunta deve esser mostrato il footer della table
    let tfoot = document.getElementById('tfoot');
    tfoot.style.display='table-footer-group';
    tbody = document.getElementById('carrello_tbl').getElementsByTagName('tbody')[0];
    thead = document.getElementById('carrello_tbl').getElementsByTagName('thead')[0];
    if (tbody) {
        const rowChoose = document.getElementById('row-choose');
        var verifica = document.getElementById('volo-' + id);
        const riga = createRow(id, destinazione, costo, partenza);
        if (rowChoose) {
            //Se l'elemento 'rowChoose' è presente significa che il carrello non ha elementi, per 
            //cui si elimina la riga che invita a scegliere nuove destinazioni aggiungendo il nuovo elemnto
            rowChoose.remove();
            tbody.appendChild(riga);
            tbody = document.getElementById('carrello_tbl').getElementsByTagName('tfoot')['0'].style.display = '';
            riga.style.display = '';
            //Funzione definita nel file cart.php
        } else {
            //se verifica è true cioe l'elemnto gia è contenuto nel carrello allora non fa nulla;
            if (!verifica) {
                tbody.appendChild(riga) // Inserisci la nuova riga all'inizio del tbody
                tbody = document.getElementById('carrello_tbl').getElementsByTagName('tfoot')['0'].style.display = '';
                riga.style.display = '';
                
            }
        }
       
    } 
    updateCartTotal(); 
}
function updateCartTotal() {
    const righeCart = document.querySelectorAll('tr[data-prezzo]');
    let total = 0;
    righeCart.forEach(function(row) {
        total += parseFloat(row.getAttribute('data-prezzo'));
    });
    document.getElementById('total-cart').textContent = 'Total Price:  ' + total + ' $';
}

/**
* Crea una nuova riga per il carrello con le stesse caratteristiche di quelle 
* presenti nel carrello
*/

function createRow(id, nome, prezzo, partenza) {
    const newRow = document.createElement('tr');
    newRow.id = 'volo-' + id;
    newRow.setAttribute('data-prezzo', prezzo);
    newRow.style.display = 'none';

    const nameCell = document.createElement('td');
    nameCell.className = 'nome';
    nameCell.style.textAlign = 'left';
    nameCell.style.width = 'fit-content';
    nameCell.textContent = nome;
    nameCell.setAttribute('colspan', '2');
    newRow.style.display = 'none';
    newRow.appendChild(nameCell);

    const partenzaCell = document.createElement('td');
    partenzaCell.className = 'partenza';
    partenzaCell.style.textAlign = 'left';
    partenzaCell.style.width = 'fit-content';
    partenzaCell.textContent = partenza;
    partenzaCell.setAttribute('colspan', '2');
    newRow.appendChild(partenzaCell);

    const priceCell = document.createElement('td');
    priceCell.className = 'prezzo';
    priceCell.style.textAlign = 'right';
    priceCell.style.width = 'fit-content';
    priceCell.textContent = prezzo + ' $';
    newRow.appendChild(priceCell);

    const removeCell = document.createElement('td');
    const removebtn = document.createElement('button');
    removebtn.className = 'removeButton';
    removebtn.setAttribute('onclick', `ajax_remove_cart(${id})`);
    removebtn.innerHTML = '&#x1F5D1'; // Icona del cestino
    removeCell.appendChild(removebtn);
    newRow.appendChild(removeCell);

    return newRow;
}
