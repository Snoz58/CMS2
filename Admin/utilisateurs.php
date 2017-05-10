<?php 
include('header.php');
afficherHeader("Gestion des utilisateurs");

$reponse = $pdo->query('SELECT id_utilisateur, pseudo, mail,statut.description,statut.niveau
						FROM Utilisateur
						INNER JOIN statut on statut.id_statut = utilisateur.id_statut
						ORDER BY id_utilisateur');

$tableau = "";

while ($donnees = $reponse->fetch())
{
  $tableau .= "<tr>
                  <td>".$donnees["id_utilisateur"]."</td>
                  <td>".$donnees["pseudo"]."</td>
                  <td>".$donnees["mail"]."</td>
                  <td>".$donnees["niveau"]." - ".$donnees["description"]."</td>
                  <td>
                  <form method='POST'>
                  <input type='submit' value='Change role' name='ChangeRole' class='btn btn-primary' data-toggle='modal' data-target='#modalRole'></input>
                  <input type='submit' value='Reset Password' name='ChangeMDP' class='btn btn-warning' data-toggle='modal' data-target='#modalPassword'></input>
                  <input type='submit' value='Bannir' name='Bannir' class='btn btn-danger'></input>
                  <form>
                  </td>
               </tr>"; 

}

?>

<div>
<h2>Gestion des utilisateurs</h2>
	          
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Id_Utilisateur</th>
        <th>Pseudo</th>
        <th>Mail</th>
        <th>Rôle</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    <?= $tableau ?>
    </tbody>
  </table>
</div>

    </div><!--/.container-->

    <!-- Modal -->
  <div class="modal fade" id="modalRole" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Changement du rôle utilisateur</h4>
        </div>
        <div class="modal-body">
          <form method="POST">
          	<input type="text" name="role" placeholder="Nouveau rôle">
          	<input type='submit' name="changeRole" class='btn btn-primary' Value="Validation">
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>

      <!-- Modal -->
  <div class="modal fade" id="modalPassword" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Changement du mot de passe utilisateur</h4>
        </div>
        <div class="modal-body">
        	<form method="POST">
	          <input type="text" name="pwd" placeholder="Nouveau mot de passe">
	          <input type='submit' name="changePwd" class='btn btn-primary' Value="Validation">
	        </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>

  <?php

  if(!empty($_POST['Bannir'])) {

  	

  }

  ?>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  </body>
</html>