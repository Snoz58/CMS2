<?php
require_once("../controller/session.php");

require_once("../controller/class.php");
$auth_user = new USER();


$user_id = $_SESSION['user_session'];

$stmt = $auth_user->runQuery("SELECT pseudo FROM utilisateur WHERE id_utilisateur=:user_id");
$stmt->execute(array(":user_id"=>$user_id));

$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
?>
<nav class="navbar navbar-fixed-top navbar-inverse">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand">Administration - CookMS</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <!-- <li><a href="ajout_recette.php">Création</a></li> -->

            <li><a href="recette.php?action=ajout">Création</a></li>
           <li><a href="validation_recette.php">Validation</a></li>
            <li><a href="admin.php">Visualisation</a></li>
            <li><a href="moderation_commentaires.php">Modération commentaires</a></li>
            <li><a href="utilisateurs.php">Utilisateurs</a></li>
            <li><a href="roles.php">Rôles</a></li>

          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="../controller/logout.php?logout=true"><span class="glyphicon glyphicon-log-in"></span></a></li>
            <li>&nbsp&nbsp&nbsp&nbsp&nbsp</li>
          </ul>
        </div><!-- /.nav-collapse -->
    </nav><!-- /.navbar -->