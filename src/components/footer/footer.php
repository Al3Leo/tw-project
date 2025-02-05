<footer>
  <div id="footer__container">
  <div class="footer__div_container d-flex justify-content-around align-items-center flex-wrap"> <!--classi per gestire la disposizione degli elementi-->
    <div class="footer__contenuto_container">
    <a href="<?php echo $_SERVER['PHP_SELF'];?>"> <!--svg per il logo-->
        <svg width="158" height="62" viewBox="0 0 158 62" fill="none" xmlns="http://www.w3.org/2000/svg"> <!--usato per il logo footer-->
            <rect width="158" height="62" /> <!--sfondo per il logo-->
            <rect width="165" height="102" transform="translate(-7 -13)" />
            <defs> <!--per elementi grafici-->
                <filter id="shadow" x="-50%" y="-50%" width="200%" height="200%">
                    <feDropShadow dx="3" dy="2" stdDeviation="0" flood-color="rgba(212, 187, 221, 0.5)" /> <!--creo effetti speciali sugli elementi del footer-->
                </filter>
            </defs> 
            <text fill="#F9F4F4" xml:space="preserve" style="white-space: pre; font-family: 'Montserrat', serif; 
            font-weight: 650; font-style: normal;" family="Montserrat" font-size="42" filter="url(#shadow)" letter-spacing="0em">
                <tspan x="7" y="54.3636">SPACE&#10;</tspan> <!--modifico parti del testo o le imposto su più righe-->
            </text>
            <text fill="#F7E951" xml:space="preserve" style="white-space: pre; font-family: 'Montserrat', serif; 
            font-weight: 602; font-style: normal;" font-size="20" font-weight="350" letter-spacing="0.3em">
                <tspan x="27" y="19.17">OUTER</tspan>
            </text>
        </svg>
    </a>
    </div>
    <div class="footer__contenuto_container">
      <ul>
        <li><a href="pages/homepage/homepage.php">Home</a></li>
        <li><a href="pages/aboutus/aboutus.php">About Us</a></li>
        <li><a href="pages/support/Supporto.php">Support</a></li>
        <li><a href="pages/spacehistory/NewSpace.php">Spatial History</a></li>
        <li><a href="pages/catalogue/catalogue.php">Catalogue</a></li>
      </ul>
    </div>
    <div class="footer__contenuto_container social d-inline-block">
      <p>Social</p>
      <ul>
        <li>
          <a href="https://www.facebook.com/login/?locale=it_IT" target="_blank">
            <i class="fa-brands fa-facebook-f fa-beat-fade fa-lg" style="color: #feffff;"></i>
          </a>
        </li>
        <li>
          <a href="https://x.com/i/flow/login?input_flow_data=%7B%22requested_variant%22%3A%22eyJsYW5nIjoiaXQifQ%3D%3D%22%7D&mx=2" target="_blank">
            <i class="fa-brands fa-twitter fa-beat-fade" style="color: #feffff;"></i>
          </a>
        </li>
        <li>
          <a href="https://www.instagram.com/accounts/login/" target="_blank"> 
            <i class="fa-brands fa-instagram fa-beat-fade fa-lg" style="color: #feffff;"></i>
          </a>
        </li>
      </ul>
    </div>
  </div>
  <div class="footer__div_container2 d-flex justify-content-center align-items-center">
    <p class="text-center">
      <small>
        Progetto di Tecnologie Web A.A.24/25 realizzato da: Alessio Leo, Emanuele
        Tocci, Claudia Montefusco, Rossella Pale
      </small>
    </p>
  </div>
</div>
</footer>
