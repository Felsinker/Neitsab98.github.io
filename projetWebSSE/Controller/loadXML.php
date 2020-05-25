<?php
  function load($nom)
  {
    return Simplexml_load_file('../bdd/'.$nom);
  }

?>
