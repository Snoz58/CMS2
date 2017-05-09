<?php
    
        include('accueil.php');

        if(!empty($_POST['commentaire'])){

            //$date = new date('Y-m-d H:i:s');
            $datenow =  date('Y-m-d H:i:s');

            // insertion d'une ligne
            $value1 = $_POST['commentaire'];
            $value2 = $datenow;
            $value3 = 0;
            $value4 = $_POST['id_recette'];
            $value5 = $_SESSION['user_session'];

            $stmt = $bdd->prepare("INSERT INTO Commentaire (commentaire, date_commentaire, like_commentaire, id_recette, id_utilisateur) VALUES (:commentaire, :date_commentaire, :like_commentaire, :id_recette, :id_utilisateur)");
            $stmt->bindParam(':commentaire', $value1);
            $stmt->bindParam(':date_commentaire', $value2);
            $stmt->bindParam(':like_commentaire', $value3);
            $stmt->bindParam(':id_recette', $value4);
            $stmt->bindParam(':id_utilisateur', $value5);
      
            $stmt->execute();

            $stmt->closeCursor();
        }

?>