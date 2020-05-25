<?php
namespace ProjetWeb;

class MedecinResponsable extends Utilisateur{
  private VehiculeTransport $_vt;
  private Personnel $_perso;

  public function __construct($login, VehiculeTransport $vt, Personnel $perso){
    $this->_login=$login;
    $this->_vt=$vt;
    $this->_perso=$perso;
  }

  public function getVt(){
    return $this->_vt;
  }

  public function getPerso(){
    return $this->_perso;
  }

  public function setVt(VehiculeTransport $vt){
    $this->_vt=$vt;
  }

  public function setPerso(Personnel $perso){
    $this->_perso=$perso;
  }
}


?>
