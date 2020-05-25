<?php
namespace ProjetWebSSE

class Service{
  private $nbLits;
  private Victime $tabVictime;

  public function __construct($nb){
    $this->nbLits=$nb;
    $this->tabVictime=NULL;
  }

  public function getNbLits(){
    return $this->nbLits;
  }

  public function getTabVict(){
    return $this->tabVictime;
  }

  public function setNbLits($nb){
    $this->nbLits=$nb;
  }

  public function setTabVict(Victime $tab){
    $this->tabVictime=$tab;
  }
}

?>
