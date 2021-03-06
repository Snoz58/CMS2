<?php
session_start();
require_once('controller/class.php');
$user = new USER();

if($user->is_loggedin()!="")
{
  $user->redirect('index.php');
}

if(isset($_POST['btn_envoyer']))
{
  $uname = strip_tags($_POST['pseudo']);
  $umail = strip_tags($_POST['mail']);
  $upass = strip_tags($_POST['password']);
  $uid_statut = '1';
  

    try
    {
      $stmt = $user->runQuery("SELECT pseudo FROM utilisateur WHERE pseudo=:uname");
      $stmt->execute(array( ':uname'=>$uname));
      $row=$stmt->fetch(PDO::FETCH_ASSOC);
        if($user->register($uname,$umail,$upass,$uid_statut)){
          $user->redirect('index.php');
        }
    }
    catch(PDOException $e)
    {
      echo $e->getMessage();
    }
}
?>

<?php
include("page/header.html");
?>

<!-- FORMULAIRE POUR INSCRIPTION -->
  <div class="container">
    <form name="register" method="post">
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
                        <i class="material-icons prefix">email</i>
                        <input id="mail" type="email" class="validate" name="mail">
                        <label for="mail">Email</label>
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
                    <button class="btn waves-effect teal-light brown" type="submit" name="btn_envoyer">Enregistrer
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
