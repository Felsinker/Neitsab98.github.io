<?php

include_once('./Model/SeriousGame.php');

  class ControllerGames
  {
    public function __construct()
    {

    }

    public static function hubGames() {
      if(isset($_SESSION['login']))
      {
        $_SESSION['waitDecision'] = false;
        $seriousGame = self::getDatas();
        if(isset($_SESSION['inGame']))
        {
          //header('Location: /projetwebsse/partie');
          //Redirection vers la page du jeu.
        }
        else {
          if(isset($_SESSION['joinedGame']))
          {
            $partieJoueur = $seriousGame->getpartie($_SESSION['joinedGame']);
            $parties = $seriousGame->getpartiesSauf($_SESSION['joinedGame']);
          }
          else {
            $parties = $seriousGame->getListeparties();
          }
          return View::render('Games',compact('partieJoueur','parties'));
        }
      }
      else {
        header('Location: /projetwebsse/connect');
      }
    }

    function getDatas()
    {
      include("./bdd/connexion.php");
      try {

        $testIngame = $dbh->prepare("SELECT distinct(nompartie), role FROM participepartie WHERE login=:loginPlayer");
        $testIngame->bindParam(':loginPlayer', $login);
        $login = $_SESSION['login'];
        if($testIngame->execute()>0)
        {
          $row = $testIngame->fetch();
        }
        if($row)
        {
          $_SESSION['joinedGame'] = $row[0];
          $_SESSION['role'] = $row[1];
          $nbParticipantsQuery = $dbh->prepare("SELECT count(role) FROM participepartie WHERE nompartie=:nom");
          $nbParticipantsQuery->bindParam(':nom', $partie);
          $partie = $row[0];
          if($nbParticipantsQuery->execute()>0)
          {
            $nbParticipants = $nbParticipantsQuery->fetch();
          }
          if($nbParticipants[0] == 7)
          {
            $_SESSION['inGame'] = $row[0];
          }
        }
        $res = "";
        if(!isset($_SESSION['inGame']))
        {
          $games = $dbh->query('SELECT nompartie, date, etat FROM partie');
          $players = $dbh->query('SELECT login FROM utilisateurs');
          $participe = $dbh->query('SELECT nompartie, login, role FROM participepartie');
          self::createGameEnvt($games, $players, $participe);
          $res =  projetWebSSE\SeriousGame::getInstance();
        }
        return $res;
      } catch (Exception $e) {
        echo $e;
      }

    }

    public static function refresh()
    {
      $seriousGame = self::getDatas();
      if(isset($_SESSION['inGame']))
      {
        //header('Location: /projetwebsse/partie');
        //Redirection vers la page du jeu.
      }
      else {
        if(isset($_SESSION['joinedGame']))
        {

          $partieJoueur = $seriousGame->getpartie($_SESSION['joinedGame']);
          $parties = $seriousGame->getpartiesSauf($_SESSION['joinedGame']);
          $temp = [];
          foreach($parties as $partie)
          {
            $temp[] = $partie->toJson();
          }
          $res = ['partieJoueur' => $partieJoueur->toJson(), 'parties' => $temp];
        }
        else {
          $parties = $seriousGame->toJson();
          $res = ['partieJoueur' => '', 'parties' => $parties];
        }
        return json_encode($res);
      }

  }

    public static function quitGame()
    {
      include("./bdd/connexion.php");
      if(isset($_POST['idGame']))
      {
        $id = $_POST['idGame'];
        if($_SESSION['waitDecision'])
        {
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
                            {
                                if($inv!=0)
                                    $table=$_SESSION['role']."_".$row[$i]."_".$_SESSION['joinedGame'];
                                else
                                    $table=$row[$i]."_".$_SESSION['role']."_".$_SESSION['joinedGame'];

                                $time = date("Y-m-d_H\hi\ms\s");
                                $recup_message = $dbh->prepare("SELECT pseudo, message_text FROM $table ORDER BY message_id ASC");
                                $recup_message->execute();
                                $fichier = fopen('Rapport/'.$table.'_'.$time.'.txt', 'c++b');
                                while ($message = $recup_message->fetch())
                                {
                                  $pseudo = $message['pseudo'];
                                  $texte = htmlspecialchars($message['message_text']);
                                    file_put_contents('Rapport/'.$table.'_'.$time.'.txt',"\n" . $pseudo  .' : '.  $texte ."\n" , FILE_APPEND);
                                }
                                $reponse=$dbh->prepare("DROP Table IF EXISTS $table");
                                $reponse->execute();
                            }
                }

            }

          $stm = $dbh->prepare("DELETE FROM participepartie WHERE nompartie=:idGame AND login=:loginPlayer");
          $stm->bindParam(':idGame', $partie);
          $partie = $id;
          $stm->bindParam(':loginPlayer', $login);
          $login = $_SESSION['login'];
          $stm->execute();

            unset($_SESSION['joinedGame']);
            unset($_POST['selectRole']);
            unset($_SESSION['role']);
          header('Location: /projetwebsse/games');
        }
        else {
          $_SESSION['waitDecision'] = true;
          return View::render('Quit',compact('id'));
        }

      }
      else{
        header('Location: /projetwebsse/games');
      }
    }

    function addParticipant($idpartie,$dbh)
    {
      $stm = $dbh->prepare("INSERT INTO participepartie VALUES(:idGame, :loginPlayer, :role)");
      $stm->bindParam(':idGame', $partie);
      $partie = $idpartie;
      $stm->bindParam(':loginPlayer', $login);
      $login = $_SESSION['login'];
      $stm->bindParam(':role', $role);
      $role = $_POST['selectRole'];
      $stm->execute();
      $_SESSION['joinedGame'] = $idpartie;
      $_SESSION['role'] = $_POST['selectRole'];
        $stm = $dbh->prepare("SELECT role FROM participepartie WHERE nompartie=:idGame");
        $stm->bindParam(':idGame', $idGame);
        $idGame = $idpartie;
        $row = -1;
        if($stm->execute()>0)
        {
          $availableRoles = array('chefPolice' => 'Chef de la Police', 'chefPompier' => 'Chef des Pompiers', 'chefSamu' => 'Médecin Responsable', 'crra' => 'CRRA', 'maitreJeu' => 'Maître du Jeu', 'medecinTrieur' => 'Médecin Trieur', 'medecinRepartiteur' => 'Médecin répartiteur');
          while($row = $stm->fetchAll(PDO::FETCH_COLUMN, 0))
          {
              for ($i=0;$i<count($row);$i++)
              {
                  unset($availableRoles[$row[$i]]);
              }
              for ($i=0;$i<count($row)-1;$i++)
              {
                  for ($j=$i+1;$j<count($row);$j++)
                  {
                      $table=$row[$i]."_".$row[$j]."_".$idGame;
                      $reponse=$dbh->prepare("CREATE TABLE IF NOT EXISTS $table (message_id int(11) NOT NULL AUTO_INCREMENT, message_text longtext CHARACTER SET latin1 COLLATE latin1_german1_ci NOT NULL, pseudo varchar(255) NOT NULL, timestamp int(11) NOT NULL, PRIMARY KEY (message_id) ) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ");
                      $reponse->execute();
                  }
              }
          }
        }
    }

    public function joinGame()
    {
      include("./bdd/connexion.php");
      if(isset($_POST['idGame']))
      {
        if($_SESSION['waitDecision'])
        {
          $partie = $_POST['idGame'];
          $this->addParticipant($partie, $dbh);
          header('Location: /projetwebsse/games');
        }
        else {
            $availableRoles = array('chefPolice' => 'Chef de la Police', 'chefPompier' => 'Chef des Pompiers', 'chefSamu' => 'Médecin Responsable', 'crra' => 'CRRA', 'maitreJeu' => 'Maître du Jeu', 'medecinTrieur' => 'Médecin Trieur', 'medecinRepartiteur' => 'Médecin répartiteur');
            $stm = $dbh->prepare("SELECT role FROM participepartie WHERE nompartie=:idGame");
            $stm->bindParam(':idGame', $idGame);
            $idGame = $_POST['idGame'];
            $row = -1;
            if($stm->execute()>0)
            {
              while($row = $stm->fetch())
              {
                  unset($availableRoles[$row[0]]);
              }
            }

          $id = $_POST['idGame'];
          $_SESSION['waitDecision'] = true;
          return View::render('Join',compact('availableRoles', 'id'));
        }
      }
      else{
        header('Location: /projetwebsse/games');
      }
    }

    function createGameEnvt($games, $players, $participe)
    {
      $jeu = projetWebSSE\SeriousGame::getInstance();
      $jeu->fillListeUtilisateurs($players);
      $jeu->fillListeparties($games, $participe);
    }

    function goToCreateGame()
    {
      if(isset($_SESSION['login']) && !isset($_SESSION["joinedGame"]))
      {
        return View::render('Create');
      }
      else {
        if(isset($_SESSION["joinedGame"]))
        {
          header('Location: /projetwebsse/games');
        }
        else
        {
          header('Location: /projetwebsse/connect');
        }
      }
    }

    function createGame()
    {
      include("./bdd/connexion.php");
      unset($_SESSION['error']);
      if(isset($_POST['gameName'])) {
        if(is_string($_POST['gameName']))
        {
          if($this->testpartie($dbh)==0)
          {
              $this->newGame($_POST['gameName'], $dbh);
              $partie = $_POST['gameName'];
              $this->addParticipant($partie,$dbh);
              header('Location: games');
          }
          else {
            $_SESSION['error'] = "Une partie existe déjà à ce nom.";
          }
        }
        else {
          $_SESSION['error'] =  "Le nom de la partie doit contenir une lettre minimum.";
        }
      }
    return View::render('Create');
    }

    function testpartie($dbh)
    {
      $stm1 = $dbh->prepare("SELECT * FROM partie WHERE nompartie=:partie");
      $stm1->bindParam(':partie', $nompartie);
      $nompartie = $_POST['gameName'];
      return $stm1->rowCount();

    }

    function newGame($name,$dbh)
    {
      $stm = $dbh->prepare("INSERT INTO partie VALUES (:name, :date, :etat)");
      $stm->bindParam(':name', $gameName);
      $gameName = $name;
      $stm->bindParam(':date', $date);
      $date = date("Y-m-d");
      $stm->bindParam(':etat', $etat);
      $etat = "ouverte";
      $stm->execute();
    }

  }

?>
