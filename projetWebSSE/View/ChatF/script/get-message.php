<?php
header("Content-Type: text/plain");
include("../../../bdd/connexion.php");
session_start();

    $stm = $dbh->prepare("SELECT role FROM participepartie WHERE nompartie=:idGame");
    $stm->bindParam(':idGame', $idGame);
    $idGame = $_SESSION['joinedGame'];
    $row = -1;
        if($stm->execute()>0)
        {
            $row = $stm->fetchAll(PDO::FETCH_COLUMN, 0);
            $inv=0;
            for ($i=0;$i<count($row);$i++)
            {
                if($_SESSION['role'] == $row[$i])
                    $inv=1;
                else
                    if($row[$i]==$_GET['action'])
                    {
                        if($inv!=0)
                        $table=$_SESSION['role']."_".$row[$i]."_".$_SESSION['joinedGame'];
                        else
                        $table=$row[$i]."_".$_SESSION['role']."_".$_SESSION['joinedGame'];
                    }
            }

        }
    //$chat_messages='chat_messages';
    $reponse = $dbh->prepare("SELECT pseudo, message_text FROM $table ORDER BY message_id DESC");
    $reponse->execute();
while ($donnees = $reponse->fetch())
{
    $pseudo = $donnees['pseudo'];
    $texte = $donnees['message_text'];
	echo '<p><strong>' . $pseudo . '</strong> : ' . $texte . '</p>';

}
$reponse->closeCursor();
?>
