<?php

require_once ("../controller/session.php");
if($_SESSION['user_statut'] != 11){
    if($_SESSION['user_statut'] != 1){
        include("bdd.php");
        include ("header.php");
        afficherHeader("Interface Admin");
        include("navbar.php");

?>
<body>
<div class="container">
    <div class="section">
        <div class="row">
            <div class="col l12">
                Merci de vous être connecter sur la partie Administration du site.
            </div>
        </div>
    </div>
</div>

<?php
}
elseif ($_SESSION['user_statut'] == 1)
{
    session_destroy();
    unset($_SESSION['user_session']);
    ?>
    <a href="index.php">Vous ne pouvez pas vous connecter à la partie administration du site, vous n'en avez pas les droits.</a>
    <?php
}
}
else {
    session_destroy();
    unset($_SESSION['user_session']);
    ?>
    <a href="index.php">Vous ne pouvez pas vous connecter, vous avez été banni.</a>
    <?php
}
?>

</body>
</html>