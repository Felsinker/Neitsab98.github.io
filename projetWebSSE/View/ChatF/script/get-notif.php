<?php
header("Content-Type: text/plain");
include("../../../bdd/connexion.php");
session_start();

    $tnotif="notif".$_SESSION['joinedGame'];
    $notif = $dbh->prepare("SELECT * FROM $tnotif WHERE role=:role");
    $notif->bindParam(':role', $role);
    $role = $_SESSION['role'];
    if($notif->execute()>0)
    {
        $donnees = $notif->fetch(PDO::FETCH_ASSOC);
        if($donnees[$_GET['action']]==1)
        {
            $dest=$_GET['action'];
            $notifa = $dbh->prepare("UPDATE $tnotif SET $dest=0 WHERE role=:role");
            $notifa->bindParam(':role', $rolea);
            $rolea = $_SESSION['role'];
            $notifa->execute();
        }

        if($donnees['chefPompier']=='1')
            echo'<style type="text/css"> #notifchefPompier {color:green; }</style>';
        else
            echo'<style type="text/css"> #notifchefPompier {color:black; }</style>';

        if($donnees['chefPolice']=='1')
            echo'<style type="text/css"> #notifchefPolice {color:green; }</style>';
        else
            echo'<style type="text/css"> #notifchefPolice {color:black; }</style>';

        if($donnees['chefSamu']=='1')
            echo'<style type="text/css"> #notifchefSamu {color:green; }</style>';
        else

        if($donnees['maitreJeu']=='1')
            echo'<style type="text/css"> #notifmaitreJeu {color:green; }</style>';
        else
            echo'<style type="text/css"> #notifchefSamu {color:black; }</style>';

        if($donnees['medecinRepartiteur']=='1')
            echo'<style type="text/css"> #notifmedecinRepartiteur {color:green; }</style>';
        else
            echo'<style type="text/css"> #notifmedecinRepartiteur {color:black; }</style>';

        if($donnees['medecinTrieur']=='1')
            echo'<style type="text/css"> #notifmedecinTrieur {color:green; }</style>';
        else
            echo'<style type="text/css"> #notifmedecinTrieur {color:black; }</style>';

        if($donnees['crra']=='1')
            echo'<style type="text/css"> #notifcrra {color:green; }</style>';
        else
            echo'<style type="text/css"> #notifcrra {color:black; }</style>';


    }
?>
