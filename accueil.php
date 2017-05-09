<?php
include("page/header1.php");
?>
<body>
        <form method="POST">
        <div class="row">
            <div class="input-field col s1">
              <select name="mySelect" id="mySelect" class="browser-default">
                <option value="1">Date</option>
                <option value="2">Like</option>
              </select>
            </div>
            <div class="input-field col s2">
            <input type="submit" class="btn waves-effect waves-light" value="Validation">
            </div>
          </div>
                
          </form>
            <?php

            if (isset($_POST['mySelect'])) {
                $choix = $_POST['mySelect'];
            }

            try
            {
                // On se connecte à MySQL
                $bdd = new PDO('mysql:host=localhost:8889;dbname=ProjetCMS;charset=utf8', 'root', 'root');
            }
            catch(Exception $e)
            {
                // En cas d'erreur, on affiche un message et on arrête tout
                    die('Erreur : '.$e->getMessage());
            }

            // Si tout va bien, on peut continuer

            // On récupère tout le contenu de la table jeux_video
            $reponse = $bdd->query('SELECT * FROM Recette');

            // On affiche chaque entrée une à une
            if($choix == 2){
            while ($donnees = $reponse->fetch())
            {
            ?>
                <p>
                <strong>Recette n°</strong> : <?php echo $donnees['id_recette']; ?><br />
                <strong>Description</strong> : <?php echo $donnees['description']; ?><br />
                <strong>Contenu</strong> : <?php echo $donnees['contenu']; ?><br />
                <strong>Photo</strong> : <?php echo $donnees['adresse_photo']; ?><br />
                <strong>Etat</strong> : <?php echo $donnees['etat']; ?>
                <?php $req = $bdd->prepare('SELECT Commentaire.commentaire,Commentaire.date_commentaire,Commentaire.id_utilisateur,Commentaire.like_commentaire,Utilisateur.pseudo,Commentaire.id_commentaire FROM Commentaire 
                    INNER JOIN Utilisateur ON Utilisateur.id_utilisateur = Commentaire.id_utilisateur
                    WHERE id_recette = ?
                    ORDER BY Commentaire.like_commentaire DESC,Commentaire.date_commentaire');
                $req->execute(array($donnees['id_recette']));
                $id_recette = $donnees['id_recette'];
                ?>
                <form method="post" action="ajout_commentaire.php">
                <div class="row">
                    <div class="input-field col s2">
                      <input type="text" name="commentaire"<?php echo $id_recette; ?>>  
                    <input type="text" style="display:none;" name="id_recette" value=<?php echo $id_recette; ?>></input>
                    <input type="submit" class="btn waves-effect waves-light" name="ajout" value="Nouveau commentaire"<?php echo $id_recette; ?>>
                    <br /><br />
                    </div>

                  </div>
                </form>
                <?php
                while ($donnees2 = $req->fetch())
                    {
                        echo "Date: ".$donnees2['date_commentaire']." ";?><?php
                        echo "utilisateur: ".$donnees2['pseudo']." ";?><br /><?php
                        echo $donnees2['commentaire']; ?><br />
                        <form method="post" action="ajout_like.php">
                            <input type='submit' class="btn waves-effect waves-light" name='ajoutLike' value='LIKER'><?php echo " Il y a : ".$donnees2['like_commentaire']." likes ";?></input><input type='submit' class="btn waves-effect waves-light" name='suppLike' value='DISLIKER'></input><br /><br />
                            <input type="text" style="display:none;" name="id_commentaire" value=<?php echo $donnees2['id_commentaire']; ?>></input>
                        </form>

                        <?php
                    }

                    $req->closeCursor();
                ?>
              

                   </p>
                </form>
            <?php
            }

            $reponse->closeCursor(); // Termine le traitement de la requête
        }
            else
            {
                 while ($donnees = $reponse->fetch())
            {
            ?>
                <p>
                <strong>Recette n°</strong> : <?php echo $donnees['id_recette']; ?><br />
                <strong>Description</strong> : <?php echo $donnees['description']; ?><br />
                <strong>Contenu</strong> : <?php echo $donnees['contenu']; ?><br />
                <strong>Photo</strong> : <?php echo $donnees['adresse_photo']; ?><br />
                <strong>Etat</strong> : <?php echo $donnees['etat']; ?>
                <?php $req = $bdd->prepare('SELECT Commentaire.commentaire,Commentaire.date_commentaire,Commentaire.id_utilisateur,Commentaire.like_commentaire,Utilisateur.pseudo,Commentaire.id_commentaire FROM Commentaire 
                    INNER JOIN Utilisateur ON Utilisateur.id_utilisateur = Commentaire.id_utilisateur
                    WHERE id_recette = ?
                    ORDER BY Commentaire.date_commentaire DESC,Commentaire.like_commentaire');
                $req->execute(array($donnees['id_recette']));
                $id_recette = $donnees['id_recette'];
                ?>
                <form method="post" action="ajout_commentaire.php">
                <div class="row">
                    <div class="input-field col s2">
                      <input type="text" name="commentaire"<?php echo $id_recette; ?>>  
                    <input type="text" style="display:none;" name="id_recette" value=<?php echo $id_recette; ?>></input>
                    <input type="submit" class="btn waves-effect waves-light" name="ajout" value="Nouveau commentaire"<?php echo $id_recette; ?>>
                    <br /><br />
                    </div>

                  </div>
                </form>
                <?php
                while ($donnees2 = $req->fetch())
                    {
                        echo "Date: ".$donnees2['date_commentaire']." ";?><?php
                        echo "utilisateur: ".$donnees2['pseudo']." ";?><br /><?php
                        echo $donnees2['commentaire']; ?><br />
                        <form method="post" action="ajout_like.php">
                            <input type='submit' class="btn waves-effect waves-light" name='ajoutLike' value='LIKER'><?php echo " Il y a : ".$donnees2['like_commentaire']." likes ";?></input><input type='submit' class="btn waves-effect waves-light" name='suppLike' value='DISLIKER'></input><br /><br />
                            <input type="text" style="display:none;" name="id_commentaire" value=<?php echo $donnees2['id_commentaire']; ?>></input>
                        </form>

                        <?php
                    }

                    $req->closeCursor();
                ?>
              

                   </p>
                </form>
            <?php
            }

            $reponse->closeCursor(); // Termine le traitement de la requête

            }
            ?>

            <script>

            $(document).ready(function() {
            $('select').material_select();
            });
            </script>


    </body>

</html>
