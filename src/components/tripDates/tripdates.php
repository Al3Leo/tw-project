<!-- Questo file contiene l'implementazione del popup che consente di visualizzare
    le date presenti nel db relative ad un determinato viaggio.
-->

<div id="tripDates-ct" class="d-none position-fixed">
    <div class="dates">
        <i class="fa-solid fa-x" id="tripDates__closeBtn" style="color: #feffff;"></i>
        <table class="tripDates-info d-flex flex-column align-items-center justify-content-center">
            <thead>
                <tr>
                    <th class="text-uppercase" id="tripDates-title"><?php echo "All " . $nomeEvento . " avaible dates" ?></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>Departure</th>
                    <th>Return</th>
                    <th>Spaceport</th>
                    <th>Cart</th>
                </tr>
                <?php
                if (isset($infoArray)) {
                    foreach ($infoArray as $events) {    //entro nel sottoarray contenente tutti gli eventi
                        foreach ($events as $event) {     //entro nel sottoarray contenente le informazioni sull'evento selezionato
                            $departureDate = date_create($event['datapartenza'])->format('d F Y');  //-> serve ad accedere ad un campo dell'oggetto o chiamarne un metodo
                            $returnDate = date_create($event['dataritorno'])->format('d F Y');
                            $eventId = $event['idevento'];
                            $location = $event['launchlocation'];
                            $price = $event['prezzoevento'];

                            echo " 
                            <tr> 
                                <td>" . $departureDate . "</td>
                                <td>" . $returnDate . "</td>
                                <td>" . $location . "</td>
                                <td id=" . $eventId . "-td>";

                            $added = false;
                            if (isset($_COOKIE['cart'])) { //agli elementi presenti nel carrello aggiungo il tag span con testo ADDED altrimenti il 
                                //button per add
                                $cart = json_decode($_COOKIE['cart'], true);
                                foreach ($cart as $sottoarray['id']) {
                                    if (in_array($eventId, $sottoarray['id'])) {
                                        echo "<span id='" . $eventId . "-span' style='font-weight: 800; color: #f7e951'>ADDED</span>";
                                        echo "<button style='display:none;' id='" . $eventId . "-btn' onclick='ajax_add_cart(" . $eventId . ", \"" . $nomeEvento . "\", " . $price . ",  \"" . $departureDate . "\")'>Add to cart</button>";
                                        $added = true;
                                        break;  //esco dal ciclo se trovo l'evento
                                    }
                                }
                            }
                            if (!$added) {
                                echo "<button id='" . $eventId . "-btn' onclick='ajax_add_cart(" . $eventId . ", \"" . $nomeEvento . "\", " . $price . ",  \"" . $departureDate . "\")'>Add to cart</button>";
                            }

                            echo "</td></tr>";
                        }
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<script type="text/javascript">
    function toggleDialog() {
        const dialog = document.getElementById("tripDates-ct");
        const closeBtn = document.getElementById("tripDates__closeBtn");

        // mostro il popup
        dialog.classList.remove("d-none");
        dialog.classList.add("bg-blur");
        document.body.style.overflowY = "hidden"; // disabilito lo scroll del background (body)


        closeBtn.addEventListener('click', function() {
            dialog.classList.add("d-none");
            dialog.classList.remove("bg-blur");
            document.body.style.overflowY = "visible"; // riabilito lo scroll
        });
    }
</script>
<script defer src="pages/catalogue/add_ajax.js"></script>