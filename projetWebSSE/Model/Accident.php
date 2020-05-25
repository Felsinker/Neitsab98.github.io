<?php
namespace projetWebSSE;

class Accident extends DestinationVehicule
{
    private $_nom;
    private $_lieu;

    public function __construct()
    {
        $this->_nom="accident";
        $this->_lieu="lieu";
    }

    public function getNom()
    {
        return $this->_nom;
    }

    public function getLieu()
    {
        return $this->_lieu;
    }
}
?>