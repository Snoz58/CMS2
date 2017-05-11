<?php 
include('header.php');
afficherHeader("Gestion des utilisateurs");

require_once("../controller/session.php");

require_once("../controller/class.php");
$auth_user = new USER();


$user_id = $_SESSION['user_session'];

$stmt = $auth_user->runQuery("SELECT pseudo FROM utilisateur WHERE id_utilisateur=:user_id");
$stmt->execute(array(":user_id"=>$user_id));

$userRow=$stmt->fetch(PDO::FETCH_ASSOC);

if(!empty($_POST['Bannir']) AND $_POST['niveau'] > 0) {

    $stmt = $pdo->prepare("UPDATE Utilisateur SET id_statut = 11 WHERE id_utilisateur = :id_utilisateur");

    $stmt->bindParam(':id_utilisateur', $_POST['user']);

    $stmt->execute();

    $stmt->closeCursor();

  }

  if(!empty($_POST['ChangeRole'])) {

    if($_POST['role'] == 11){
      
      $stmt = $pdo->prepare("UPDATE Utilisateur SET id_statut = 11 WHERE id_utilisateur = :id_utilisateur");

      $stmt->bindParam(':id_utilisateur', $_POST['user']);

      $stmt->execute();

      $stmt->closeCursor();

    }
    elseif($_POST['role'] == 1){

      $stmt = $pdo->prepare("UPDATE Utilisateur SET id_statut = 1 WHERE id_utilisateur = :id_utilisateur");

      $stmt->bindParam(':id_utilisateur', $_POST['user']);

      $stmt->execute();

      $stmt->closeCursor();
      
    }
    elseif($_POST['role'] == 2){

      $stmt = $pdo->prepare("UPDATE Utilisateur SET id_statut = 2 WHERE id_utilisateur = :id_utilisateur");

      $stmt->bindParam(':id_utilisateur', $_POST['user']);

      $stmt->execute();

      $stmt->closeCursor();
      
    }
    elseif($_POST['role'] == 3){

      $stmt = $pdo->prepare("UPDATE Utilisateur SET id_statut = 3 WHERE id_utilisateur = :id_utilisateur");

      $stmt->bindParam(':id_utilisateur', $_POST['user']);

      $stmt->execute();

      $stmt->closeCursor();
      
    }
    elseif($_POST['role'] == 4){

      $stmt = $pdo->prepare("UPDATE Utilisateur SET id_statut = 4 WHERE id_utilisateur = :id_utilisateur");

      $stmt->bindParam(':id_utilisateur', $_POST['user']);

      $stmt->execute();

      $stmt->closeCursor();
      
    }

  }

      if(!empty($_POST['ChangeMDP']) AND !empty($_POST['pwd'])){

      $new_password = password_hash($_POST['pwd'], PASSWORD_DEFAULT);

      $stmt = $pdo->prepare("UPDATE Utilisateur SET password = :password WHERE id_utilisateur = :id_utilisateur");

      $stmt->bindParam(':password', $new_password);
      $stmt->bindParam(':id_utilisateur', $_POST['user']);

      $stmt->execute();

      $stmt->closeCursor();


    }


$reponse = $pdo->query('SELECT id_utilisateur, pseudo, mail,statut.description,statut.niveau
						FROM Utilisateur
						INNER JOIN statut on statut.id_statut = utilisateur.id_statut
						ORDER BY id_utilisateur');

$tableau = "";

while ($donnees = $reponse->fetch())
{
  $tableau .= "<tr>
                <form method='POST'>
                  <td>".$donnees["id_utilisateur"]."</td>
                  <td>".$donnees["pseudo"]."</td>
                  <td>".$donnees["mail"]."</td>
                  <td>".$donnees["niveau"]." - ".$donnees["description"]."</td>
                  <td>
                  <select name='role' id='role'>
                    <option value='11'>Banni
                    <option selected value='1'>Membre
                    <option value='2'>Rédacteur
                    <option value='3'>Validateur
                    <option value='4'>Admin
                  </select>
                  <input type='submit' value='Change role' name='ChangeRole' class='btn btn-primary'></input>
                  <input type='text' name='pwd' placeholder='New Password'></input>
                  <input type='submit' value='Reset Password' name='ChangeMDP' class='btn btn-warning'></input>
                  <input type='submit' value='Bannir' name='Bannir' class='btn btn-danger'></input>
                  <input type='text' style='display:none;' name='user' value=".$donnees["id_utilisateur"]."></input>
                  <input type='number' style='display:none;' name='niveau' value=".$donnees["niveau"]."></input>
                  </td>    
               </form>
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

    </div>

    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  </body>
</html>