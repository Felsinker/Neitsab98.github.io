<?php
namespace ProjetWeb;

abstract class Unite{
  private $_numero;
  private $_vitesseDeplacement;
  private $_type;
  private $_occupe;
  private $_attribue;

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

  public function getTempsDeploiement(){
    return $this->_vitesseDeplacement;
  }

  public function setTempsDeploiement($vitesse){
    if (!is_int($vitesse)) {
      trigger_error('La vitesse doit être un nombre entier', E_USER_WARNING);
      return;
    }
    $this->_vitesseDeplacement = $vitesse;
  }

  public function getType(){
    return $this->_type;
  }

  public function setType(TypesUnite $type){
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

  public function getAttribue(){
    return $this->_attribue;
  }

  public function setAttribue($bool){
    if (!is_bool($bool)) {
      trigger_error('boolean requis', E_USER_WARNING);
      return;
    }
    $this->_attribue = $bool;
  }
}

?>
