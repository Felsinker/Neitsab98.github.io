<?php
namespace projetWebSSE;

abstract class VehiculeUrgence extends Unite{
  private TypesVehicule $tp;

  public function getTypeVehicule(){
    return $this->tp;
  }

  public function setTypeVehicule(TypesVehicule $type){
    $this->tp=$type;
  }
}
?>
