<?php
namespace ProjetWeb;

use ProjetWeb\Enum;
require_once "Enum.php";

class TypesVehicule extends Enum
{
    const HELI = 'Helicoptere';

    const AMBU = 'Ambulance';

    const VOITURE = 'Voiture';

    const CAMION = 'Camion';

    const VEHISEC = 'VehiculeSecours';
}
?>
