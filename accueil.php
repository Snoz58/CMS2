<?php
include("page/header1.php");
?>
    <body>
        Accueil du site.

            <?php
            require_once("controller/session.php");
            require_once("controller/class.php");
            $user = new USER();




            // Si tout va bien, on peut continuer

            // On récupère tout le contenu de la table jeux_video
            $reponse = $user->runQuery('SELECT * FROM Recette');
            $reponse->execute();

            // On affiche chaque entrée une à une
            while ($donnees = $reponse->fetch())
            {
            ?>
                <p>
                <strong>Recette n°</strong> : <?php echo $donnees['id_recette']; ?><br />
                <strong>Description</strong> : <?php echo $donnees['description']; ?><br />
                <strong>Contenu</strong> : <?php echo $donnees['contenu']; ?><br />
                <strong>Photo</strong> : <?php echo $donnees['adresse_photo']; ?><br />
                <strong>Etat</strong> : <?php echo $donnees['etat']; ?>
                <?php $req = $user->runQuery('SELECT commentaire FROM commentaire WHERE id_recette = ?');
                $req->execute(array($donnees['id_recette']));
                $id_recette = $donnees['id_recette'];
                ?>
                <form method="post" action="ajout_commentaire.php">
                    <input type="text" name="commentaire"<?php echo $id_recette; ?>>  
                    <input type="text" style="display:none;" name="id_recette" value=<?php echo $id_recette; ?>></input>
                    <input type="submit" name="ajout" value="Ajout Commentaire"<?php echo $id_recette; ?>>
                    <br />
                </form>
                <?php
                while ($donnees2 = $req->fetch())
                    {
                        echo $donnees2['Commentaire']; ?><br />
                        <?php
                    }

                    $req->closeCursor();
                ?>
              

                   </p>
                </form>
            <?php
            }

            $reponse->closeCursor(); // Termine le traitement de la requête

            ?>
    </body>
</html>
