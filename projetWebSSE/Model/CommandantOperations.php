<?php
namespace ProjetWeb;

class CommandantOperations extends Utilisateur{
  private Personnel $_perso;
  private Vehicule $_vehicule;

  public function __construct($login, Personnel $perso, Vehicule $vehicule){
    $this->_login=$login;
    $this->_perso=$perso;
    $this->_vehicule=$vehicule;
  }

  public function getPerso(){
    return $this->_perso;
  }

  public function getVehicule(){
    return $this->_vehicule;
  }

  public function setPerso(Personnel $perso){
    $this->_perso=$perso;
  }

  public function setVehicule(Vehicule $vehicule){
    $this->_vehicule=$vehicule;
  }
}


 ?>
