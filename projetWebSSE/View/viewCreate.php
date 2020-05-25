<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="./View/style/header.css">
    <link rel="stylesheet" href="./View/style/main.css">
    <link rel="stylesheet" href="./View/style/formulaires.css">

  </head>
  <?php
    include("./View/header.php");
   ?>
  <body>
    <div id="mainDiv">
      <h1>Créer une partie</h1>
      <?php
      if(isset($_SESSION['error']))
      {
        echo $_SESSION['error'];
        unset($_SESSION['error']);
      }
      ?>
      <form action="create" method="post">
        <label for="gameName">Nom de la partie : </label>
        <br />
        <input type="text" name="gameName" value="" required>
        <br />
        <label for="selectRole">Quel rôle voulez-vous y jouer ?</label>
        <br />
        <select class="selectRole" name="selectRole">"
          <option value="chefPolice">Chef de la Police</option>
          <option value="chefPompier">Chef des Pompiers</option>
          <option value="chefSamu">Médecin Responsable</option>
          <option value="crra">CRRA</option>
          <option value="maitreJeu">Maître du Jeu</option>
          <option value="medecinTrieur">Médecin Trieur</option>
          <option value="medecinRepartiteur">Médecin Répartiteur</option>
        </select>
        <br />
        <button type="submit" name="button" class="btn-formulaires">Créer la partie</button>
      </form>
      <a href="games"><button class="btn-cancel">Annuler</button></a>
    </div>
    </body>
  </html>
