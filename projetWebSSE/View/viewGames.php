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
    <?php

      echo "<div id=\"testRefresh\">";
      if(isset($var['partieJoueur']))
      {
        echo "<table class=\"tabPartie\" id=\"".$var['partieJoueur']->getId()."\"><thead>
        <tr>
        <th colspan=\"2\">";
        echo $var['partieJoueur']->getId();
        echo"</th>
        </tr>
        </thead>";
        echo "<tbody><tr>
        <td colspan=\"2\">".count($var['partieJoueur']->getJoueurs())."/7
        </td>
        </tr><tr>
        <td>
        <form class=\"formJoin\" action=\"join\" method=\"post\">
        <input type=\"hidden\" name=\"idGame\" value=\"".$var['partieJoueur']->getId()."\"/>
        <button type=\"submit\" class=\"btn-formulaires\" disabled >Rejoindre</button></form></td>
        <td><form class=\"formJoin\" action=\"quit\" method=\"post\">
        <input type=\"hidden\" name=\"idGame\" value=\"".$var['partieJoueur']->getId()."\"/><button type=\"submit\" class=\"btn-cancel\">Quitter</button></form>
        </td>
        </tr>";
        foreach($var['partieJoueur']->getJoueurs() as $role => $player){
          echo "<tr>
          <td>";
          echo $role;
          echo "</td><td>".$player."
          </td>
          </tr>";
        }
        echo "</tbody>
        </table>";
      }
      foreach($var['parties'] as $key => $game)
      {
        echo "<table class=\"tabPartie\" id=\"".$game->getId()."\"><thead>
        <tr>
        <th colspan=\"2\">";
        echo $game->getId();
        echo"</th>
        </tr>
        </thead>";
        echo "<tbody><tr>
        <td colspan=\"2\">".count($game->getJoueurs())."/7
        </td>
        </tr><tr>
        <td>
        <form class=\"formJoin\" action=\"join\" method=\"post\">
        <input type=\"hidden\" name=\"idGame\" value=\"".$game->getId()."\"/>
        <button type=\"submit\" class=\"btn-formulaires\"";
        if(isset($var['partieJoueur']))
        {
          echo "disabled";
        }
        echo ">Rejoindre</button></form></td>
        <td><form class=\"formJoin\" action=\"quit\" method=\"post\">
        <input type=\"hidden\" name=\"idGame\" value=\"".$game->getId()."\"/><button type=\"submit\" class=\"btn-cancel\" disabled >Quitter</button></form>
        </td>
        </tr>";
        foreach($game->getJoueurs() as $role => $player){
          echo "<tr>
          <td>";
          echo $role;
          echo "</td><td>".$player."
          </td>
          </tr>";
        }
        echo "</tbody>
        </table>";
      }
      echo "</div>";
      echo "<a href=\"create\"><button class=\"btn-formulaires\"";
      if(isset($var['partieJoueur']))
      {
        echo "disabled";
      }
      echo ">Créer une Partie</button></a>";
    ?>

  </div>
    <script type="text/javascript" src="./View/script/refresh.js"></script>
  </body>
</html>
