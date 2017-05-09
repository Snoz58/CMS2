<?php 

include("header.php");

include("formrecette.php");

		echo "<pre>";
		var_dump($_POST);
		echo "</pre>";

if (isset($_GET['action'])){

	if ($_GET['action'] == "edit" && isset($_GET['id'])){

		afficherHeader("Editer recette"); 
		formrecette("edition", "recette.php", $_GET['id']);

	}
	else if ($_GET['action'] == "valid" && isset($_GET['id'])){

		afficherHeader("Valider recette"); 
		formrecette("validation", "recette.php", $_GET['id']);

	}
	else if ($_GET['action'] == "ajout"){

		afficherHeader("Ajouter recette"); 
		formrecette("ajout", "recette.php", 99999);

	}
	else {
		//header ('Location:admin.php');
	}
	

}
else {
	//header ('Location:admin.php');
}




 ?>