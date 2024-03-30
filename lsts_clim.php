<?php
session_start(); 
?>
<?php
include("connexion.php")?>
<html>
    <head>
        <link rel="stylesheet" href="css/lsts_clim.css" type="text/css">
        <link rel="stylesheet" href="fontawesome-free-6.4.2-web\css\all.min.css">
        <link rel="stylesheet" href="bootstrap-5.1.3-dist/css/bootstrap.min.css">
        <title> mon enregistrement</title>
    </head>
    <body>
        <?php
             include'header.php';
        ?>
        <main id="main">
            <div class="nav">
                <?php
                    include'navigation_m.php';
                ?>
            </div>
            <div class="container">
        <div class=" ">
          <h2>voici la liste des climatiseurs</h2>
          <a href=" enregistrement_clim.php"class="btn btn-secondary my-6"name="enre" id="ajout" custom-width>Ajouter un materiel</a>
          <button class="btn btn-warning my-6" data-bs-toggle="modal" data-bs-target="#modaladd"  name="imprimer" onclick="window.print()">imprimer</button>
          <table class="table table-striped mt-3">
            <thead class="table-primary">
              <tr>
                <th scope="col">#</th>
                <th scope="col">nomclimatiseur</th>
                <th scope="col">Numero maintenancier</th>
                <th scope="col">Salle de classe</th>
                <th scope="col">nomEtuiant</th>
                <th scope="col">Statut</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody class="table-group-divider">
              <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td>
                  <i class="fa fa-edit "></i>
                  <i class="fa fa-trash  red-icon"></i>

                </td>
              </tr>
              <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
                <td>
                  <i class="fa fa-edit "></i>
                  <i class="fa fa-trash  red-icon"></i>

                </td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td colspan="2">Larry the Bird</td>
                <td>@twitter</td>
                <td>
                  <i class="fa fa-edit "></i>
                  <i class="fa fa-trash  red-icon"></i>

                </td>
              </tr>
              <tr>
                <th scope="row">4</th>
                <td colspan="2">Larry the Bird</td>
                <td>@twitter</td>
                <td>
                  <i class="fa fa-edit "></i>
                  <i class="fa fa-trash red-icon"></i>

                </td>
              </tr>
            </tbody>
          </table>
          </div>  
      </div>
    </main>
    <div class="footer">
            <h1> voici mon application</h1>
        </div>
  </body>    
</html>