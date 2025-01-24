// Dropdown travelInfo
const items = document.querySelectorAll(".main__left__tripKnowledge__item");
items.forEach((item) => {
  const question = item.querySelector(
    ".main__left__tripKnowledge__item__question"
  );
  const answer = item.querySelector(".main__left__tripKnowledge__item__answer");
  const arrow = item.querySelector(".main__left__tripKnowledge__arrow");

  question.addEventListener("click", () => {
    const isOpen = answer.classList.contains("open");

    // Close all open answers
    document
      .querySelectorAll(".main__left__tripKnowledge__item__answer")
      .forEach((a) => a.classList.remove("open"));
    document
      .querySelectorAll(".main__left__tripKnowledge__arrow")
      .forEach((a) => a.classList.remove("open"));

    // Toggle current item
    if (!isOpen) {
      answer.classList.add("open");
      arrow.classList.add("open");
    }
  });
});

/*
 * FUNZIONI
 */

/* 
 * Solar System OpenData API
 */
function call_lso_api(celestialBody) {
  let ssoXhr = new XMLHttpRequest(); // Creazione di un oggetto XMLHttpRequest

  // Richiama l'Endpoint
  ssoXhr.open(
    "GET",
    "https://api.le-systeme-solaire.net/rest/bodies/" + celestialBody,
    true
  ); //true = asincrono
  ssoXhr.responseType = "json"; //formatto in json

  // Invio richiesta
  ssoXhr.send();

  ssoXhr.onload = function () {
    if (ssoXhr.readyState == 4) {
      if (ssoXhr.status == 200) {
        let response = ssoXhr.response;
        createTable(response);
      } else {
        alert("API loading error! Request data not found.");
        deleteTable();
      }
    }
  };
}

function createTable(jsonData) {
  let table = document.createElement("table");
  let tbody = table.createTBody();
  let moonsCounter = 0;   // variabile per contare i satelliti associati ad un determinato pianeta

  // Lista delle unitá di misura in formato json
  const units = {
    semimajorAxis: "km",
    perihelion: "km",
    aphelion: "km",
    eccentricity: "",
    inclination: "°",
    massValue: "kg",
    massExponent: "kg",
    volValue: "km³",
    volExponent: "",
    density: "g/cm³",
    gravity: "m/s²",
    escape: "m/s",
    meanRadius: "km",
    equaRadius: "km",
    polarRadius: "km",
    flattening: "",
    sideralOrbit: "days",
    sideralRotation: "hours",
    axialTilt: "",
    avgTemp: "K",
    mainAnomaly: "°",
    argPeriapsis: "°",
    longAscNode: "°",
  };

  Object.keys(jsonData).forEach((key) => {
    // salto le chiavi non desiderate o valori nulli
    if (
      key === "id" ||
      key === "isPlanet" ||
      key === "name" ||
      key === "englishName" ||
      jsonData[key] === null ||
      jsonData[key] === ""
    ) return;

    // Se il valore è un oggetto, itero sui suoi attributi (gestione subitems)
    if (typeof jsonData[key] === "object") {
      Object.keys(jsonData[key]).forEach((subKey) => {
        if (key === "moons"){
          moonsCounter++; // conto solamente il numero dei satelliti, senza mostrarli
          return;
        }
        let row = tbody.insertRow(); // creo una riga per ogni coppia chiave-valore annidata

        // prima cella come <th> per la chiave
        let cellKey = document.createElement("th");
        cellKey.textContent = subKey;
        row.appendChild(cellKey);

        // seconda cella per il valore annidato
        let cellValue = row.insertCell();
        cellValue.textContent = jsonData[key][subKey]; //accede prima al valore associato a key (oggetto), successivamente a quello di subKey

        // terza cella per l'unità di misura
        let cellUnit = row.insertCell();
        cellUnit.textContent = units[subKey] || ""; // Inserisce l'unità se esiste, altrimenti stringa vuota
      });
    } else {
      // Altrimenti aggiungo la chiave e il valore direttamente
      let row = tbody.insertRow();
      let cellKey = document.createElement("th");
      cellKey.textContent = key;
      row.appendChild(cellKey);

      let cellValue = row.insertCell();
      cellValue.textContent = jsonData[key];

      let cellUnit = row.insertCell();
      cellUnit.textContent = units[key] || ""; // Inserisce l'unità se esiste, altrimenti stringa vuota
    }
  });

  // Se il pianeta ha almeno 1 setellite, mostro il numero
  if (moonsCounter != 0){
    let row = tbody.insertRow(); 
    let cellKey = document.createElement("th");
    cellKey.textContent = "moons";
    row.appendChild(cellKey);
    let cellValue = row.insertCell();
    cellValue.textContent = moonsCounter;
    let cellUnit = row.insertCell();
    cellUnit.textContent = "";


  }

  // aggiungo la tabella al contenitore
  const container = document.querySelector(".main__right__celestialBodyInfo");
  container.appendChild(table);
}

/*
 * Funzione per eliminare la colonna di destra qualora la chiamata all'api fallisse
*/

function deleteTable(){
  const rightClm = document.getElementsByClassName('main__right');
  const leftClm = document.getElementsByClassName("main__left");
  rightClm[0].style.display = "none";
  leftClm[0].style.width = "100%";  // imposta la sezione di sinistra a tutto schermo
}
/*
 *  Funzione per generare i suggerimenti nella parte bassa della pagina
 */

function fillSuggestions(celestialBody, eventsArray) {
  const suggItem = document.getElementById(
    "suggestions__carousel__item-sampleClone"
  ); //elemento da clonare e poi rimuovere
  const carouselContainer = document.getElementById("suggestions__carousel-ct"); //contenitore del carosello
  Object.keys(eventsArray).forEach((key) => {
    if (key === celestialBody) return; // non mostro nuovamente la pagina corrente
    let newItem = suggItem.cloneNode(true); //clona l'item
    newItem.removeAttribute("id");
    newItem.querySelector("strong").textContent = key; //imposta il titolo
    const newItemImg = newItem.querySelector("img");
    newItemImg.src =
      "assets/images/nasa/" + eventsArray[key] + "/" + key + ".jpg";
    newItemImg.alt = key + " " + eventsArray[key];
    newItem.querySelector("a").href =
      "pages/catalogue/catalogue-items/" +
      eventsArray[key] +
      "/" +
      key +
      ".php";
    carouselContainer.appendChild(newItem);
  });
  suggItem.remove(); //rimuovo il sample
}