<?php
/** verif */
session_start();
require_once('../controller/class.php');
$login = new USER();

if($login->is_loggedin()!="")
{
    $login->redirect('recette.php?action=ajout');
}

if(isset($_POST['envoyer']))
{
    $uname = strip_tags($_POST['pseudo']);
    $upass = strip_tags($_POST['password']);

    if($login->doLogin($uname,$upass))
    {
        $login->redirect('recette.php?action=ajout');
    }
    else
    {
        echo"error";
    }
}
/**
  include('bdd.php');

  if (isset($_POST["submit"])){

    $login = $_POST["inputLogin"];
    $password = $_POST["inputPassword"];

    $req = "select password, niveau from Utilisateur inner join statut on statut.id_statut = Utilisateur.id_statut where pseudo = '".$login."'";
    $reponse = $pdo->query($req);
    $donnees = $reponse->fetch();

    if (password_verify ($password , $donnees["password"])){
      // quelque chose avec les sessions
      session_start();
      $_SESSION["statut"] = $donnees["niveau"];
      header ('Location:recette.php?submit=ajout');
    }
    else {
      echo 'erreur de connexion';
    }


  } 
**/
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Connexion</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">

  </head>

  <body>

    <div class="container">

      <form class="form-signin" name="connection" method="post">
        <h2 class="form-signin-heading">Connexion</h2>
        
        <label for="pseudo" class="sr-only">Login</label>
        <input type="text" id="pseudo" name="pseudo" class="form-control" placeholder="Login" required autofocus>
        
        <label for="password" class="sr-only">Mot de passe</label>
        <input type="password" id="password" name="password" class="form-control" placeholder="Mot de passe" required>
        
        <button class="btn btn-lg btn-primary btn-block" name="envoyer" type="submit">Se connecter</button>
      </form>

    </div> <!-- /container -->

  </body>
</html>