<?php 
	include('header.php');

	<datalist id="ingredients">
		<option value="moutarde" />
		<option value="champignons" />
		<option value="jambon" />
		<option value="tomate" />
	</datalist>

	// recup ingredients
	$reponse = $pdo->query('SELECT label FROM Ingredient');
	$dataIngredients = '<datalist id="ingredients">';
	while ($donnees = $reponse->fetch()){
		$tabingredients[] = $donnees["label"];
	}

function formrecette($page, $action, $id){ 

	// recup ingredients
	$reponse = $pdo->query('SELECT label FROM Ingredient');
	while ($donnees = $reponse->fetch()){
		$tabingredients[] = $donnees["label"];
	}

	if ($page == "ajout"){

	}
	else if ($page == "validation" || $page == "edition") {

		// recup recette + ingredients + tags

		$values = [
		    "titre" => $titre,
		    "description" => $description,
		    "image" => $image,
		    "contenu" => $contenu,
		    "ingredients" => $ingredients,
		    "tags" => $tags,
		];
	}
?>
<form action="<?= $action ?>">
		<div class="row">
			<div class="col-lg-8">
				<div class="form-group">
					<label for="Titre">Titre</label>
					<input type="text" class="form-control" name="titre" id="Titre" placeholder="Titre de la recette" required>
				</div>
				<div class="form-group">
					<label for="description">Description</label>
					<textarea class="form-control" name="description" id="description" rows="3" placeholder="Description de la recette" required></textarea>
				</div>
				<div class="form-group">


					<label class="custom-file">
						<input type="file" id="file" class="custom-file-input">
						<span class="custom-file-control"></span>
					</label>

				</div>
				<div class="form-group">
					<label for="contenu">Contenu</label>
					<textarea class="form-control" name="contenu" id="contenu" rows="3" placeholder="Description de la recette"></textarea>
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
					<datalist id="ingredients">
						<option value="moutarde" />
						<option value="champignons" />
						<option value="jambon" />
						<option value="tomate" />
					</datalist>
				<div id="divIngredients" class="input-group double-input"></div>
				
				<label for="tag">Tags</label>
				<div class="input-group">

					<input class="form-control" id="tag" type="text" />
					<span class="input-group-btn">
						<button class="btn btn-success" onclick="ajoutTag()" type="button">+ Ajouter</button>
					</span>

				</div>
				<div id="tags" class="input-group double-input"></div>

			</div>
		</div>
			<button type="submit" class="btn btn-primary pull-right btn-lg">Soumettre la recette</button>
		</form>
<?php 
}
?>