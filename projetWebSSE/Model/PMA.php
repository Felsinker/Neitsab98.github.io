<?php
namespace projetWebSSE;

class PMA extends DestinationVehicule
{
    private $_nom;
    private $_lieu;

    public function __construct()
    {
        $this->_nom="PMA";
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

    public function setLieu($lieu)
    {
        $this->_lieu=$lieu;
    }
}
?>