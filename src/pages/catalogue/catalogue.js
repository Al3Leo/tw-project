/*
 * Gestione del banner di ricerca e dello switch tra le varie sezioni
 */
const choosedSearch = document.getElementById("hero__search__choosed__search");
const choosedBudget = document.getElementById("hero__search__choosed__budget");
const choosedType = document.getElementById("hero__search__choosed__type");
const choosed = [choosedSearch, choosedBudget, choosedType];

const whereLink = document.getElementById("hero__search__choose__whereLink");
const budgetLink = document.getElementById("hero__search__choose__budgetLink");
const typeLink = document.getElementById("hero__search__choose__typeLink");
const showAllLink = document.getElementById("hero__search__choose__showAll");

const links = [whereLink, budgetLink, typeLink];

let catalogueItems = document.querySelectorAll("div.catalogue__item");

/* Funzione per la gestione del banner di ricerca */
function showSection(index) {
  choosed.forEach((element, i) => {
    if (i === index) {
      element.style.display = "flex";
    } else {
      element.style.display = "none";
    }
  });

  links.forEach((link, i) => {
    if (i === index) {
      link.style.fontWeight = "bold";
    } else {
      link.style.fontWeight = "400";
    }
  });
}

links.forEach((link, index) => {
  link.addEventListener("click", (event) => {
    event.preventDefault();
    showSection(index);
  });
});

/*
 * Implementazione della ricerca tramite budget
 */

function searchBudget(range) {
  var xhr = new XMLHttpRequest();
  xhr.open(
    "GET",
    "backend/searchBudget.php?range=" + encodeURIComponent(range),
    true
  );
  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      console.log(xhr.responseText); // Aggiungi questa linea per vedere la risposta

      var resultSearch = JSON.parse(xhr.responseText); //array con i corpi celeste che devono essere mostrati
      console.log(resultSearch);
      updateSearch(resultSearch); //passo l'array alla funzione che deve gestire l'aggiornamento
    }
  };
  xhr.send();
}

/*
 * Implementazione della ricerca per tipologia
 */

function searchType(type) {
  let searchTypeXHR = new XMLHttpRequest();
  searchTypeXHR.open("GET", "backend/searchType.php?type=" + type , true);
  searchTypeXHR.responseType = "json"; //imposto il tipo di ritorno

  searchTypeXHR.onreadystatechange = function () {
    if (searchTypeXHR.readyState == 4 && searchTypeXHR.status == 200) {
      let typeResults = searchTypeXHR.response;
      console.log(typeResults);
      updateSearch(typeResults); 
    }
  };
  searchTypeXHR.send();
}

/*
 * Implementazione della ricerca tramite nome
 */

const searchByName = document.getElementById("searchByName");

searchByName.addEventListener("keydown", (event) => {
  //utilizzo un listener sull'evento di pressione del tasto 'Enter'
  if (event.key === "Enter") {
    let destination = searchByName.value.trim(); //rimuovo eventuali spazi
    console.log(destination);
    let searchNameXHR = new XMLHttpRequest();
    searchNameXHR.open(
      "GET",
      "backend/searchName.php?destination=" + destination,
      true
    );
    searchNameXHR.responseType = "json"; //imposto il tipo di ritorno

    searchNameXHR.onreadystatechange = () => {
      if (searchNameXHR.readyState == 4 && searchNameXHR.status == 200) {
        let nameResults = searchNameXHR.response;
        console.log(nameResults);
        updateSearch(nameResults);
      }
    };
    searchNameXHR.send();
  }
});


/* 
 *  Funzione per l'aggiornamento della vista del catalogo
 */
function updateSearch(arraySearch) {
  //if (arraySearch && arraySearch.length > 0) DA DECIDEREEEEEEEEEEEEEEE
  if (arraySearch!=null) {
    //arraySearch è un array costituito da sottoarray che contengono nomeevento(contenuto una sola volta) cercato e la sua etichetta 
    var catalogueItems = document.querySelectorAll("div.catalogue__item");
    var planets = 0;
    var moons = 0;
    var nebulae = 0;
    var galaxies = 0;

    //per ciascun div con classe catalogue__item verifico se ha id uguale al nome evento.
    //In particolare se ha quell'id è stato trovato l'elemento a cui impostare display a flex altrimenti a none
    catalogueItems.forEach(function (item) {
      var found = false;
      arraySearch.forEach(function (evento) {
        if (item.id == evento.nomeevento) {
          found = true;
        }
      });
      item.style.display = found ? "flex" : "none";
    });
    arraySearch.forEach(function (evento) {
      if (evento.etichetta == 'planets') {
        planets++;
      } else if (evento.etichetta == 'moons') {
        moons++;
      } else if (evento.etichetta == 'nebulae') {
        nebulae++;
      } else if (evento.etichetta === 'galaxies') {
        galaxies++;
      }
    });
    //gestione dei div che contengono testo e le etichette come titolo
    //se nell'arraySearch non ci sono determinate etichette, per i relativi div contenente il testo va messa la proprieta display a none
    var div_planets = document.getElementById('planets_text');
    if (div_planets) {
      div_planets.style.display = (planets == 0) ? 'none' : 'block';
    }
    var div_moons = document.getElementById('moons_text');
    if (div_moons) {
      div_moons.style.display = (moons == 0) ? 'none' : 'block';
    }
    var div_galaxies = document.getElementById('galaxies_text');
    if (div_galaxies) {
      div_galaxies.style.display = (galaxies == 0) ? 'none' : 'block';
    }
    var div_nebulae = document.getElementById('nebulae_text');
    if (div_nebulae) {
      div_nebulae.style.display = (nebulae == 0) ? 'none' : 'block';
    }
  }
}
/*
 * Funzione per ripristianare la vista del catalogo e mostrare nuovamente tutti gli items. 
 */
function restoreCatalogueView() {
  catalogueItems.forEach(item => {
    item.style.display = "flex";
  });

  document.querySelectorAll(".main__catalogue__section-title").forEach(item => {
    item.style.display = "block";
  });
}