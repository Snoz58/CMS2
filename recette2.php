<?php
include("page/header1.php");
$choix = 1;
?>
<body>
<div class="container">
    <div class="section">

        <div class="row">
            <div class="col l12">
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
            </div>
        </div>
        <?php

        if (isset($_POST['mySelect'])) {
            $choix = $_POST['mySelect'];
        }

        try
        {
            // On se connecte à MySQL
            $bdd = new PDO('mysql:host=localhost;dbname=cms;charset=utf8', 'root', '');
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
        <div class="row">
            <div class="col l3 ">
                <img class="materialboxed" width="300" src="img/burger.png">
                <?php /* echo $donnees['adresse_photo']; */ ?>
            </div>

            <div class="col l5 ">
                <h5 class="center"> <?php echo $donnees['id_recette']; ?>: <?php echo $donnees['titre_recette']; ?> </h5>
                <p class="grey-text text-darken-4"><?php echo $donnees['description']; ?></p>
                <p><a class="grey-text" href="#">Contient: <?php echo $donnees['contenu']; ?></a></p>
                <p><a class="grey-text" href="#">Etat:<?php echo $donnees['etat']; ?></a></p>
            </div>
            <?php $req = $bdd->prepare('SELECT Commentaire.commentaire,Commentaire.date_commentaire,Commentaire.id_utilisateur,Commentaire.like_commentaire,Utilisateur.pseudo,Commentaire.id_commentaire FROM Commentaire 
                    INNER JOIN Utilisateur ON Utilisateur.id_utilisateur = Commentaire.id_utilisateur
                    WHERE id_recette = ?
                    ORDER BY Commentaire.like_commentaire DESC,Commentaire.date_commentaire');
            $req->execute(array($donnees['id_recette']));
            $id_recette = $donnees['id_recette'];
            ?>
        </div>
        <div class="row">
                <div class="col l12">
                    <form method="post" action="ajout_commentaire.php">
                        <div class="row">
                            <div class="input-field col s2">
                                <input type="text" name="commentaire" placeholder="Ajout de Commentaire" <?php echo $id_recette; ?>>
                                <input type="text" style="display:none;" name="id_recette" value=<?php echo $id_recette; ?>></input>
                                <input type="submit" class="btn waves-effect waves-light" name="ajout" value="Nouveau commentaire"<?php echo $id_recette; ?>>
                                <br /><br />
                            </div>

                        </div>
                    </form>
                </div>
            </div>

        <div class="row">
                <div class="col l12">
                    <?php
                    while ($donnees2 = $req->fetch())
                    {
                        echo "Date: ".$donnees2['date_commentaire']." ";?><br /><?php
                        echo "Utilisateur: ".$donnees2['pseudo']." ";?><br /><?php
                        echo $donnees2['commentaire']; ?><br />
                        <form method="post" action="ajout_like.php">
                            <input type='submit' class="btn waves-effect waves-light" name='ajoutLike' value='LIKER'><?php echo " Il y a : ".$donnees2['like_commentaire']." likes ";?></input><input type='submit' class="btn waves-effect waves-light" name='suppLike' value='DISLIKER'></input><br /><br />
                            <input type="text" style="display:none;" name="id_commentaire" value=<?php echo $donnees2['id_commentaire']; ?>></input>
                        </form>

                        <?php
                    }

                    $req->closeCursor();
                    ?>
                </div>
            </div>

        <?php
            }
            $reponse->closeCursor(); // Termine le traitement de la requête
            }
            else
            {
            while ($donnees = $reponse->fetch())
            {
        ?>
        <div class="row">
            <div class="col l3 ">
                <img class="materialboxed" width="300" src="img/burger.png">
                <?php /* echo $donnees['adresse_photo']; */ ?>
            </div>

            <div class="col l5 ">
                <h5 class="center"> <?php echo $donnees['id_recette']; ?>: <?php echo $donnees['titre_recette']; ?> </h5>
                <p class="grey-text text-darken-4"><?php echo $donnees['description']; ?></p>
                <p><a class="grey-text" href="#">Contient: <?php echo $donnees['contenu']; ?></a></p>
                <p><a class="grey-text" href="#">Etat:<?php echo $donnees['etat']; ?></a></p>
            </div>
            <?php $req = $bdd->prepare('SELECT Commentaire.commentaire,Commentaire.date_commentaire,Commentaire.id_utilisateur,Commentaire.like_commentaire,Utilisateur.pseudo,Commentaire.id_commentaire FROM Commentaire 
                    INNER JOIN Utilisateur ON Utilisateur.id_utilisateur = Commentaire.id_utilisateur
                    WHERE id_recette = ?
                    ORDER BY Commentaire.like_commentaire DESC,Commentaire.date_commentaire');
            $req->execute(array($donnees['id_recette']));
            $id_recette = $donnees['id_recette'];
            ?>
        </div>

        <div class="row">
            <div class="col l12">
                <form method="post" action="ajout_commentaire.php">
                    <div class="row">
                        <div class="input-field col s2">
                            <input type="text" name="commentaire" placeholder="Ajout de Commentaire" <?php echo $id_recette; ?>>
                            <input type="text" style="display:none;" name="id_recette" value=<?php echo $id_recette; ?>></input>
                            <input type="submit" class="btn waves-effect waves-light" name="ajout" value="Nouveau commentaire"<?php echo $id_recette; ?>>
                            <br /><br />
                        </div>

                    </div>
                </form>
            </div>
        </div>

        <div class="row">
            <div class="col l12">
                <?php
                while ($donnees2 = $req->fetch())
                {
                    echo "Date: ".$donnees2['date_commentaire']." ";?><br /><?php
                    echo "Utilisateur: ".$donnees2['pseudo']." ";?><br /><?php
                    echo $donnees2['commentaire']; ?><br />
                    <form method="post" action="ajout_like.php">
                        <input type='submit' class="btn waves-effect waves-light" name='ajoutLike' value='LIKER'><?php echo " Il y a : ".$donnees2['like_commentaire']." likes ";?></input><input type='submit' class="btn waves-effect waves-light" name='suppLike' value='DISLIKER'></input><br /><br />
                        <input type="text" style="display:none;" name="id_commentaire" value=<?php echo $donnees2['id_commentaire']; ?>></input>
                    </form>

                    <?php
                }

                $req->closeCursor();
                ?>
            </div>
        </div>

    </div>
</div>
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
