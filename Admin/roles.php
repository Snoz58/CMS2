<?php 
include('header.php');

require_once("../controller/session.php");

require_once("../controller/class.php");
$auth_user = new USER();


$user_id = $_SESSION['user_session'];

$stmt = $auth_user->runQuery("SELECT pseudo FROM utilisateur WHERE id_utilisateur=:user_id");
$stmt->execute(array(":user_id"=>$user_id));

$userRow=$stmt->fetch(PDO::FETCH_ASSOC);

afficherHeader("Gestion des rôles");

	    if(!empty($_POST['Suppr'])) {

	        $value1 = $_POST['niveauStatut'];

	        $stmt = $pdo->prepare("DELETE FROM statut WHERE niveau = :niveau");
	        $stmt->bindParam(':niveau', $value1);
	  
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
  				<form method='post'>
                  <td>".$donnees["niveau"]."</td>
                  <td>".$donnees["description"]."</td>
                  <td>
                  <input type='text' style='display:none;' name='niveauStatut' value=".$donnees["niveau"]."></input>
                  <input type='submit' name='Suppr' class='btn btn-danger' Value='Delete'></input><td>
                  </form>
               </tr>"; 

}

?>

<div>
<h2>Gestion des rôles</h2>          
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Niveau</th>
        <th>Description</th>
        <th>Action</th>
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
