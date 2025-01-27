<!-- Questo file contiene l'implementazione del popup che consente di visualizzare
    le date presenti nel db relative ad un determinato viaggio.
-->

<div id="tripDates-ct" class="d-none position-fixed">
    <div class="dates">
        <i class="fa-solid fa-x" id="tripDates__closeBtn" style="color: #feffff;"></i>
        <ul>
        <?php 
            require_once __DIR__ . '/../../backend/getTripInfo.php';
            if(isset($infoArray)){
                foreach ($infoArray as $events){    //entro nel sottoarray contenente tutti gli eventi
                    foreach($events as $event){     //entro nel sottoarray contenente le informazioni sull'evento selezionato
                        $departureDate = date_create($event['datapartenza'])->format('d F Y');  //-> serve ad accedere ad un campo dell'oggetto o chiamarne un metodo
                        $returnDate = date_create($event['dataritorno'])->format('d F Y');
                        $eventId = $event['idevento'];
                        $location = $event['launchlocation'];
                        $price= $event['prezzoevento'];
                       
                        /* Da rifare con tabella */
                        echo "<li> <div class=\"dates-item d-flex flex-row justify-content-between align-items-center\">" 
                        . $departureDate . "  -  " . $returnDate 
                        . " <small>" . $location . "</small>"
                        ."<button onclick='ajax_add_cart(" . $eventId . ", \"" . $nomeEvento . "\", " . $price . ")'>Prova Add</button>"
                        . "</div> </li> <hr>";
                    }
                    
                }
            }
        ?>
        </ul>
    </div>
</div>

<script type="text/javascript">

    function toggleDialog(){
        const dialog = document.getElementById("tripDates-ct");
        const closeBtn = document.getElementById("tripDates__closeBtn");

        // mostro il popup
        dialog.classList.remove("d-none");
        dialog.classList.add("bg-blur");
        document.body.style.overflowY = "hidden";   // disabilito lo scroll del background (body)


        closeBtn.addEventListener('click', function(){
            dialog.classList.add("d-none");
            dialog.classList.remove("bg-blur");
            document.body.style.overflowY = "visible";  // riabilito lo scroll
        });
    }
</script>
<script src="pages/catalogue/add_ajax.js"></script>