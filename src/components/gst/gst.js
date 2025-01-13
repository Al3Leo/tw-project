/*
 * Questo file si occupa della gestione dell'api gst della nasa, la quale fornisce informazioni
 * sulle tempeste solari attualmente in atto.
 */

/* NASA Geomagnetic Storm Status*/

// Creazione di un oggetto XMLHttpRequest
let gstXhr = new XMLHttpRequest();

// Richiama l'Endpoint
gstXhr.open(
    "GET",
    "https://api.nasa.gov/DONKI/GST?api_key=towgEeTCRe711fLDCwdNTSJagIzJL3cJztoRf0uZ&=",
    true
); //true = asincrono

// Impostiamo la proprietà responseType per ricevere la risposta come JSON
gstXhr.responseType = "json";

// Invio richiesta
gstXhr.send();

//readyState e status consentono di verificare lo stato della richiesta
gstXhr.onload = function () {
    if (gstXhr.readyState == 4) {
        // Controllo corretto con gstXhr.readyState
        switch (gstXhr.status) {
            case 200:
                let response = JSON.parse(gstXhr.response);
                gstStatus(response);
                break;
            case 404:
                alert("GST API loading error! Request data not found.");
                break;
            case 500:
                alert("GST API loading error! Server generic error.");
                break;
            default:
                alert(
                    "GST API loading error! Request error: (" + gstXhr.statusText + ")"
                );
        }
    }
};

function gstStatus(jsonData){
    alert('prova');

    let lastStormDate = jsonData.allKpIndex[0].observedTime;
    let lastStormIndex = jsonData.allKpIndex[0].kpIndex;

    alert(lastStormDate);

    if(jsonData.lenght() === 0){
        console.log("No Geo storm found!");
        const par = document.createElement('p');
        par.innerText = "No Geo storm found!"
        document.getElementsById('main__right__gst').appendChild(par);
    }

}