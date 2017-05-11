<?php

require_once("../controller/session.php");
if ($_SESSION['user_statut'] != 11 && $_SESSION['user_statut'] >= 4)
{
include("header.php");
afficherHeader("Modération commentaires");


require_once("../controller/class.php");
$auth_user = new USER();


$user_id = $_SESSION['user_session'];

$stmt = $auth_user->runQuery("SELECT pseudo FROM utilisateur WHERE id_utilisateur=:user_id");
$stmt->execute(array(":user_id"=>$user_id));

$userRow=$stmt->fetch(PDO::FETCH_ASSOC);

if(!empty($_POST['Moderer'])) {

    $value1 = $_POST['id_commentaire'];

    $stmt = $pdo->prepare("UPDATE commentaire SET etat_commentaire = 1 WHERE id_commentaire = :id_commentaire");
    $stmt->bindParam(':id_commentaire', $value1);

    $stmt->execute();

    $stmt->closeCursor();

}
    if(!empty($_POST['Retablir'])) {

        $value1 = $_POST['id_commentaire'];

        $stmt = $pdo->prepare("UPDATE commentaire SET etat_commentaire = 0 WHERE id_commentaire = :id_commentaire");
        $stmt->bindParam(':id_commentaire', $value1);

        $stmt->execute();

        $stmt->closeCursor();

    }


$reponse = $pdo->query('SELECT id_commentaire, commentaire, date_commentaire, like_commentaire, recette.id_recette, pseudo,recette.titre_recette
                        FROM Commentaire
                        INNER JOIN Utilisateur ON Utilisateur.id_utilisateur = Commentaire.id_utilisateur
           INNER JOIN Recette ON recette.id_recette = commentaire.id_recette
           WHERE etat_commentaire = 0');
    $reponse2 = $pdo->query('SELECT id_commentaire, commentaire, date_commentaire, like_commentaire, recette.id_recette, pseudo,recette.titre_recette
                        FROM Commentaire
                        INNER JOIN Utilisateur ON Utilisateur.id_utilisateur = Commentaire.id_utilisateur
           INNER JOIN Recette ON recette.id_recette = commentaire.id_recette
           WHERE etat_commentaire = 1');

$tableau = "";
$tableau1 ="";
while ($donnees = $reponse->fetch())
{
    // echo "<pre>";
    //  var_dump($donnees);
    // echo "</pre>";
    $tableau .= "<tr>
                 <form method='post'>
                        <td>".$donnees["id_commentaire"]."</td>
                        <td>".$donnees["id_recette"]."</td>
                        <td>".$donnees["titre_recette"]."</td>
                        <td>".$donnees["like_commentaire"]."</td>
                        <td>".$donnees["pseudo"]."</td>
                        <td>".$donnees["commentaire"]."</td>
                        <td>
               <input type='text' style='display:none;' name='id_commentaire' value=".$donnees["id_commentaire"]."></input>
                            <input type='submit' name='Moderer' class='btn btn-danger' Value='Modérer'></input><td></td>
               </form>
                     </tr>";

}
    while ($donnees2 = $reponse2->fetch())
    {
        // echo "<pre>";
        //  var_dump($donnees);
        // echo "</pre>";
        $tableau1 .= "<tr>
                 <form method='post'>
                        <td>".$donnees2["id_commentaire"]."</td>
                        <td>".$donnees2["id_recette"]."</td>
                        <td>".$donnees2["titre_recette"]."</td>
                        <td>".$donnees2["like_commentaire"]."</td>
                        <td>".$donnees2["pseudo"]."</td>
                        <td>".$donnees2["commentaire"]."</td>
                        <td>
               <input type='text' style='display:none;' name='id_commentaire' value=".$donnees2["id_commentaire"]."></input>
                            <input type='submit' name='Retablir' class='btn btn-primary' Value='Rétablir'></input><td></td>
               </form>
                     </tr>";

    }
?>


<h2>Modération</h2>
<table class="table table-striped">
    <thead>
    <tr>
        <th>Id</th>
        <th>Id_recette</th>
        <th>Recette</th>
        <th>Like</th>
        <th>Auteur</th>
        <th>Commentaire</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    <?= $tableau ?>
    <?= $tableau1 ?>
    </tbody>
</table>
</div>

</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>
</html>
<?php
}
else{
echo "<a href=\"interfaceadmin.php\">Vous n'avez pas accès a cette partie.</a>";
}
