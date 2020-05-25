<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="./View/style/formulaires.css">
  </head>
  <body>
    <div id="mainDiv">
    <h1>S'inscrire</h1>
    <?php
    if(isset($_SESSION['error']))
    {
      echo $_SESSION['error'];
      unset($_SESSION['error']);
    }

    echo "<form class=\"formRegister\" class=\"formulaires\" action=\"\" method=\"post\">
      <label for=\"login\">Login</label>
      <br>
      <input type=\"text\" name=\"login\" value=\"\" required>
      <br>
      <label for=\"passwrd\">Mot de passe : </label>
      <br>
      <input type=\"password\" name=\"passwrd\" value=\"\" required>
      <br>
      <label for=\"passwrdConfirm\">Confirmez le mot de passe : </label>
      <br>
      <input type=\"password\" name=\"passwrdConfirm\" value=\"\" required>
      <br>
      <label for=\"mail\">E-mail</label>
      <br>
      <input type=\"email\" name=\"mail\" value=\"\" required>
      <br>
      <button type=\"submit\" name=\"btnRegister\" class=\"btn-formulaires\">S'inscrire</button>
    </form>
    <a href=\"home\"><button class=\"btn-cancel\">Retour</button></a>";
    ?>
  </div>
  </body>
</html>
