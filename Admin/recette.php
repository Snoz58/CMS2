<?php 

include("header.php");

require_once("../controller/session.php");

require_once("../controller/class.php");
$auth_user = new USER();


$user_id = $_SESSION['user_session'];

$stmt = $auth_user->runQuery("SELECT pseudo FROM utilisateur WHERE id_utilisateur=:user_id");
$stmt->execute(array(":user_id"=>$user_id));

$userRow=$stmt->fetch(PDO::FETCH_ASSOC);

include("formrecette.php");

		echo "<pre>";
		var_dump($_POST);
		echo "</pre>";

		echo "<pre>";
		var_dump($_FILES);
		echo "</pre>";


if (isset($_GET['submit'])){

	if ($_GET['submit'] == "ajout"){
		$_GET['action'] = "ajout";

	    $dossier = '../images/';
	    $fichier = md5(uniqid()).strrchr($_FILES['test']['name'], '.');

	    move_uploaded_file($_FILES['test']['tmp_name'], $dossier . $fichier);

		$titre = $_POST["titre"];
		$description = $_POST["description"];
		$contenu = $_POST["contenu"];
		$image = "images/".$fichier;
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
			)),";
		}
		$reqContient = substr($reqContient, 0, -1);

		$reqTag = "insert ignore into Tag (label)  values ";	
		for ($i=0; $i<sizeof($tag); $i++){
			$reqTag .= "('".$tag[$i]."'),";
		}
		$reqTag = substr($reqTag, 0, -1);

		$reqTJ_Tag_Recette = "insert into TJ_Tag_Recette values";

		for ($i=0; $i<sizeof($tag); $i++){

			$reqTJ_Tag_Recette .= "((
				select id_tag 
				from Tag
				where label = '".$tag[$i]."'
			), (
				select id_recette 
				from Recette
				where titre_recette = '".$titre."'
			)),";
		}
		$reqTJ_Tag_Recette = substr($reqTJ_Tag_Recette, 0, -2);
		$reqTJ_Tag_Recette .= ")";

		$pdo->exec($reqRecette);
		$pdo->exec($reqIngredient);
		$pdo->exec($reqTag);
		$pdo->exec($reqContient);
		$pdo->exec($reqTJ_Tag_Recette);

	}

	if ($_GET['submit'] == "valid" || $_GET['submit'] == "edit"){
		$_GET['action'] = "ajout";
		
		$titre = $_POST["titre"];
		$description = $_POST["description"];
		$contenu = $_POST["contenu"];
		// $image = "";
		// $image = $_POST["image"];
		$etat = "publie";
		$id = $_POST["idRecette"];

		$req = 'UPDATE Recette SET  titre_recette = "'.$titre.'",
							 description = "'.$description.'",
							 contenu = "'.$contenu.'",
					
							 etat = "'.$etat.'"
		WHERE id_recette = '.$id;

		$pdo->exec($req);

	}

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