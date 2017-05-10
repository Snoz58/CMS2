    <nav class="navbar navbar-fixed-top navbar-inverse">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="admin.php">Administration - CookMS</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse container-fluid">
          <ul class="nav navbar-nav">
            <!-- <li><a href="ajout_recette.php">Création</a></li> -->
            <li><a href="recette.php?action=ajout">Création</a></li>
            <li><a href="validation_recette.php">Validation</a></li>
            <li><a href="moderation_commentaires.php">Modération commentaires</a></li>
            <li class="dropdown open">
            <li><a href="utilisateurs.php">Utilisateurs</a></li>
            <li><a href="roles.php">Rôles</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Logout</a></li>
          </ul>
        </div><!-- /.nav-collapse -->
    </nav><!-- /.navbar -->