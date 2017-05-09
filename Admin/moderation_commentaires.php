<?php 
include("header.php");
afficherHeader("Modération commentaires"); 


$reponse = $pdo->query('SELECT id_commentaire, commentaire, date_commentaire, like_commentaire, id_recette, pseudo
						FROM Commentaire
						INNER JOIN Utilisateur ON Utilisateur.id_utilisateur = Commentaire.id_utilisateur');
$tableau = "";
while ($donnees = $reponse->fetch())
{
	// echo "<pre>";
	//  var_dump($donnees);
	// echo "</pre>";

	echo "Commentaire #".$donnees["id_commentaire"]." | Recette #".$donnees["id_recette"]." | <span class='glyphicon glyphicon-user '></span> ".$donnees["pseudo"]." | <span class='glyphicon glyphicon-heart '></span> ".$donnees["like_commentaire"].
		"<blockquote><p>".$donnees["commentaire"]."</p></blockquote>
		<button type='button' class='btn btn-primary'>Répondre</button>
		<button type='button' class='btn btn-danger'>Modérer</button>
		<br /><br />";

	$tableau .= "<tr>
            			<td>".$donnees["id_commentaire"]."</td>
           				<td>".$donnees["id_recette"]."</td>
           				<td>".$donnees["like_commentaire"]."</td>
           				<td>".$donnees["pseudo"]."</td>
           				<td>".$donnees["commentaire"]."</td>
           				<td><button type='button' class='btn btn-primary'>Répondre</button>
    						<button type='button' class='btn btn-danger'>Modérer</button></td>
         			 </tr>"; 

}

?>

	  <h2>Modération</h2>           
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Id</th>
        <th>Recette</th>
        <th>Like</th>
        <th>Auteur</th>
        <th>Commentaire</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
		<?= $tableau ?>
    </tbody>
  </table>
</div>

</body>
</html>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>
</html>