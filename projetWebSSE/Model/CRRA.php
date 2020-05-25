<?php
namespace ProjetWeb;

class CRRA extends Utilisateur{
  private $_hp;

  public function __construct($login, Hopital $hp){
    $this->_login=$login;
    $this->_hp=$hp;
  }

  public function getHp(){
    return $this->_hp;
  }

  public function setHp(Hopital $hp){
    $this->_hp=$hp;
  }
}


 ?>
