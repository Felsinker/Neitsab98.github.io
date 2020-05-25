<?php
namespace projetWebSSE;

class Personnel{
    private $_typePersonnel;
    private $_forceTravail;

    public function getTypePersonnel(){
        return $this->_typePersonnel;
    }

    public function setTypePersonnel($typePersonnel){
        $this->_typePersonnel=$typePersonnel;
    }

    public function getForceTravail(){
        return $this->_typeTravail;
    }

    public function setForceTravail($forceTravail){
        $this->_forceTravail=$forceTravail;
    }
}
?>