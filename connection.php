<?php
session_start();
require_once('controller/class.php');
$login = new USER();

if($login->is_loggedin()!="")
{
  $login->redirect('interface.php');
}

if(isset($_POST['envoyer']))
{
  $uname = strip_tags($_POST['pseudo']);
  $upass = strip_tags($_POST['password']);

  if($login->doLogin($uname,$upass))
  {
    $login->redirect('interface.php');
  }
  else
  {
    echo"error";
  }
}
?>

<?php
include("page/header.html");
?>

<!-- FORMULAIRE POUR CONNEXION -->
  <div class="container">
    <form name="connection" method="post">
        <div class="row">
            <form class="col s12">
                <div class="row">
                    <div class="input-field col s2 offset-s5">
                        <i class="material-icons prefix">account_circle</i>
                        <input id="pseudo" type="text" class="validate" name="pseudo">
                        <label for="pseudo">Pseudo</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s2 offset-s5">
                        <i class="material-icons prefix">lock</i>
                        <input id="password" type="password" class="validate" name="password">
                        <label for="password">Mot de passe</label>
                    </div>
                </div>
                <div class="row col s2 offset-s6">
                    <button class="btn waves-effect teal-light brown" type="submit" name="envoyer">Enregistrer
                        <i class="material-icons right">send</i>
                    </button>
                </div>
            </form>
        </div>
    </form>
</div>

<!-- FIN DU FORMULAIRE -->
<?php
include("page/footer.html");
?>
  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>

  </body>
</html>