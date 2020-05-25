<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="interfaceEvac.css">
  </head>
  <body>
    <div id= "container">
	<p id="titre">Evacuation</p>
	   <div id= "container_camions">
	   <p id="nom_boite">Camions</p>
	   <?php
		session_start();
		 include("../Controller/controllerEvac.php");
		 		/*echo $_SESSION['listVehicules'][0];*/

		 $i = 0;
		/*Affichage des camions renvoyés par le controller dans la variable de session*/
		 foreach($_SESSION['listVehicules'] as $v)
		 {

			if($v->getType() == "TypesVehicule.CAMION"){
				echo '<div id='.$i.' class="rectangle_camion" href="interfaceEvac.js" onclick="popup('. $v->getCurrentCapacity() .','. $i .')"></div>';
				$i += 1;
			}
		 }
	   ?>
	   </div>

	   <div id= "container_helicos">
	   <p id="nom_boite">Helicopteres</p>
	   <?php
		/*Affichage des hélicoptères renvoyés par le controller dans la variable de session*/
		 foreach($_SESSION['listVehicules'] as $v)
		 {
			if($v->getType() == "TypesVehicule.HELI"){
				echo '<div id="cercle_helico"></div>';
			}
		 }
	   ?>
	   </div>

	   <!-- Formulaire -->
	   <div id='formDest' class='formDest' aria_hidden="true">
		   <!-- Contenu du formulaire -->
		   <div class="modal-content">
			   <p id="nom_boite">Ou envoyer le camion ?</p>
			   <form>
				  <input type="radio" name="destination" id="CHU" value="CHU">
				  <label for="CHU">CHU ?</label>
				  <input type="radio" name="destination" id="clinique" value="clinique">
				  <label for="clinique">Clinique ?</label>
				  <input type="radio" name="destination" id="autre" value="autre">
				  <label for="autre">Autre ?</label>
				  <input type="submit" value="Valider" onclick="valideDesti">
				  <input type="submit" value="Annuler">
			   </form>
		   </div>
       </div>
	   <script src="interfaceEvac.js"></script>

    </div>
  </body>
</html>

<!--<div class="modal-content">
			  <span class="close">&times;</span>
			  <p>Some text in the Modal..</p>
		   </div>-->
