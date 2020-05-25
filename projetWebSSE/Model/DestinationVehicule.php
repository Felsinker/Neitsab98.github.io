<?php
namespace projetWebSSE;

class DestinationVehicule
{
    protected $_distance;

    public function __construct()
    {
        $this->_distance=NULL;
    }

    public function getDistance(){
        return $this->_distance;
    }

    public function setDistance($dist){
        $this->_distance=$dist;
    }
}
?>