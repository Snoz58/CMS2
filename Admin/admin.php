<?php 
include('header.php');
afficherHeader("visualisation de recette");

require_once("../controller/session.php");

require_once("../controller/class.php");
$auth_user = new USER();


$user_id = $_SESSION['user_session'];

$stmt = $auth_user->runQuery("SELECT pseudo FROM utilisateur WHERE id_utilisateur=:user_id");
$stmt->execute(array(":user_id"=>$user_id));

$userRow=$stmt->fetch(PDO::FETCH_ASSOC);


$reponse = $pdo->query('SELECT id_recette, description, titre_recette
                        FROM Recette
                        WHERE etat = "publie"');
$tableau = "";
while ($donnees = $reponse->fetch())
{
  $tableau .= "<tr>
                  <td>".$donnees["id_recette"]."</td>
                  <td>".$donnees["titre_recette"]."</td>
                  <td>".$donnees["description"]."</td>
                  <td><a href='recette.php?action=edit&id=".$donnees["id_recette"]."'><button class='btn'>Éditer</button></a>
               </tr>"; 

}

?>

    <h2>Recettes publiées</h2>           
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Id</th>
        <th>Titre</th>
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
