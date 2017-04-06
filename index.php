<html lang="fr">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>COOKMS</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>
  <nav class="white" role="navigation">
    <div class="nav-wrapper container">
      <ul class="left hide-on-med-and-down">
        <li><a class="grey-text text-darken-4" href="index.php">Accueil</a></li>
        <li><a class="grey-text text-darken-4" href="recette.php">Recette</a></li>
      </ul>
      <ul class="right hide-on-med-and-down">
            <li><a class="grey-text text-darken-4" href="inscription.php">S'inscrire</a><li>
            <li><a class="grey-text text-darken-4" href="connection.php">Se connecter</a></li>
      </ul>

      <ul id="nav-mobile" class="side-nav">
        <li><a class="grey-text text-darken-4" href="index.php">Accueil</a></li>
        <li><a class="grey-text text-darken-4" href="recette.php">Recette</a></li>
        <li><a class="grey-text text-darken-4" href="inscription.php">S'inscrire</a></li>
        <li><a class="grey-text text-darken-4" href="connection.php">Se connecter</a></li>
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
  </nav>

  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <br><br>
      <h1 class="header center indigo-text text-darken-4">CookMS</h1>
        <!-- Oui Photo Slider-->
            <div class="slider">
    <ul class="slides">
      <li>
        <img src="http://static1.terrafemina.com/articles/7/17/80/37/@/172187-pornfood-les-chefs-ne-supportent-plus-quon-prenne-en-photo-leurs-plats--622x0-1.jpg"> <!-- random image -->
        <div class="caption center-align">
          <h3>Miam</h3>
          <h5 class="light grey-text text-lighten-3">Sa donne faim.</h5>
        </div>
      </li>
      <li>
        <img src="http://img.over-blog-kiwi.com/1/14/48/83/20160815/ob_a312d9_food-porn-waffles-edition.jpg"> <!-- random image -->
        <div class="caption left-align">
          <h3>Left Aligned Caption</h3>
          <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
        </div>
      </li>
      <li>
        <img src="http://www.yearn-magazine.fr/wp-content/uploads/2015/11/foodies-food-porn-blog-diy-do-it-yourself-6.jpg"> <!-- random image -->
        <div class="caption right-align">
          <h3>Right Aligned Caption</h3>
          <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
        </div>
      </li>
      <li>
        <img src="http://img.izismile.com/img/img5/20120728/640/crazy_food_porn_part_5_640_32.jpg"> <!-- random image -->
        <div class="caption center-align">
          <h3>This is our big Tagline!</h3>
          <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
        </div>
      </li>
    </ul>
  </div>
        <!-- Fin Slidder-->
      <div class="row center">
        <h5 class="header col s12 light">Une plateform de gestion de recette en ligne</h5>
      </div>
      <div class="row center">
        <a href="" id="download-button" class="btn-large waves-effect waves-light brown darken-4 ">S'inscrire</a>
      </div>
      <br><br>

    </div>
  </div>


  <div class="container">
    <div class="section">

      <!--   Icon Section   -->
      <div class="row">
        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center black-text"><i class="material-icons">flash_on</i></h2>
            <h5 class="center">Rapide</h5>

            <p class="light">Blablabla</p>
          </div>
        </div>

        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center black-text"><i class="material-icons">group</i></h2>
            <h5 class="center">Concentrer sur l'expérience utilisateur</h5>

            <p class="light">Blabla User Friendly</p>
          </div>
        </div>

        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center black-text"><i class="material-icons">settings</i></h2>
            <h5 class="center">Facile à utiliser</h5>

            <p class="light">Blabla</p>
          </div>
        </div>
      </div>

    </div>
    <br><br>

    <div class="section">

    </div>
  </div>

<?php
include("page/footer.html");
?>

  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>

  </body>
</html>
<script>
  $(document).ready(function(){
      $('.slider').slider();
    });
</script>