<?php
namespace ProjetWeb;

class Sauvegarde{
  private DateTime $_date;
  private $_idSave;
  private $_nomSave;

  public function __construct(DateTime $date, $idSave, $nomSave){
    $this->_date=$date;
    $this->_idSave=$idSave;
    $this->_nomSave=$nomSave;
  }

  public function getDate(){
    return $this->_date;
  }

  public function getIdSave(){
    return $this->_idSave;
  }

  public function getNomSave(){
    return $this->_nomSave;
  }

  public function setDate(DateTime $date){
    $this->_date=$date;
  }

  public function setIdSave($id){
    $this->_idSave=$id;
  }

  public function setNomSave($nom){
    $this->_nomSave=$nom;
  }
}
