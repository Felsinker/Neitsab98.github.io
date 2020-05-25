<?php
namespace projetWebSSE;

class Partie
{
    private $_id;
    private $_date;
    private $_etat;
    private $_listeJoueurs;

    public function __construct($id, $date, $etat){
        $this->_id=$id;
        $this->_date=date($date);
        $this->_listeJoueurs =  array();
        $this->_etat = $etat;
    }

    public function getDate(){
        return $this->_date;
    }

    public function getId(){
        return $this->_id;
    }

    public function addJoueur($joueur, $role)
    {
      $this->_listeJoueurs[$role] = $joueur;
    }

    public function getJoueurs()
    {
      return $this->_listeJoueurs;
    }

    public function getEtat()
    {
      return $this->_etat;
    }

    public function toJson()
    {
      $temp = [];
      foreach($this->_listeJoueurs as $role => $value)
      {
        $temp[] = ["role" => $role, "login" =>$value];
      }
      $var = ["id" => $this->_id, "date" => $this->_date, "etat" => $this->_etat, "joueurs" => $temp];
      return $var;
    }

}
?>
