<?php
namespace ProjetWeb;

class MedecinTrieur extends Utilisateur{
  private Victime $_v1;
  private Victime $_v2;

  public function __construct($login, Victime $v1, Victime $v2){
    $this->_login=$login;
    $this->_v1=$v1;
    $this->_v2=$v2;
  }

  public function getV1(){
    return $this->_v1;
  }

  public function getV2(){
    return $this->_v2;
  }

  public function setV1(Victime $v1){
    $this->_v1=$v1;
  }

  public function setV2(Victime $v2){
    $this->_v2=$v2;
  }
}


?>
