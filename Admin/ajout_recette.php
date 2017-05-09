<?php 
include("header.php");
afficherHeader("Ajout recette"); 
	
echo "<pre>";
	var_dump($_GET);
echo "</pre>";
?>

		<form action="ajout_recette.php">
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

	</div> <!-- /container -->


	<script type="text/javascript" >
        var divIngredients = document.getElementById('divIngredients');
        var divtags = document.getElementById('tags');
        var id = 0;
        var tabIngredient = new Array();
		var varexiste = false;

        function existe(){

    	    for (var i = 0; i<id; i++){
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
			inputQuantite.name = "quantite["+id+"]";
			inputQuantite.required = "required";
			inputQuantite.className = "no-right-border form-control";

        	var inputIngredient = document.createElement("input");
            inputIngredient.value = value;
            inputIngredient.name = "ingredient["+id+"]";
            inputIngredient.required = "required";
            inputIngredient.className = "form-control";
            divIngredients.appendChild(inputQuantite);
            divIngredients.appendChild(inputIngredient);
            divIngredients.appendChild(document.createElement("br"));
            tabIngredient[id] = value;
            id += 1;

        }

        function ajoutTag() {
			var value = document.getElementById("tag").value;
			document.getElementById("tag").value = "";

        	var inputTag = document.createElement("input");
            inputTag.value = value;
            inputTag.name = "tag["+id+"]";
            inputTag.required = "required";
            inputTag.className = "form-control";

            divtags.appendChild(inputTag);
            divtags.appendChild(document.createElement("br"));
            id += 1;

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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>
</html>