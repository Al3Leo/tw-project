<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/src/html/utils/headMetadata.html';
    ?>
    <title>Venus</title>

    <base href="../../../../../" />
    <link rel="stylesheet" href="css/Global.css">
    <link rel="stylesheet" href="css/catalogue-items.css">

</head>

<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/src/php/header.php';
?>

<body>
    <div class="hero">
        <iframe src="https://solarsystem.nasa.gov/gltf_embed/2342/" frameborder="0" allow="fullscreen" loading="lazy"></iframe>
        <div class="hero__text">
            <h1 class="text-center">Venus</h1>
            <h2 class="text-center">Description</h2>
            <p>
                <b>Venus</b> is the second planet from the Sun, and Earth's closest planetary neighbor. Venus is the <b>third brightest object in the sky</b> after the Sun and Moon. Venus spins slowly in the opposite direction from most planets.
                Venus is <b>similar</b> in structure and size to <b>Earth</b>, and is sometimes called <b>Earth's evil twin</b>. Its thick atmosphere traps heat in a runaway greenhouse effect, making it the <b>hottest planet</b> in our solar system with surface temperatures hot enough to melt lead. Below the dense, persistent clouds, the surface has volcanoes and deformed mountains.
            </p>
        </div>
    </div>
    <main id="main" class="d-flex flex-row">
        <div id="main__left">
            <h3 class="text-center">Travel Info</h3>
        </div>
        <div id="main__right" class="celestialBodyInfo">
            <h3 class="text-center">Celestial Body Info</h3>
            <!-- La tabella é generata da JS-->
        </div>
    </main>
    <?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/src/html/footer.html';
    ?>
</body>

</html>

<script>
    // Creazione di un oggetto XMLHttpRequest
    let xhr = new XMLHttpRequest();

    // Richiama l'Endpoint
    xhr.open("GET", "https://api.le-systeme-solaire.net/rest/bodies/venus", true); //true = asincrono

    // Impostiamo la proprietà responseType per ricevere la risposta come JSON
    xhr.responseType = 'json';

    // Invio richiesta
    xhr.send();

    //readyState e status consentono di verificare lo stato della richiesta
    xhr.onload = function() {
        if (xhr.readyState == 4) { // Controllo corretto con xhr.readyState
            switch (xhr.status) {
                case 200:
                    let response = xhr.response;
                    console.log(xhr.response); // Mostra la risposta in formato JSON
                    createTable(response);
                    break;
                case 404:
                    alert("La pagina indicata non esiste!");
                    break;
                case 500:
                    alert("Si è verificato un errore sul server!");
                    break;
                default:
                    alert("Non è possibile elaborare la richiesta (" + xhr.statusText + ")");
            }
        }
    };


    function createTable(jsonData) {
        // Crea una tabella HTML
        let table = document.createElement('table');

        // Aggiungi i dati alla tabella
        let tbody = table.createTBody();

        // Restituisce un oggetto conteneneti tutte le keys del json ed itera su di esse tramite for each
        Object.keys(jsonData).forEach(key => {

            // Se nel json sono presenti oggetti con value nullo, li salta
            if (jsonData[key] === null || jsonData[key] === '') {
                return; // Salta questa iterazione
            }
            let row = tbody.insertRow(); // Crea una riga per ogni coppia chiave-valore

            // Prima cella come <th>
            let cellKey = document.createElement('th'); // Crea un elemento <th>
            // Converte la prima lettera della chiave in maiuscolo
            cellKey.textContent = key.charAt(0).toUpperCase() + key.slice(1);
            row.appendChild(cellKey); // Aggiungi il <th> alla riga

            // Seconda cella come <td>
            let cellValue = row.insertCell(); // Crea un <td> per il valore
            cellValue.textContent = jsonData[key]; // Prende il valore associato alla chiave corrente
        });

        // Seleziona il div con classe "celestialBodyInfo" e aggiungi la tabella lì
        const container = document.querySelector('.celestialBodyInfo');
        container.appendChild(table);
    }
</script>