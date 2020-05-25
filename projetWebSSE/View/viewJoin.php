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

      <?php include("./View/header.php");?>
    <div id="mainDiv">
    <?php
      echo "Quel rôle voulez-vous jouer dans la partie ".$var['id']." ?";
      echo "<form class=\"formJoin\" action=\"\" method=\"post\"><input type=\"hidden\" name=\"idGame\" value=\"".$var['id']."\"/><select class=\"selectRole\" name=\"selectRole\">";
      foreach($var['availableRoles'] as  $bdRole => $role)
      {
        echo "<option value=\"".$bdRole."\">".$role."

        </option>";
      }
      echo "</select><br /><button type=\"submit\" class=\"btn-formulaires\">Rejoindre</button>
      </form><a href=\"games\"><button class=\"btn-cancel\">Annuler</button></a>";
    ?>
  </div>
  </body>
</html>
