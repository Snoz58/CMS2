<?php
        include 'accueil.php';

        if(!empty($_POST['commentaire'])){

            $stmt = $bdd->prepare("INSERT INTO Commentaire (commentaire, id_recette) VALUES (:commentaire, :id_recette)");
            $stmt->bindParam(':commentaire', $value1);
            $stmt->bindParam(':id_recette', $value2);

            // insertion d'une ligne
            $value1 = $_POST['commentaire'];
            $value2 = $_POST['id_recette'];

            $stmt->execute();
        }


