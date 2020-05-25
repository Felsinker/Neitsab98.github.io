<?php
namespace ProjetWeb;

class MedecinRepartiteur extends Utilisateur{
  private VehiculeTransport $_vt;

  /*public function __construct($login, VehiculeTransport $vt){
    $this->_login=$login;
    $this->_vt=$vt;
  }*/

  public function getVt(){
    return $this->_vt;
  }

  public function setVt(VehiculeTransport $vt){
    $this->_vt=$vt;
  }
}


 ?>
