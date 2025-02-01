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
      var resultSearch = JSON.parse(xhr.responseText); //array con i corpi celeste che devono essere mostrati
      updateSearch(resultSearch); //passo l'array alla funzione che deve gestire l'aggiornamento
      viewResults();
    }
  };
  xhr.send();
}
function viewResults() {
  var main_catalogue = document.getElementById("main_catalogue");
  main_catalogue.scrollIntoView({ behavior: "smooth" });
}

/*
 * Implementazione della ricerca per tipologia
 */

function searchType(type) {
  let searchTypeXHR = new XMLHttpRequest();
  searchTypeXHR.open("GET", "backend/searchType.php?type=" + type, true);
  searchTypeXHR.responseType = "json"; //imposto il tipo di ritorno

  searchTypeXHR.onreadystatechange = function () {
    if (searchTypeXHR.readyState == 4 && searchTypeXHR.status == 200) {
      let typeResults = searchTypeXHR.response;
      console.log(typeResults);
      updateSearch(typeResults);
      viewResults();
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
        viewResults();
      }
    };
    searchNameXHR.send();
  }
});


/* 
 *  Funzione per l'aggiornamento della vista del catalogo
 */
function updateSearch(arraySearch) {
  if (arraySearch != null) {
    //arraySearch è un array costituito da sottoarray che contengono nomeevento(contenuto una sola volta) cercato e la sua etichetta 
    var planets_num = 0;
    var moons_num = 0;
    var nebulae_num = 0;
    var galaxies_num = 0;

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
        planets_num++;
      } else if (evento.etichetta == 'moons') {
        moons_num++;
      } else if (evento.etichetta == 'nebulae') {
        nebulae_num++;
      } else if (evento.etichetta === 'galaxies') {
        galaxies_num++;
      }
    });
    //gestione dei div che contengono testo e le etichette come titolo
    //se nell'arraySearch non ci sono determinate etichette, per i relativi div contenente il testo va messa la proprieta display a none
    const quantita = {
      planets: planets_num,
      moons: moons_num,
      galaxies: galaxies_num,
      nebulae: nebulae_num
    };
    const celestialBodies = ['planets', 'moons', 'galaxies', 'nebulae'];
    celestialBodies.forEach(item => {
      var divItem = document.getElementById(item + '_text');
      var divCatalogueItem = document.getElementById('catalogue__' + item);

      if (divItem) {
        divItem.style.display = (quantita[item] == 0) ? 'none' : 'block';
        divCatalogueItem.style.display = (quantita[item] == 0) ? 'none' : 'grid';
      }
    });

  }
}
/*
 * Funzione per ripristianare la vista del catalogo e mostrare nuovamente tutti gli items. 
 */
function restoreCatalogueView() {

  catalogueItems.forEach(item => {
    item.style.display = "flex";
  });

  const celestialBodies = [
    "planets",
    "moons",
    "galaxies",
    "nebulae"
  ];
  celestialBodies.forEach(celestial => {
    document.getElementById('catalogue__' + celestial).style.display = "grid";
  });

  document.querySelectorAll(".main__catalogue__section-title").forEach(item => {
    item.style.display = "block";
  });
}
