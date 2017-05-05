<?php
require_once("controller/dbconfig.php");
require_once("controller/session.php");
require_once("controller/class.php");

if ($_SESSION['user_session']!= null)
    include("page/header1.php");

?>
<div class="container">
    <div class="section">

        <!--   Recette  -->
        <div class="row">
            <div class="col l3 ">
                <img class="materialboxed" width="300" src="img/burger.png">
            </div>

            <div class="col l5 ">
                <h5 class="center">Burger</h5>

                <p class="grey-text text-darken-4">Miam</p>
                <p><a class="grey-text" href="#">Voir la recette</a></p>
            </div>
        </div>
        <!-- Fin de recette 1 -->
        <div class="row">
            <div class="col l3 ">
                <img class="materialboxed" width="300" src="img/burger.png">
            </div>

            <div class="col l5 ">
                <h5 class="center">Burger</h5>

                <p class="grey-text text-darken-4">Miam</p>
                <p><a class="grey-text" href="#">Voir la recette</a></p>
            </div>
        </div>

    </div>
    <br><br>

</div>

<?php
include("page/footer.html");
?>
<!--  Scripts-->
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="js/materialize.js"></script>
<script src="js/init.js"></script>

</body>
</html>