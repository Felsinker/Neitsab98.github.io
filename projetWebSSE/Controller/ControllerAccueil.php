<?php

class ControllerAccueil
{

  public function __construct()
  {

  }

  public static function index() {
    return View::render('Home');
  }



}

?>
