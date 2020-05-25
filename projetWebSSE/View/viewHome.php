<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="./View/style/main.css">
    <link rel="stylesheet" href="./View/style/formulaires.css">
    <title></title>
  </head>
  <body>
    <div id="mainDiv">
    <?php
      include("./bdd/connexion.php");
     ?>

    <h1 id="mainTitle">Bienvenue sur la simulation du plan ORSEC NOVI</h1>
    <div id="test">
      <p>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
      </p>
      <center>
        <a href="connect"><button type="button" name="buttonConnect" class="btn-formulaires btn-home">Se Connecter</button></a>
        <a href="register"><button type="button" name="buttonSignUp" class="btn-formulaires btn-home">S'inscrire</button></a>
        <!--<button type="button" name="buttonPlay" id="btn-play" onclick="changeContent()">Jouer</button>-->
      </center>
    </div>

    <!--<script type="text/javascript" src="script/index.js"></script>-->
  </div>
  </body>
</html>
