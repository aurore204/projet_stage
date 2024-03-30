<?php
session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="fontawesome-free-6.4.2-web\css\all.min.css">
    <link rel="stylesheet" href="bootstrap-5.1.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/lsts_materiels.css">
    <title>Listes des equipements</title>
</head>
<body>
<?php
        include'header.php';
      ?>
      <main id="main">
        <div class="nav">
          <?php
            include'navigation_equi.php';
          ?>
          <?php
            include("connexion.php");;
          ?>
         
        </div>
        <div class="container">
          <div class=" ">
            <h2>voici la liste des equipements</h2>
            <a href="liste_type_equipement.php " class="fleche"><i class="fa fa-long-arrow-left" ></i></a>
            <a href="ajout_type_equi.php"class="btn btn-info my-6"name="enre" id="ajout" custom-width>Ajouter un type d'equipement</a>
            <button class="btn btn-secondary my-6" data-bs-toggle="modal" data-bs-target="#modaladd"  name="imprimer" onclick="window.print()">imprimer</button>

            <table class="table table-bordered table-striped mt-3">
              <thead class="table-success">
                <tr>
                  <th scope="col">ID type equipement</th>
                  <th scope="col">nom type equipement </th>
                  <th scope="col">Actions</th>
                </tr>
              </thead>
              <tbody class="table-group-divider">
              <?php  $sql="SELECT id_type_equi,nom_type_equi from type_equipement";
                  $sql=$db->prepare($sql);
                $sql->execute();
                while($donnees=$sql->fetch(PDO::FETCH_ASSOC) ){
                  ?>
                <tr>
                  <th scope="row"><?php echo $donnees['id_type_equi'];?></th>
                  <td><?php echo $donnees['nom_type_equi'];?></td>

                  <td>
                    <a href="update_type_equipement.php?id=<?php echo $donnees['id_type_equi'];?>"class="m-2"><i class="fa fa-edit "></i></a>
                    <i class="fa fa-trash text-danger" data-bs-toggle="modal" class="bg-danger"
                    data-bs-target="#exampleModal<?php echo $donnees['id_type_equi'];?>" ></i>
                    <div class="modal fade" data-bs-backrop="static" data-bs-keyboard="false" tabindex="-1" aria-hiden="true" aria-labelledby="staticBackdropLbel"id="exampleModal<?php echo $donnees['id_type_equi'];?>" role="dialog">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-body">
                            <p>etes vous sur de supprimer ce type d'equipement?</p>
                          </div> 
                          <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Annuler</button>
                            <a href="delete_type_equi.php?id=<?php echo $donnees['id_type_equi'];?>">
                              <button class="btn btn-secondary" type="button">Confirmer</button></a>
                        </div>
                      </div>
                    </div>
                    </div>
                  </td>
                </tr>
                <?php }?>
            </tbody>
          </table>
          </div>  
        <script src="bootstrap-5.1.3-dist\js\bootstrap.min.js"></script>

      </div>
    </main>
    <div class="footer">
    <?php
      include('footer.php')
      ?>
        </div>
</body>
</html>