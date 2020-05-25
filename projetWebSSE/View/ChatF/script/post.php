<?php
session_start();
include("../../../bdd/connexion.php");

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
    $tnotif="notif".$_SESSION['joinedGame'];
    $dest=$_SESSION['role'];
    $notif = $dbh->prepare("UPDATE $tnotif SET $dest=1 WHERE role=:role");
    $notif->bindParam(':role', $role);
    $role = $_GET['action'];
    $notif->execute();

$req = $dbh->prepare("INSERT INTO $table (pseudo, message_text, timestamp) VALUES(:pseudo, :message_text, :timestamp)");
$req->execute(array(
  'pseudo' => $_SESSION['login'],
  'message_text' => $_GET['message'],
  'timestamp' => time()
  ));
header('Location: chat.php');
?>
