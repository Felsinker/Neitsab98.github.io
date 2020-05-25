<?php
  echo "<p>Vous retournerez à la page d'accueil dans <span id=\"countdown\">2</span> seconde(s).</p>
<script type=\"text/javascript\">
function countdown() {
    var compteur = document.getElementById('countdown');
    if (parseInt(compteur.innerHTML)<=0) {
        location.href = '/projetwebsse/home';
    }
    else {
        compteur.innerHTML = parseInt(compteur.innerHTML)-1;
    }
}
setInterval(function(){ countdown(); },1000);
</script>";
 ?>
