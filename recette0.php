<?php
include("page/header.html");
$id_r = $_GET["id"];

try
{
    // On se connecte à MySQL
    $bdd = new PDO('mysql:host=localhost;dbname=ProjetCMS;charset=utf8', 'root', 'root');
}
catch(Exception $e)
{
    // En cas d'erreur, on affiche un message et on arrête tout
    die('Erreur : '.$e->getMessage());
}

$req = $bdd->prepare('SELECT * FROM Recette WHERE id_recette = ?');
$req->execute(array($id_r));

$req2 = $bdd->prepare('SELECT Commentaire.commentaire,Commentaire.date_commentaire,Commentaire.id_utilisateur,Commentaire.like_commentaire,Utilisateur.pseudo,Commentaire.id_commentaire FROM Commentaire 
                    INNER JOIN Utilisateur ON Utilisateur.id_utilisateur = Commentaire.id_utilisateur
                    WHERE id_recette = ?
                    ORDER BY Commentaire.like_commentaire DESC,Commentaire.date_commentaire');
$req2->execute(array($id_r));

$req3 = $bdd->prepare('select quantite, label from Ingredient inner join contient on Ingredient.id_ingredient = contient.id_ingredient where contient.id_recette = ?');
$req3->execute(array($id_r));

$req4 = $bdd->prepare('select label from Tag inner join TJ_Tag_Recette on Tag.id_tag = TJ_Tag_Recette.id_tag where TJ_Tag_Recette.id_recette = ?');
$req4->execute(array($id_r));


while ($donnees = $req->fetch())
{
?>
<body>
<div class="container">
    <div class="section">
        <div class="row">
            <div class="col l3 ">
                <img class="materialboxed center-block"  height="300" width="300" src="<?php echo $donnees['adresse_photo']; ?>" >
            </div>

            <div class="col l5 offset-l1">
                <h5 class="center"><?php echo $donnees['titre_recette']; ?> </h5>
                <p class="black-text text-darken-4"><?php echo $donnees['description']; ?></p>
                <p class="black-text">Contient: <?php echo $donnees['contenu']; ?></p>
                <?php while ($donnees3 =$req3->fetch())
                {?>
                    <p class="black-text"><?php echo $donnees3['quantite'] ." x ".$donnees3['label'] ; ?></p>
                <?php } ?>

                <p class="black-text">Tag:
                    <?php while ($donnees4 =$req4->fetch())
                    {?>
                    <?php echo $donnees4['label'] ; ?></p>
            <?php } ?>

            </div>
        </div>

        <!-- COMMENTAIRE -->
        <div class="row">
            <div class=" center col l12">
                <h5 class="center red-text">Commentaires:</h5>

                <?php
                while ($donnees2 = $req2->fetch())
                {
                    echo "<p>Date: <strong>".$donnees2['date_commentaire']."</strong>";?><br /><?php
                    echo "Utilisateur:<strong>".$donnees2['pseudo']."</strong>";?><br /><?php
                    echo "<strong>".$donnees2['commentaire']."</strong>";?><br />
                    <?php echo " Il y a : ".$donnees2['like_commentaire']." likes ";?></p> <br />

                    <?php
                }

                ?>

            </div>
        </div>
        <?php
        }
        $req->closeCursor(); // Termine le traitement de la requête
        $req2->closeCursor();
        ?>
    </div>
</div>
<?php
include("page/footer.html");
?>
</body>
</html>
