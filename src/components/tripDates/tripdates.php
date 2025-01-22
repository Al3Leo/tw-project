<!-- Questo file contiene l'implementazione del popup che consente di visualizzare
    le date presenti nel db relative ad un determinato viaggio.
-->

<div id="tripDates-ct" class="d-none position-fixed">
    <div class="dates">
        <i class="fa-solid fa-x" id="tripDates__closeBtn" style="color: #feffff;"></i>
        <?php 
            require_once __DIR__ . '/../../backend/getTripInfo.php';
            print_r($infoArray);
        ?>
    </div>
</div>

<style>
    #tripDates-ct {
        width: 100%; 
        height: 100%; 
        background: rgba(0, 0, 0, 0.5); 
        backdrop-filter: blur(10px); /* Sfoco lo sfondo sottostante  */
        z-index: 9999; 
    }
    
    #tripDates-ct .dates {
        width: 80vw; 
        height: 80vh;
        background-color: green !important; 
        border-radius: 15px;
        position: relative; 
        overflow: hidden; 
        top: 50%;  
        left: 50%;  
        transform: translate(-50%, -50%);   /* centro l'elemento. Non uso flexbox per semplicitá con il js */
    }
    
    #tripDates__closeBtn{
        display: inline-block;
        position: absolute;
        padding: 15px;
        right: 0;
        top: 0;

        /* & rappresenta il genitore */
        &:hover{
            transform: scale(1.5);
            transition: transform 1s;
            cursor: pointer;
        }
    }
    .bg-blur {background: rgba(0, 0, 0, 0.8);}
</style>

<script type="text/javascript">

    function toggleDialog(){
        const dialog = document.getElementById("tripDates-ct");
        const closeBtn = document.getElementById("tripDates__closeBtn");
        dialog.classList.remove("d-none");
        dialog.classList.add("bg-blur");

        closeBtn.addEventListener('click', function(){
            dialog.classList.add("d-none");
            dialog.classList.remove("bg-blur");
        });
    }
</script>