<?php
namespace projetWebSSE;

include_once('./Model/Partie.php');

class SeriousGame{

    private static $_instance = null;
    private $_listeParties;
    private $_listeUtilisateurs;

    private function __construct()
    {
      $this->_listeParties = array();
      $this->_listeUtilisateurs = array();
    }

    public static function getInstance()
    {
      if(is_null(self::$_instance))
      {
        self::$_instance = new SeriousGame();
      }

      return self::$_instance;
    }

    public function fillListeUtilisateurs($utilisateurs)
    {
      foreach ($utilisateurs as $utilisateur) {
        array_push($this->_listeUtilisateurs, $utilisateur);
      }
    }

    public function fillListeParties($parties, $participe)
    {
      foreach($parties as $partie)
      {
        $p = new Partie($partie[0], $partie[1], $partie[2]);
        $this->_listeParties[$partie[0]] = $p;
      }
      foreach($participe as $duo)
      {
        echo $this->_listeParties[$duo[0]]->addJoueur($duo[1], $duo[2]);
      }
    }

    public function getListeParties()
    {
      return $this->_listeParties;
    }

    public function getPartie($nom)
    {
      return $this->_listeParties[$nom];
    }

    public function getPartiesSauf($nom)
    {
      $res = [];
      foreach($this->_listeParties as $partie)
      {
        if($partie->getId()!=$nom)
        {
          $res[$partie->getId()] = $partie;
        }
      }
      return $res;
    }

    public function toJson(){
      $test = [];
      foreach($this->_listeParties as $partie)
      {
        $temp = $partie->toJson();
        $test[] = $temp;
      }
      return $test;
    }

  }

 ?>
