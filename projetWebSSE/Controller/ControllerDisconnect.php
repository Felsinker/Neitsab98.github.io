<?php

class ControllerDisconnect
{

  public function __construct()
  {

  }

  public function disconnect()
  {
    session_unset();
    session_destroy();
    return View::render('Disconnect');
  }



}

?>
