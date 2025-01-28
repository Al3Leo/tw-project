/*
function searchBudget(range) {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "backend/searchBudget.php?range=" + encodeURIComponent(range), true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var response = JSON.parse(xhr.responseText);

            // Ora `response` è un array
            console.log(response);  // ["Evento1", "Evento2", "Evento3"]
            
            // Puoi iterare attraverso l'array
            response.forEach(function(evento) {
                console.log(evento);  // Stampa ogni `nomeevento` nella console
            });
        }
    };
    xhr.send();
}*/
function searchBudget(range) {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "backend/searchBudget.php?range=" + encodeURIComponent(range), true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            console.log(xhr.responseText); // Aggiungi questa linea per vedere la risposta
            
                var resultSearch = JSON.parse(xhr.responseText); //array con i corpi celeste che devono essere mostrati
                console.log(resultSearch);
                updateSearch(resultSearch);//passo l'array alla funzione che deve gestire l'aggiornamento
        }
    };
    xhr.send();
}
function updateSearch(arraySearch){
    //nascondo tutti i div di ricerca per poi mostrare solo quelli presenti nell'array
    var catalogueItems = document.querySelectorAll('div.catalogue__item');
    catalogueItems.forEach(function(item) {
        var found = false; // Flag per tenere traccia se l'elemento è trovato

        arraySearch.forEach(function(evento) {
            if (item.id === evento) {
                found = true;
            }
        });

        // Imposta display in base al flag
        if (found) {
            item.style.display = 'block';
        } else {
            item.style.display = 'none';
        }
    });
        

}

