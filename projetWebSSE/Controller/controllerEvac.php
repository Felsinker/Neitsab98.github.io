<?php
namespace ProjetWeb;

include_once('../Model/VehiculeTransport.php');
include_once('../Model/TypesVehicule.php');

  class ControllerEvac
  {
    public function __construct()
    {

    }

	//Chargement des différents véhicules stockés dans la base de données
    public static function loadVehicules() {
		//session_start();
        $listVehicules = self::getDatas();
		$_SESSION['listVehicules'] = $listVehicules;
    }

	//Ici, créé 5 véhicules
    function getDatas()
    {
	  $vehicule1 = new VehiculeTransport(1, 50, "TypesVehicule.CAMION", 4);
	  $vehicule2 = new VehiculeTransport(2, 50, "TypesVehicule.CAMION", 4);
	  $vehicule3= new VehiculeTransport(3, 50, "TypesVehicule.CAMION", 4);
	  $vehicule4 = new VehiculeTransport(4, 50, "TypesVehicule.CAMION", 5);
	  $helico = new VehiculeTransport(5, 100, "TypesVehicule.HELI", 2);
	  $array = array($vehicule1, $vehicule2, $vehicule3, $vehicule4, $helico);

	  return $array;
    }

	//Ajout d'une victime à un véhicule
	function addVictimToVehicule($nbr, $vehicule)
	{
		$vehicule->incremmentCurrentCapacity($nbr);
	}


  }

  ControllerEvac::loadVehicules();

?>
