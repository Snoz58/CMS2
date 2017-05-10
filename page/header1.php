<?php

  require_once("controller/session.php");

  require_once("controller/class.php");
  $auth_user = new USER();


  $user_id = $_SESSION['user_session'];

  $stmt = $auth_user->runQuery("SELECT pseudo FROM utilisateur WHERE id_utilisateur=:user_id");
  $stmt->execute(array(":user_id"=>$user_id));

  $userRow=$stmt->fetch(PDO::FETCH_ASSOC);
?>

<html lang="fr">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>CooKMS</title>

  <!-- script -->
  <script>
        $(document).ready(function(){
      $('.slider').slider();
    });
      </script>
  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>
  <nav class="white" role="navigation">
    <div class="nav-wrapper container">
      <ul class="left hide-on-med-and-down">
        <li><a class="grey-text text-darken-4" href="liste2.php">Recettes</a></li>
      </ul>
      <ul class="right hide-on-med-and-down">
          <li><a class="red-text text-darken-1" href="#"><?php echo $userRow['pseudo']; ?></a><li>
            <li><a class="grey-text text-darken-4" href="controller/logout.php?logout=true">Se Déconnecter</a></li>
      </ul>

      <ul id="nav-mobile" class="side-nav">
        <li><a class="grey-text text-darken-4" href="liste2.php">Recettes</a></li>
        <li><a class="red-text text-darken-1" href="#"><?php echo $userRow['pseudo']; ?></a><li>
        <li><a class="grey-text text-darken-4" href="controller/logout.php?logout=true">Se Déconnecter</a></li>
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
  </nav>
  <!-- Banniere -->
  <div id="index-banner" class="container">
    <div class="section no-pad-bot">
      <div class="container">
        <h1 class="header center Black-text text-lighten-2 ">CookMS</h1>
      </div>
    </div>
  </div>