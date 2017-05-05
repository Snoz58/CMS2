<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Accueil</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
</head>
<body>
Accueil du site.

<?php
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
while ($donnees = $reponse->fetch())
{
    ?>
    <p>
        <strong>Recette n°</strong> : <?php echo $donnees['id_recette']; ?><br />
        <strong>Description</strong> : <?php echo $donnees['description']; ?><br />
        <strong>Contenu</strong> : <?php echo $donnees['contenu']; ?><br />
        <strong>Photo</strong> : <?php echo $donnees['adresse_photo']; ?><br />
        <strong>Etat</strong> : <?php echo $donnees['etat']; ?>
        <?php $req = $bdd->prepare('SELECT Commentaire FROM Commentaire WHERE id_recette = ?');
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
