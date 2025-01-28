function searchBudget(range) {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "backend/searchBudget.php?range=" + encodeURIComponent(range), true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            console.log(xhr.responseText); // Aggiungi questa linea per vedere la risposta

            var resultSearch = JSON.parse(xhr.responseText); //array con i corpi celeste che devono essere mostrati
            console.log(resultSearch);
            updateSearch(resultSearch);//passo l'array alla funzione che deve gestire l'aggiornamento
        }
    };
    xhr.send();
}
function updateSearch(arraySearch) { 
    var catalogueItems = document.querySelectorAll('div.catalogue__item');
    catalogueItems.forEach(function (item) {
        //per tutti i div con classe catalogue__item verifico se il loro id è uguale a uno dei elementi presenti nel arraySearch.
        //Se presente setto l'attributo display come block altrimenti none.
        var found = false; 
        arraySearch.forEach(function (evento) {
            if (item.id === evento) {
                found = true;
            }
        });
        if (found) {
            item.style.display = 'block';
        } else {
            item.style.display = 'none';
        }
    });


}

