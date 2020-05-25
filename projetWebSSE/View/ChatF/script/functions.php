<?php
function bdd_connect()
{
  $dsn = 'mysql:dbname=;host=';
  $user = '';
  $password = '';
  try
  {
    $bdd = new PDO($dsn, $user, $password);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }
  catch (PDOException $e)
  {
    echo 'Échec lors de la connexion : ' . $e->getMessage();
  }
  return $bdd;
}

function deconnexion()
{
  session_destroy();
}
?>
