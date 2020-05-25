<?php
namespace ProjetWeb;

class Victime{
  private $_nom;
  private $_numero;
  private $_sexe;
  private $_etat;
  private $_priseCharge;
  private $_sante;
  private $_symptomes;
  private $_categorie;
  private $_sauve;

  public function __construct($num, Sexe $sexe, TypesEtat $etat, CategoriesAge $cat){
    $this->setNumero($num);
    $this->_sexe=$sexe;
    $this->_etat=$etat;
    $this->_priseCharge=false;
    $this->_sante=100;
    $this->_symptomes=NULL;
    $this->_nom=NULL;
    $this->_categorie=$cat;
    $this->_sauve=false;
  }

  public function getNom(){
    return $this->_nom;
  }

  public function getNumero(){
    return $this->_numero;
  }

  public function getSexe(){
    return $this->_sexe;
  }

  public function getEtat(){
    return $this->_etat;
  }

  public function getPriseC(){
    return $this->_priseCharge;
  }

  public function getSante(){
    return $this->_sante;
  }

  public function getsymptomes(){
    return $this->_symptomes;
  }

  public function getCat(){
    return $this->_categorie;
  }

  public function getSauve(){
    return $this->_sauve;
  }

  public function setNumero($numero){
    if (!is_int($numero)) {
      trigger_error('Le numero doit être un nombre entier', E_USER_WARNING);
      return;
    }
    $this->_numero = $numero;
  }

  public function setNom($nom){
    if (!is_string($nom)) {
      trigger_error('Le nom doit être un string', E_USER_WARNING);
      return;
    }
    $this->_nom = $nom;
  }

  public function setSexe(Sexe $sexe){
    $this->_sexe = $sexe;
  }

  public function setEtat(TypesEtat $etat){
    $this->_etat = $etat;
  }

  public function setCategorie(CategoriesAge $cat){
    $this->_categorie = $cat;
  }

  public function setSante($sante){
    if (!is_int($sante)) {
      trigger_error('La sante doit être un nombre entier', E_USER_WARNING);
      return;
    }
    $this->_sante = $sante;
  }

  public function setPriseC($priseC){
    if (!is_bool($priseC)) {
      trigger_error('Bool requis', E_USER_WARNING);
      return;
    }
    $this->_priseCharge = $priseC;
  }

  public function setSauve($sauve){
    if (!is_bool($sauve)) {
      trigger_error('Bool requis', E_USER_WARNING);
      return;
    }
    $this->_sauve = $sauve;
  }

  public function setSymptomes($symp){
    $this->_symptomes=$symp;
  }
}
?>
