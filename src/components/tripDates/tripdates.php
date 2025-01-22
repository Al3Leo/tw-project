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
                        echo "<li> <div class=\"dates-item d-flex flex-row justify-content-between align-items-center\">" 
                        . $departureDate . "  -  " . $returnDate 
                        . "<a class=\"dates-link\" href=\"backend/addToCart.php?" . $eventId ."\"> Add to Cart</a>"
                        . "</div> </li> <hr>";
                    }
                    
                }
            }
        ?>
        </ul>
    </div>
</div>

<style>
    #tripDates-ct {
        width: 100%; 
        height: 100%; 
        background-color: rgb(71, 26, 142, 0.7);
        backdrop-filter: blur(10px); /* Sfoco lo sfondo sottostante  */
        z-index: 1; 
    }
    
    #tripDates-ct .dates {
        width: 60vw; 
        height: auto;
        border-radius: 15px;
        padding: 50px;
        position: relative; 
        overflow-x: hidden; 
        overflow-y: visible;    /* abilito lo scroll verticale*/
        top: 50%;  
        left: 50%;  
        transform: translate(-50%, -50%);   /* centro l'elemento. Non uso flexbox per semplicitá con il js */
        background-color: black !important;
        border: 5px solid var(--accent);
    }
    
    #tripDates__closeBtn{
        display: inline-block;
        position: absolute;
        padding: 30px;
        right: 0;
        top: 0;

        /* & rappresenta il genitore */
        &:hover{
            transform: scale(1.5);
            transition: transform 1s;
            cursor: pointer;
        }
    }
    #tripDates-ct .dates li{
        font-size: 2rem;
        padding: 30px;
    }
    .dates-link{
        display: block;
        padding: 10px;
        border-style: none;
        border-radius: 10px;
        background-color: var(--accent);
        cursor: pointer;
        text-align: center;
        text-decoration: none;
        transition: color 100ms, transform 0.3s ease-out;
        font-weight: 600;
        color: white !important;
        font-size: 1.3rem;
    } 
    .dates-link:hover{
        background-color: var(--secondaryColor);
        transform: scale(1.1);
    }

</style>

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