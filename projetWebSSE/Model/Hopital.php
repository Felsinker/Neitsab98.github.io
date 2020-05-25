<?php
namespace projetWebSSE;

class Hopital extends DestinationVehicule
{
    private $_nom;
    private $_lieu;

    public function __construct()
    {
        $this->_nom="hopital";
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

    public function setNom($nom)
    {
        $this->_nom=$nom;
    }

    public function setLieu($lieu)
    {
        $this->_lieu=$lieu;
    }
}
?>