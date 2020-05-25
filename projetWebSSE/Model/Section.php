<?php
namespace projetWebSSE;

class Section{
    private $_nom;
    private $_nbplaces;

    public function getNom(){
        return $this->_nom;
    }

    public function setNom($nom){
        $this->_nom=$nom;
    }

    public function getNbPlaces(){
        return $this->_nbplaces;
    }

    public function setNbPlaces($nbPlaces){
        $this->_nbplaces=$nbPlaces;
    }
}
?>