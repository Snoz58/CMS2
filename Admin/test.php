<?php

          echo "<pre>";
          var_dump($_FILES);
          echo "</pre>";
if(isset($_FILES['image']))
{ 
     $dossier = '../images/';
     $fichier = md5(uniqid()).strrchr($_FILES['image']['name'], '.');

     move_uploaded_file($_FILES['image']['tmp_name'], $dossier . $fichier);

}
?>


<form method="POST" action="test.php" enctype="multipart/form-data">
     Fichier : <input type="file" name="image">
     <input type="submit" name="envoyer" value="Envoyer le fichier">
</form>