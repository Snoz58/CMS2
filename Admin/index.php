<?php 

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
      
    }
    else {
      echo 'erreur de connexion';
    }


  } 

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

      <form class="form-signin" action="index.php" method="POST">
        <h2 class="form-signin-heading">Connexion</h2>
        
        <label for="inputLogin" class="sr-only">Login</label>
        <input type="text" id="inputLogin" name="inputLogin" class="form-control" placeholder="Login" required autofocus>
        
        <label for="inputPassword" class="sr-only">Mot de passe</label>
        <input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Mot de passe" required>
        
        <button class="btn btn-lg btn-primary btn-block" name="submit" type="submit">Se connecter</button>
        <a href="../inscription.php">Créer un compte</a>
      </form>

    </div> <!-- /container -->

  </body>
</html>