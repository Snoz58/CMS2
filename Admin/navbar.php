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
            <?php if($_SESSION["statut"] >= 2) { ?><li><a href="recette.php?action=ajout">Création</a></li><?php } ?>
            <?php if($_SESSION["statut"] >= 3) { ?><li><a href="validation_recette.php">Validation</a></li><?php } ?>
            <?php if($_SESSION["statut"] >= 3) { ?><li><a href="admin.php">Visualisation</a></li><?php } ?>
            <?php if($_SESSION["statut"] >= 4) { ?><li><a href="moderation_commentaires.php">Modération commentaires</a></li><?php } ?>
            <?php if($_SESSION["statut"] >= 4) { ?><li><a href="utilisateurs.php">Utilisateurs</a></li><?php } ?>
            <?php if($_SESSION["statut"] >= 4) { ?><li><a href="roles.php">Rôles</a></li><?php } ?>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><span class="glyphicon glyphicon-log-in"></span></a></li>
            <li>&nbsp&nbsp&nbsp&nbsp&nbsp</li>
          </ul>
        </div><!-- /.nav-collapse -->
    </nav><!-- /.navbar -->