<?php
require_once ("controller/session.php");
if($_SESSION['user_statut'] != 11){

include("page/header1.php");
?>
<body>
<div class="container">
    <div class="section">
        <div class="row">
            <div class="col l12">
                Merci de vous être connectez.
            </div>
        </div>
    </div>
</div>

<?php
include("page/footer.html");
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