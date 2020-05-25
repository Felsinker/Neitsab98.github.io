<?php
namespace ProjetWeb;

abstract class Vehicule{
  private $_numero;
  private $_vitesseDeplacement;
  private $_type;
  private $_occupe;

  public function getNumero(){
    return $this->_numero;
  }

  public function setNumero($numero){
    if (!is_int($numero)) {
      trigger_error('Le numero doit être un nombre entier', E_USER_WARNING);
    return;
    }
    $this->_numero = $numero;
  }

  public function getType(){
    return $this->_type;
  }

  public function setType(TypesVehicule $type){
    $this->_type = $type;
  }

  public function getOccupe(){
    return $this->_occupe;
  }

  public function setOccupe($bool){
    if (!is_bool($bool)) {
      trigger_error('boolean requis', E_USER_WARNING);
      return;
    }
    $this->_occupe = $bool;
  }

}

?>
