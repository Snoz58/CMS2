<?php 

include("header.php");

include("formrecette.php");

		echo "<pre>";
		var_dump($_POST);
		echo "</pre>";

if (isset($_GET['submit'])){

	$_GET['action'] = "ajout";

	$titre = $_POST["titre"];
	$description = $_POST["description"];
	$contenu = $_POST["contenu"];
	$image = "";
	// $image = $_POST["image"];
	$etat = "soummis";
	$ingredient = $_POST["ingredient"];
	$quantite = $_POST["quantite"];
	$tag = $_POST["tag"];

	$reqRecette = "insert into Recette (titre_recette, description, contenu, adresse_photo, etat)  values ('".$titre."', '".$description."', '".$contenu."', '".$image."', '".$etat."')";
	
	$reqIngredient = "insert ignore into Ingredient (label)  values ";	
	for ($i=0; $i<sizeof($ingredient); $i++){
		$reqIngredient .= "('".$ingredient[$i]."'),";
	}
	$reqIngredient = substr($reqIngredient, 0, -1);

	$reqContient = "insert into contient values";

	for ($i=0; $i<sizeof($ingredient); $i++){

		$reqContient .= "(".$quantite[$i].", (
			select id_recette 
			from Recette
			where titre_recette = '".$titre."'
		), (
			select id_ingredient 
			from Ingredient
			where label = '".$ingredient[$i]."'
		),";
	}

	$reqContient .= ")";
	var_dump($tag);
	$reqTag = "insert ignore into Tag (label)  values ";	
	for ($i=0; $i<sizeof($tag); $i++){
		$reqTag .= "('".$tag[$i]."'),";
	}
	$reqTag = substr($reqTag, 0, -1);

	$reqTJ_Tag_Recette = "insert into TJ_Tag_Recette values";

	for ($i=0; $i<sizeof($tag); $i++){

		$reqTJ_Tag_Recette .= "((
			select id_tag 
			from tag
			where label = '".$tag[$i]."'
		), (
			select id_recette 
			from Recette
			where titre_recette = '".$titre."'
		),";
	}

	$reqTJ_Tag_Recette .= ")";

	echo $reqRecette;
	if ($pdo->exec($reqRecette))
		echo "1 ok";
	if ($pdo->exec($reqIngredient))
		echo "2 ok";
	if ($pdo->exec($reqTag))
		echo "3 ok";
	if ($pdo->exec($reqContient))
		echo "4 ok";
	if ($pdo->exec($reqTJ_Tag_Recette))
		echo "5 ok";
}

if (isset($_GET['action']) || isset($_GET['submit'])){

	if ($_GET['action'] == "edit" && isset($_GET['id'])){

		afficherHeader("Editer recette"); 
		formrecette("edition", "recette.php?submit=edit", $_GET['id']);
	}
	else if ($_GET['action'] == "valid" && isset($_GET['id'])){

		afficherHeader("Valider recette"); 
		formrecette("validation", "recette.php?submit=valid", $_GET['id']);

	}
	else if ($_GET['action'] == "ajout"){

		afficherHeader("Ajouter recette"); 
		formrecette("ajout", "recette.php?submit=ajout", 99999);

	}
	else {
		// header ('Location:admin.php');
	}
	

}
else {
	// header ('Location:admin.php');
}

 ?>