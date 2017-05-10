<?php
    $id_r= $_GET["id"];
        include('liste2.php');

        function redir($url){
            echo '<script language="javascript">';
            echo 'window.location="',$url,'";';
            echo '</script>';
        }


            $value1 = $_POST['id_commentaire'];
            $value2 = $_SESSION['user_session'];

            $stmt2 = $bdd->prepare("SELECT COUNT(id_commentaire_utilisateur) FROM TJ_Commentaire_Utilisateur WHERE id_commentaire = :id_commentaire2 AND id_utilisateur = :id_utilisateur");

            $stmt2->bindParam(':id_commentaire2', $value1);
            $stmt2->bindParam(':id_utilisateur', $value2);

            $stmt2->execute();

            $number_of_rows = $stmt2->fetchColumn(); 

            $stmt2->closeCursor();

            echo $number_of_rows;

        if(!empty($_POST['ajoutLike'])) {

            if($number_of_rows == 0){

                $stmt = $bdd->prepare("UPDATE Commentaire SET like_commentaire = like_commentaire + 1 WHERE id_commentaire = :id_commentaire");

                $stmt->bindParam(':id_commentaire', $value1);
          
                $stmt->execute();

                $stmt->closeCursor();

                $stmt3 = $bdd->prepare("INSERT INTO TJ_Commentaire_Utilisateur (id_commentaire, id_utilisateur) VALUES (:id_commentaire3, :id_utilisateur2)");

                $stmt3->bindParam(':id_commentaire3', $value1);
                $stmt3->bindParam(':id_utilisateur2',$value2);
          
                $stmt3->execute();

                $stmt3->closeCursor();



            }
            else{
                echo "<script language='javascript'>";
                echo "alert('Vous avez déja like ce commentaire');";
                echo "</script>";
                
            }

            redir("./recette.php?id=".$id_r);

            }
        
        elseif (!empty($_POST['suppLike'])) {
            
            if($number_of_rows == 0){

                echo "<script language='javascript'>";
                echo "alert('Commentaire non like auparavant : Action inutile');";
                echo "</script>";
         }
         elseif($number_of_rows >= 1){

            $stmt4 = $bdd->prepare("UPDATE Commentaire SET like_commentaire = like_commentaire - 1 WHERE id_commentaire = :id_commentaire");

            $stmt4->bindParam(':id_commentaire', $value1);
      
            $stmt4->execute();

            $stmt4->closeCursor();

            $stmt5 = $bdd->prepare("DELETE FROM TJ_Commentaire_Utilisateur WHERE id_commentaire = :id_commentaire AND id_utilisateur = :id_utilisateur");

            $stmt5->bindParam(':id_commentaire', $value1);
            $stmt5->bindParam(':id_utilisateur',$value2);
      
            $stmt5->execute();

            $stmt5->closeCursor();
         }
         redir("./recette.php?id=".$id_r);

    }



?>

