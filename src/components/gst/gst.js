/*
 * Questo file si occupa della gestione dell'api gst della nasa, la quale fornisce informazioni
 * sulle tempeste solari attualmente in atto.
 */

/* NASA Geomagnetic Storm Status*/

// Creazione di un oggetto XMLHttpRequest
let ssoXhr = new XMLHttpRequest();
const apiKey = "towgEeTCRe711fLDCwdNTSJagIzJL3cJztoRf0uZ";

alert(startDate.toISOString.substring(0,10));
// Richiama l'Endpoint
ssoXhr.open(
    "GET",
    "https://api.nasa.gov/DONKI/GST?api_key=${apiKey}&startDate=${startDate}&endDate=${endDate}",
    true
); //true = asincrono

// Impostiamo la proprietà responseType per ricevere la risposta come JSON
ssoXhr.responseType = "json";

// Invio richiesta
ssoXhr.send();

//readyState e status consentono di verificare lo stato della richiesta
ssoXhr.onload = function () {
    if (ssoXhr.readyState == 4) {
        // Controllo corretto con ssoXhr.readyState
        switch (ssoXhr.status) {
            case 200:
                let response = ssoXhr.response;
                console.log(response); // Mostra la risposta in formato JSON sulla console
                gstStatus(response);
                break;
            case 404:
                alert("API loading error! Request data not found.");
                break;
            case 500:
                alert("API loading error! Server generic error.");
                break;
            default:
                alert(
                    "API loading error! Request error: (" + ssoXhr.statusText + ")"
                );
        }
    }
};

function gstStatus(jsonData){
    let table = document.createElement('table');
    let tbody = table.createTBody();

    let lastStorm = jsonData[0];

    if(jsonData.lenght() === 0){
        console.log("No Geo storm found!");
        const par = document.createElement('p');
        par.innerText = "No Geo storm found!"
        document.getElementsById('main__right__gst').appendChild(par);
    }
}
