<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        require_once '../../../../components/utils/headMetadata.html';
    ?>
    <title>Venus</title>
    <link rel="stylesheet" href="../catalogue-items.css">
    <base href="../../../../" />
</head>

<?php
    require_once "../../../../components/header/header.php"
?>

<body>
    <div class="hero">
        <iframe src="https://solarsystem.nasa.gov/gltf_embed/2342/" frameborder="0" allow="fullscreen" loading="lazy"></iframe>
        <div class="hero__text">
            <h1 class="text-center">Venus</h1>
            <p>
                <b>Venus</b> is the second planet from the Sun, and Earth's closest planetary neighbor. Venus is the <b>third brightest object in the sky</b> after the Sun and Moon. Venus spins slowly in the opposite direction from most planets.
                <br>
                Venus is <b>similar</b> in structure and size to <b>Earth</b>, and is sometimes called <b>Earth's evil twin</b>. Its thick atmosphere traps heat in a runaway greenhouse effect, making it the <b>hottest planet</b> in our solar system with surface temperatures hot enough to melt lead. Below the dense, persistent clouds, the surface has volcanoes and deformed mountains.
            </p>
        </div>
    </div>
    <main id="main" class="d-flex flex-row">
        <div class="main__left">
            <h2 class="text-center">Travel Info</h3>
                <p>Welcome to Venus, Earth's twin planet, renowned for its beauty and mystery! A journey to this fascinating world offers an extraordinary experience filled with surreal landscapes and extreme conditions. With proper preparation and guidance, Venus will unveil its secrets.</p>
                <div class="main__left__section1 d-flex flex-row">
                    <div class="main__left__section1__date d-flex flex-column align-items-center">
                        <span class="price">3000 &#8364</span>
                        <div class="main__left__section1__date__days d-flex flex-row align-items-center justify-content-between">
                            <i class="fa-solid fa-calendar-days fa-beat fa-xl" style="color: #ffffff;"></i>
                            <span class="days"> 10 Days</span>
                        </div>
                    </div>
                    <div class="main__left__section1__whatSee">
                        <h3 class="text-center">What to See</h3>
                        <p>Maxwell Montes</p>
                        <p>Ishtar Terra Plateau</p>
                        <p>Lavinia Planitia Plains</p>
                        <p>Baltis Vallis Canyon</p>
                        </ol>
                    </div>
                </div>
                <div class="main__left__tripKnowledge">
                    <h4 class="text-center">Everything you need to know about this trip</h4>
                    <div class="testimonial__grid__item">
                    </div>
                </div>
        </div>
        <div class="main__right celestialBodyInfo">
            <h3 class="text-center">Celestial Body Info</h3>
            <!-- La tabella é generata da JS-->
        </div>
    </main>
    <?php
    require_once "../../../../components/footer/footer.html"
    ?>
</body>

</html>

<script>
    /* GESTIONE API */

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