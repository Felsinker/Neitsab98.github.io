<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="./View/style/header.css">
    <link rel="stylesheet" href="./View/style/main.css">
    <link rel="stylesheet" href="./View/style/formulaires.css">
  </head>
  <body>
    <?php
      include("./View/header.php");
      ?>
    <div id="mainDiv">
    <?php
      echo "Voulez-vous quitter la partie ".$var['id']." ?";
      echo "<form class=\"formJoin\" action=\"\" method=\"post\"><input type=\"hidden\" name=\"idGame\" value=\"".$var['id']."\"/><button type=\"submit\" class=\"btn-formulaires\">Quitter</button>
      </form><a href=\"games\"><button class=\"btn-cancel\">Annuler</button></a>";
    ?>
    </div>
  </body>
</html>
