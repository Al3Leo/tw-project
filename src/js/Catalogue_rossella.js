//IN BASE AL PULSANTE HO RICERCA DIVERSA
        document.getElementById('toggleDivButton').addEventListener('click', function() {
            document.getElementById('form-booking').style.display = 'none';
            document.getElementById('form-booking-flexdate').style.display = 'flex';
        });

        document.getElementById('dataPrecisaButton').addEventListener('click', function() {
            document.getElementById('form-booking').style.display = 'flex';
            document.getElementById('form-booking-flexdate').style.display = 'none';
        });

//SUGGERISCE LA RICERCA 
    const destinazioni= ["Mercurio", "Venere", "Terra", "Marte", "Giove", "Saturno", "Urano", "Nettuno"]; 
    function suggerisciDestinazioni() { 
        document.getElementsByClassName("suggerimentiDestinazioni")[0].style.display='block';
        const input = document.getElementById("destinazione").value; 
        const divSuggerimenti = document.getElementsByClassName("suggerimentiDestinazioni")[0]; 
        divSuggerimenti.innerHTML = ''; // Pulisce i suggerimenti precedenti 
        
        if(input==''){
            for (let i = 0; i < destinazioni.length; i++){ 
                const divAusiliare= document.createElement('div');
                divAusiliare.textContent = destinazioni[i]; 
                divAusiliare.addEventListener('click', function() { inserisciSuggerimentoDestinazione(this); });//non ho utilizzato this con la funzione
                //function perche altrimenti si sarebbe riferito all'evento 
                divSuggerimenti.appendChild(divAusiliare);
            }
        }else{
            let risultatiRicerca= destinazioni.filter(ricercaDestinazione);
            for(let i=0; i<risultatiRicerca.length;i++){
                const divAusiliare= document.createElement('div');
                divAusiliare.textContent=risultatiRicerca[i];
                divAusiliare.addEventListener('click', function() { inserisciSuggerimentoDestinazione(this); });
                divSuggerimenti.appendChild(divAusiliare);
            }
        }
    }
    const partenze=["Africa","America","Asia", "Europa", "Oceania"];
    function suggerisciPartenze() { 
        document.getElementsByClassName("suggerimentiPartenze")[0].style.display='block';
        const input = document.getElementById("partenza").value; 
        const divSuggerimenti = document.getElementsByClassName("suggerimentiPartenze")[0]; 
        divSuggerimenti.innerHTML = ''; // Pulisce i suggerimenti precedenti 
        
        if(input==''){
            for (let i = 0; i < partenze.length; i++){ 
                const divAusiliare= document.createElement('div');
                divAusiliare.textContent = partenze[i]; 
                divAusiliare.addEventListener('click', function() { inserisciSuggerimentoPartenza(this); });//non ho utilizzato this con la funzione
                //function perche altrimenti si sarebbe riferito all'evento 
                divSuggerimenti.appendChild(divAusiliare);
            }
        }else{
            let risultatiRicerca= partenze.filter(ricercaPartenza);
            for(let i=0; i<risultatiRicerca.length;i++){
                const divAusiliare= document.createElement('div');
                divAusiliare.textContent=risultatiRicerca[i];
                divAusiliare.addEventListener('click', function() { inserisciSuggerimentoPartenza(this); });
                divSuggerimenti.appendChild(divAusiliare);
            }
        }
    }
    //la funzione viene chiamata per mostrare suggerimenti in base alla stringa inserita nell'input form
    function ricercaDestinazione(pianeta){
        stringa=document.getElementById("destinazione").value.toLowerCase();
       return pianeta.toLowerCase().startsWith(stringa);

    }
    function ricercaPartenza(partenza){
        stringa=document.getElementById("partenza").value.toLowerCase();
       return partenza.toLowerCase().startsWith(stringa);

    }
    //se clicco su un suggerimento, il sistema deve inserire il valore selezionato nel input form
    function inserisciSuggerimentoDestinazione(destinazioneSelezionata){
        document.getElementById('destinazione').value=destinazioneSelezionata.textContent;
        document.getElementsByClassName("suggerimentiDestinazioni")[0].innerHTML = '';//elimino i suggerimenti
    }
    function inserisciSuggerimentoPartenza(partenzaSelezionata){
        document.getElementById('partenza').value=partenzaSelezionata.textContent;
        document.getElementsByClassName("suggerimentiPartenze")[0].innerHTML = '';//elimino i suggerimenti
    }

    //nascondi i suggermenti se clicco da qualche parte
    document.addEventListener('click', function(event) { 
        if (!event.target.matches('#destinazione') && !event.target.closest('.suggerimentiDestinazioni')) {
            document.getElementsByClassName("suggerimentiDestinazioni")[0].style.display = 'none'; 
        } if (!event.target.matches('#partenza') && !event.target.closest('.suggerimentiPartenze')) { 
            document.getElementsByClassName("suggerimentiPartenze")[0].style.display = 'none'; 
        }
    })