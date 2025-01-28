/*
 * Gestione del banner di ricerca e dello switch tra le varie sezioni
 */
const choosedSearch = document.getElementById("hero__search__choosed__search");
const choosedBudget = document.getElementById("hero__search__choosed__budget");
const choosed = [choosedSearch, choosedBudget]; 

const whereLink = document.getElementById("hero__search__choose__whereLink");
const budgetLink = document.getElementById("hero__search__choose__budgetLink");
const showAllLink = document.getElementById("hero__search__choose__showAll");

const links = [whereLink, budgetLink];

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
    catalogueItems.forEach(function (item) {
      //per tutti i div con classe catalogue__item verifico se il loro id è uguale a uno dei elementi presenti nel arraySearch.
      //Se presente setto l'attributo display come flex altrimenti none.
      var found = false;
      arraySearch.forEach(function (evento) {
        if (item.id === evento) {
          found = true;
        }
      });
      if (found) {
        item.style.display = "flex";
      } else {
        item.style.display = "none";
      }
    });
}
/*
 * Funzione per ripristianare la vista del catalogo e mostrare nuovamente tutti gli items. 
 */
function restoreCatalogueView(){
    catalogueItems.forEach( item => {
      item.style.display = "flex";
  });
}