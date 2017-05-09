<?php 
include('header.php');
afficherHeader("validation de recette");


$reponse = $pdo->query('SELECT id_recette, description
            FROM Recette');
$tableau = "";
while ($donnees = $reponse->fetch())
{
  $tableau .= "<tr>
                  <td>".$donnees["id_recette"]."</td>
                  <td>".$donnees["description"]."</td>
                  <td><button type='button' class='btn btn-primary'>Répondre</button>
                <button type='button' class='btn btn-danger'>Modérer</button></td>
               </tr>"; 

}


 ?>

    <h2>Modération</h2>           
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Id</th>
        <th>Recette</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    <?= $tableau ?>
    </tbody>
  </table>
</div>

    </div><!--/.container-->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../dist/js/bootstrap.min.js"></script>

  </body>
</html>
