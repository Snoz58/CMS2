<?php 
include('header.php');
afficherHeader("Gestion des rôles");

	    if(!empty($_POST['Ajouter']) AND !empty($_POST['Niveau']) AND !empty($_POST['Description'])) {

	    	$value1 = $_POST['Niveau'];
	        $value2 = $_POST['Description'];

	        $stmt = $pdo->prepare("INSERT INTO statut (niveau, description) VALUES (:niveau, :description)");
	        $stmt->bindParam(':niveau', $value1);
	        $stmt->bindParam(':description', $value2);
	  
	        $stmt->execute();

	        $stmt->closeCursor();

	    }

	    if(!empty($_POST['Suppr']) AND !empty($_POST['DescriptionSuppression'])) {

	        $value1 = $_POST['DescriptionSuppression'];

	        $stmt = $pdo->prepare("DELETE FROM statut WHERE description = :description");
	        $stmt->bindParam(':description', $value1);
	  
	        $stmt->execute();

	        $stmt->closeCursor();

	    }

$reponse = $pdo->query('SELECT id_statut, niveau, description
						FROM statut
						ORDER BY niveau');

$tableau = "";

while ($donnees = $reponse->fetch())
{
  $tableau .= "<tr>
                  <td>".$donnees["niveau"]."</td>
                  <td>".$donnees["description"]."</td>
               </tr>"; 

}

?>

<div>
<h2>Gestion des rôles</h2>
	<form method="post">
		<input type="number" name="Niveau" placeholder="Niveau"></input>
		<input type="text" name="Description" placeholder="Description"></input>
		<input type='submit' name="Ajouter" class='btn btn-primary' Value="Add"></input>
		</div>
		<br /><br />
		<input type="text" name="DescriptionSuppression" placeholder="Statut à supprimer"></input>
		<input type='submit' name="Suppr" class='btn btn-danger' Value="Delete"></input>
	</form>             
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Niveau</th>
        <th>Description</th>
      </tr>
    </thead>
    <tbody>
    <?= $tableau ?>
    </tbody>
  </table>
</div>

    </div><!--/.container-->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../dist/js/bootstrap.min.js"></script>

  </body>
</html>
