<?php

  class ControllerSignUp
  {

    public function __construct()
    {

    }
    public static function register() {
      if(isset($_SESSION['login']))
      {
        header('Location: /projetwebsse/games');
      }
      else
      {
        return View::render('SignUp');
      }
    }

    public function test()
    {
      include("./bdd/connexion.php");
      if (isset($_POST['login']) && isset($_POST['passwrd']) && isset($_POST['mail']) && isset($_POST['passwrdConfirm']) /*&& isset($_POST['role'])*/) {
        if(is_string($_POST['passwrd']))
        {
          $mdp = password_hash($_POST['passwrd'], PASSWORD_DEFAULT);
          $row = $this->alreadyExists($mdp, $dbh);
          if($row==0)
          {
            if(password_verify($_POST['passwrdConfirm'], $mdp))
            {
                $this->createUser($mdp,$dbh);
                header('Location: connect');
            }
            else {
              $_SESSION['error'] =  "Les mots de passe ne correspondent pas.";
            }
          }
          else {
            $_SESSION['error'] = "Un utilisateur existe déjà à ce nom.";
          }
        }
        else {
          $_SESSION['error'] =  "Le mot de passe doit contenir une lettre minimum.";
        }
      }
      return View::render('SignUp');
    }

    function createUser($password,$dbh)
    {

      $stm = $dbh->prepare("INSERT INTO utilisateurs VALUES (:login, :mdp, :mail)");
      $stm->bindParam(':login', $login);
      $login = $_POST['login'];
      $stm->bindParam(':mdp', $mdp);
      $mdp = $password;
      $stm->bindParam(':mail', $mail);
      $mail = $_POST['mail'];
      $stm->execute();
    }

    function alreadyExists($mdp,$dbh)
    {
      $stm1 = $dbh->prepare("SELECT * FROM utilisateurs WHERE login=:login");
      $stm1->bindParam(':login', $user);
      $user = $_POST['login'];
      $row = -1;
      if($stm1->execute()>0)
      {
        $row = $stm1->fetch();
      }
      return $row;
    }
  }


?>
