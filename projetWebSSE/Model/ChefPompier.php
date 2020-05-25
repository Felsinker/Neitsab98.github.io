<?php
namespace projetWebSSE;

class ChefPompier extends Utilisateur{
  private PMA $pma;
  private VehiculeUrgence $vu;
  private Personnel $perso;

  /*public function __construct(VehiculeUrgence $v, Personnel $p){
    $this->pma=NULL;
    $this->vu=$v;
    $this->perso=$p;
  }*/

  public function getPma(){
    return $this->pma;
  }

  public function getVu(){
    return $this->vu;
  }

  public function getPerso(){
    return $this->perso;
  }

  public function setPma(PMA $pma){
    $this->pma=$pma;
  }

  public function setVu(VehiculeUrgence $v){
    $this->vu=$v;
  }

  public function setPerso(Personnel $p){
    $this->perso=$p;
  }
}


?>
