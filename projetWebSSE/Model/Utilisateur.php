<?php
namespace ProjetWeb;

abstract class Utilisateur{
  protected $_login;
  private $_mdp;
  private $_mail;

  public function __construct($login)
  {
    $this->_login = $login;
  }

  public function getLogin(){
    return $this->_login;
  }

  public function getMdp(){
    return $this->_mdp;
  }

  public function getMail(){
    return $this->_mail;
  }

  public function setLogin($login){
    if (!is_string($login)){
      trigger_error('string requis', E_USER_WARNING);
      return;
    }
    $this->_login=$login;
  }

  public function setMdp($mdp){
    if (!is_string($mdp)){
      trigger_error('string requis', E_USER_WARNING);
      return;
    }
    $this->_mdp=$mdp;
  }

  public function setMail($mail){
    if (!is_string($mail)){
      trigger_error('string requis', E_USER_WARNING);
      return;
    }
    $this->_mail=$mail;
  }
}
?>
