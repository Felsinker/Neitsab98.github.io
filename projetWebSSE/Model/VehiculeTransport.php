<?php
namespace ProjetWeb;

include('../Model/Vehicule.php');


class VehiculeTransport extends Vehicule{
//class VehiculeTransport{
  private $capacity; //Capacité maximale du véhicule
  private $currentCapacity; //Nombre de victimes actuellement contenues dans le véhicule
  private $_numero; //Numéro du véhicule
  private $_vitesseDeplacement; //Vitesse à laquelle le véhicule se déplace
  private $_type; //Type du véhicule
  private $_occupe; //Indique si le véhicule est occupé ou non

    //Constructeur de la classe
	public function __construct($numero, $vitesse, $type,$cap)
	{
		$this->capacity = $cap;
		$this->currentCapacity = 0;
		$this->_numero = $numero;
		$this->_vitesseDeplacement = $vitesse;
		$this->_type = $type;
		$this->_occupe = false;
	}

	//Affiche les données du véhicule de transport
    public function __toString()
    {
        return (string)'Véhicule avec capacité de ' . $this->capacity . ' possède actuellement ' . $this->currentCapacity;
    }

  //Getter et Setter de la capacité
  public function getCapacity(){
    return $this->capacity;
  }

  public function setCapacity( $cp){
    $this->capacity=$cp;
  }

  //Getter et Setter du nombre de victimes actuellement dans le véhicule de transport
  public function getCurrentCapacity(){
    return $this->currentCapacity;
  }

  public function setCurrentCapacity( $cc){
    $this->currentCapacity=$cc;
  }

  //Getter et Setter de la capacité
  public function getType(){
    return $this->_type;
  }

  public function setType( $ty){
    $this->_type=$ty;
  }

  //Augmente la valeur de la capacité actuelle
  public function incrementCurrentCapacity(int $inc){
  	  if($inc + $this->currentCapacity > $this->capacity) //Si la capacité actuelle va dépasser la capacité max, message d'erreur
		trigger_error('La vitesse doit être un nombre entier', E_USER_WARNING);
	  else
		$this->currentCapacity += $inc; //Augmentation de la capacité actuelle
  }


}
?>
