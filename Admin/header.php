<?php
include("bdd.php");

function afficherHeader($title){

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?= $title ?></title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">

    <link href="css/style.css" rel="stylesheet">

	<!-- tinyMCE -->
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=8cyo4t3iin326cmnzyjf1mmd3yx812c960r5jlvefshagxsn"></script>

    <script src="js/bootstrap.min.js"></script>

	<title>Ajout de recette</title>

  </head>

  <body>
  	<?php include("navbar.php"); ?>
    <div class="container">

<?php  
}
?>