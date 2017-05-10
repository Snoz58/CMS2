<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="Admin/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="Admin/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Configuration initiale</h2>
  <h3>Base de donnée :</h3>
  <form action="INSTALL.php">
    <div class="form-group">
      <label for="dbName">Nom de la base de donnée</label>
      <input type="text" class="form-control" id="dbName" name="dbName">
    </div>
    <div class="form-group">
      <label for="dbUser">Login de la base de donnée</label>
      <input type="text" class="form-control" id="dbUser" name="dbUser">
    </div>
    <div class="form-group">
      <label for="dbpass">Mot de passe de la base de donnée</label>
      <input type="password" class="form-control" id="dbpass" name="dbpass">
    </div>
    <h3>Utilisateur :</h3>
    <p>Création du premier utilisateur (Admin)</p>
    <div class="form-group">
      <label for="login">Login admin</label>
      <input type="text" class="form-control" id="login" name="login">
    </div>
    <div class="form-group">
      <label for="email">Mot de passe admin</label>
      <input type="text" class="form-control" id="email" name="email">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" name="pwd">
    </div>
    <div class="checkbox">
      <label><input type="checkbox" name="remember"> Remember me</label>
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
</div>

</body>
</html>
