<?php
//require ('./View/ChatF/script/functions.php');
include("./bdd/connexion.php");

if ($_SESSION['login'] == NULL) {
    header('Location: index.php');
    }
      else {
?>
<!DOCTYPE>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="./View/ChatF/css/style.css" />
        <script type="text/javascript" src="./View/ChatF/script.js"></script>
    </head>

    <style type="text/css">
    form
    {
        text-align:center;
    }
    </style>

    <body onLoad="request(readData), notif(change)">
     <input type="radio" id="me" name="me" value="<?php echo htmlspecialchars($_SESSION['role']); ?>" checked="checked" style="display:none">
     <span id="notif"></span>
     <?php

             $stm = $dbh->prepare("SELECT role FROM participepartie WHERE nompartie=:idGame AND login!=:login");
             $stm->bindParam(':idGame', $idGame);
             $idGame = $_SESSION['joinedGame'];
             $stm->bindParam(':login', $login);
             $login = $_SESSION['login'];
             $row = -1;
             if($stm->execute()>0)
             {
                 while($row = $stm->fetch())
                 {

                   echo"<input type=\"radio\" id=\"".$row[0]."\" name=\"destinataire\" value=\"".$row[0]."\"> <label for=\"".$row[0]."\" id=\"notif".$row[0]."\" >".$row[0]."</label><br>";
                 }
                     //echo"<button class=\"".$row[0]."\"onclick=\"\">".$row[0]."</button></br>";
             }
             ?>
        <form action="#" method="post">
        <p>

        <label for="message"></label><textarea onKeyPress="if(event.keyCode==13){post(); clear();}" name="message" id="message"  rows="5" cols="25" placeholder="Message ..."></textarea><br />

        <input type="button" onClick="post(); clear()" value="Envoyer !" />
    </p>
    </form>



    <div id="cadre_chat">
    </div>
    </body>
</html>
<?php
      }
        ?>
