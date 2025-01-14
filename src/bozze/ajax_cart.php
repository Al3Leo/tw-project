<a href="backend/addToCart.php?id=1" style="color: #1fe100"> add</a>
<button class="addbtn_ajax" id="prov" onclick="add_ajax(1)">add ajax</button>
<button class="addbtn_ajax" id="prov" onclick="add_ajax(2)">add ajax</button>
<script>
    function add_ajax(id) {
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "backend/addToCart.php?id="+id, true);
        xhr.send();
        xhr.onload = function () {
            update();
        };
        xhr.onerror = function () {
            alert('Errore di rete! Controlla la connessione.');
        };
    }
    function update() {
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "bozze/update_cart.php", true);
        xhr.onload = function () {
            document.getElementById("carrello_tbl").innerHTML = xhr.responseText;
        };
        xhr.onerror = function () {
            alert('Errore di rete durante l\'aggiornamento del carrello.');
        };
        xhr.send();
    }
    function ajax_remove(id){
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "backend/RemoveItemFromCart.php?nome="+id, true);
        alert("backend/RemoveItemFromCart.php?nome="+id)
        xhr.onload = function () {
            update();
        };
        xhr.onerror = function () {
            alert('Errore di rete! Controlla la connessione.');
        };
        xhr.send();
    }
</script>