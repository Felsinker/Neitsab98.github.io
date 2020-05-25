<?php

include_once('./Model/SeriousGame.php');

  class ControllerTri
  {
    public function __construct()
    {

    }

    function viewTri()
    {
      if(isset($_SESSION['login']) && isset($_SESSION['joinedGame']))
      {
        return View::render('Tri');
      }
      else {
        if(!isset($_SESSION['joinedGame']))
        {
          header('Location: /projetwebsse/games');
        }
        else {
          header('Location: /projetwebsse/connect');
        }
      }
    }
  }
?>
