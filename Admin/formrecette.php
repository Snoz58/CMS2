<?php 


// select * 
// from Recette 
// inner join TJ_Tag_Recette on TJ_Tag_Recette.id_recette = Recette.id_recette
// inner join Tag on Tag.id_tag = TJ_Tag_Recette.id_tag
// inner join contient on contient.id_recette = Recette.id_recette
// inner join Ingredient on Ingredient.id_ingredient = contient.id_ingredient
// where Recette.id_recette = 1


// select * 
// from Recette 
// where Recette.id_recette = 1

// select label 
// from Tag 
// inner join TJ_Tag_Recette on Tag.id_tag = TJ_Tag_Recette.id_tag
// where TJ_Tag_Recette.id_recette = 1

// select quantite, label 
// from Ingredient 
// inner join contient on Ingredient.id_ingredient = contient.id_ingredient
// where contient.id_recette = 1

// formrecette("validation", "validation", 2);

function formrecette($page, $action, $id){ 
		include('bdd.php');

	// recup ingredients
	$reponse = $pdo->query('SELECT label FROM Ingredient');
	$dataIngredients = '<datalist id="ingredients">';
	while ($donnees = $reponse->fetch()){
		$dataIngredients .= '<option value="'.$donnees["label"].'" />';
	}
	$dataIngredients .= '</datalist>';

	if ($page == "ajout"){

		$submit = "soumettre la recette";

		$values = [
		    "titre" => "",
		    "description" => "",
		    "image" => "",
		    "contenu" => "",
		    "ingredients" => "",
		    "tags" => "",
		];

	}
	else if ($page == "validation" || $page == "edition") {


		$submit = "valider la recette";

		// recup recette + ingredients + tags
		$reponse = $pdo->query('select * from Recette where Recette.id_recette = '.$id);
		while ($donnees = $reponse->fetch()){
			$titre = $donnees["titre_recette"]; 
			$description = $donnees["description"];
			$contenu = $donnees["contenu"];
			$image = $donnees["adresse_photo"];
		}

		$reponse = $pdo->query('select label from Tag inner join TJ_Tag_Recette on Tag.id_tag = TJ_Tag_Recette.id_tag where TJ_Tag_Recette.id_recette = '.$id);
		// $tags = array();
		// while ($donnees = $reponse->fetch()){ $tags[] = $donnees["label"];}
		$tags = "";
		$i = 0;
		while ($donnees = $reponse->fetch()){ $tags .= '<input name="tag['.$i.']" required="" class="form-control" value="'.$donnees["label"].'"><br>'; $i++;}

		$reponse = $pdo->query('select quantite, label from Ingredient inner join contient on Ingredient.id_ingredient = contient.id_ingredient where contient.id_recette = '.$id);
		// $ingredients = array();
		// while ($donnees = $reponse->fetch()){ $ingredients[$donnees["label"]] = $donnees["quantite"];}		
		$ingredients = "";
		$i = 0;
		while ($donnees = $reponse->fetch()){ $ingredients .= '<input placeholder="quantité" name="quantite['.$i.']" required="" class="no-right-border form-control" value="'.$donnees["quantite"].'"><input name="ingredient['.$i.']" required="" class="form-control" value="'.$donnees["label"].'"><br>';}		

		$values = [
		    "titre" => $titre,
		    "description" => $description,
		    "image" => $image,
		    "contenu" => $contenu,
		    "ingredients" => $ingredients,
		    "tags" => $tags,
		];
		// echo "<pre>";
		// var_dump($values);
		// echo "</pre>";

	}
?>
<form action="<?= $action ?>" method="POST">
		<div class="row">
			<div class="col-lg-8">
				<div class="form-group">
					<label for="Titre">Titre</label>
					<input type="text" class="form-control" name="titre" id="Titre" placeholder="Titre de la recette" required value="<?= $values["titre"]; ?>">
				</div>
				<div class="form-group">
					<label for="description">Description</label>
					<textarea class="form-control" name="description" id="description" rows="3" placeholder="Description de la recette" required ><?= $values["description"]; ?></textarea>
				</div>
				<div class="form-group">


					<label class="custom-file">
						<input type="file" id="file" class="custom-file-input">
						<span class="custom-file-control"></span>
					</label>

				</div>
				<div class="form-group">
					<label for="contenu">Contenu</label>
					<textarea class="form-control" name="contenu" id="contenu" rows="3" placeholder="Description de la recette" ><?= $values["contenu"]; ?></textarea>
				</div>
			</div>

			<div class="col-lg-4">
				<label for="ingredient">Ingrédients</label>
				<div class="input-group">

					<input class="form-control" list="ingredients" id="ingredient" type="text" />
					<span class="input-group-btn">
						<button class="btn btn-success" onclick="ajoutIngredient()" type="button">+ Ajouter</button>
					</span>

				</div>
					<?= $dataIngredients; ?>
				<div id="divIngredients" class="input-group double-input"><?= $values["ingredients"]; ?></div>
				
				<label for="tag">Tags</label>
				<div class="input-group">

					<input class="form-control" id="tag" type="text" />
					<span class="input-group-btn">
						<button class="btn btn-success" onclick="ajoutTag()" type="button">+ Ajouter</button>
					</span>

				</div>
				<div id="tags" class="input-group double-input"><?= $values["tags"]; ?></div>

			</div>
		</div>
			<button type="submit" class="btn btn-primary pull-right btn-lg" name="<?= $submit; ?>"><?= $submit; ?></button>
		</form>

			<script type="text/javascript" >
        var divIngredients = document.getElementById('divIngredients');
        var divtags = document.getElementById('tags');
        var idR = 0;
        var idT = 0;
        var tabIngredient = new Array();
		var varexiste = false;

        function existe(){

    	    for (var i = 0; i<idR; i++){
    			console.log(tabIngredient[i]);
    			if (tabIngredient[i] == value){
    				varexiste = true;
    			}
    		}
    		return varexiste;
        }

        function ajoutIngredient() {
			var value = document.getElementById("ingredient").value;
			document.getElementById("ingredient").value = "";

			//alert(existe());
			var inputQuantite = document.createElement("input");
			inputQuantite.placeholder = "quantité";
			inputQuantite.name = "quantite["+idR+"]";
			inputQuantite.required = "required";
			inputQuantite.className = "no-right-border form-control";

        	var inputIngredient = document.createElement("input");
            inputIngredient.value = value;
            inputIngredient.name = "ingredient["+idR+"]";
            inputIngredient.required = "required";
            inputIngredient.className = "form-control";
            divIngredients.appendChild(inputQuantite);
            divIngredients.appendChild(inputIngredient);
            divIngredients.appendChild(document.createElement("br"));
            tabIngredient[idR] = value;
            idR += 1;

        }

        function ajoutTag() {
			var value = document.getElementById("tag").value;
			document.getElementById("tag").value = "";

        	var inputTag = document.createElement("input");
            inputTag.value = value;
            inputTag.name = "tag["+idT+"]";
            inputTag.required = "required";
            inputTag.className = "form-control";

            divtags.appendChild(inputTag);
            divtags.appendChild(document.createElement("br"));
            idT += 1;

        }
    </script>

    <script type="text/javascript">
    	tinymce.init({
		  selector: 'textarea#contenu',
		  height: 500,
		  menubar: false,
		  plugins: [
		    'advlist autolink lists link image charmap print preview anchor',
		    'searchreplace visualblocks code fullscreen',
		    'insertdatetime media table contextmenu paste code'
		  ],
		  toolbar: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
		  content_css: '//www.tinymce.com/css/codepen.min.css'
		});
    </script>
<?php 
}
?>