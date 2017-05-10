<?php
include("page/header.html");
?>
<body>
<div class="container">
    <div class="section">
        <?php

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

        // Si tout va bien, on peut continuer

        // On récupère tout le contenu de la table jeux_video
        $reponse = $bdd->query('SELECT * FROM Recette');

        // On affiche chaque entrée une à une
        while ($donnees = $reponse->fetch())
        {
            ?>
            <div class="row">
                <div class="col l3 ">
                    <img class="materialboxed"  height="300" width="300" src="<?php echo $donnees['adresse_photo']; ?>" >
                    <?php /* echo $donnees['adresse_photo']; */ ?>
                </div>

                <div class="col l5 offset-l1">
                    <h5 class="center"><?php echo $donnees['titre_recette']; ?> </h5>
                    <p class="black-text text-darken-4"><?php echo $donnees['description']; ?></p>
                    <p class="black-text">Contient: <?php echo $donnees['contenu']; ?></p>
                </div>

                <div class="col l5 offset-l1">
                    <p>
                        <?php $id_r = $donnees['id_recette'];
                        echo "<a class=\"blue-text\" href=\"recette0.php?id=".$id_r."\">Voir la recette</a>";
                        ?>
                    </p>
                </div>

            </div>

            <?php
        }
        $reponse->closeCursor(); // Termine le traitement de la requête
        ?>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('select').material_select();
    });
</script>
<?php
include("page/footer.html");
?>
  </body>
</html>