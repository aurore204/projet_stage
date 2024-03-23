<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="fontawesome-free-6.4.2-web\css\all.min.css">
    <link rel="stylesheet" href="bootstrap-5.1.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/lsts_materiels.css">
    <script src="https:cdn.jsdelivr.net/npm/@popperjs/core@2..min.js/10.2/dist/umd/popper"></script>
        <script src="bootstrap-5.1.3-dist\js\bootstrap.min.js"></script>
    <title>Listes des equipements</title>
</head>
<body>
<?php
        include'header.php';
      ?>
      <main id="main">
        <div class="nav">
          <?php
            include'navigation_emprt.php';
          ?>
          <?php
            include("connexion.php");;
          ?>
         
        </div>
        <div class="container">
          <div class=" ">
            <h2>voici la liste des types d'emprunteurs</h2>
            <a href="ajout_emprunteur.php " class="fleche"><i class="fa fa-long-arrow-left" ></i></a>
            <div class="d-grid gap-5 d-md-flex justif-content-md-start">

            <a href="ajout_type_emprunteur.php"class="btn btn-danger my-6"name="enre" id="ajout" custom-width>Ajouter un type d'emprunteur</a>     
            <button class="btn btn-secondary my-6" data-bs-toggle="modal" data-bs-target="#modaladd"  name="imprimer" onclick="window.print()">imprimer</button>

            <table class="table table-bordered table-striped mt-3">
              <thead class="table-dark">
                <tr>
                  <th scope="col">ID type emprunteur</th>
                  <th scope="col">nom type emprunteur</th>
                  <th scope="col">Actions</th>
                </tr>
              </thead>
              <tbody class="table-group-divider">
              <?php  $sql="SELECT ID_type_emprunteur,nom_type_emprunteur from type_emprunteur";
                  $sql=$db->prepare($sql);
                $sql->execute();
                while($donnees=$sql->fetch(PDO::FETCH_ASSOC) ){
                  ?>
                <tr>
                  <th scope="row"><?php echo $donnees['ID_type_emprunteur'];?></th>
                  <td><?php echo $donnees['nom_type_emprunteur'];?></td>
                  <td>
                    <a href="update_type_emprunteur.php?ID=<?php echo $donnees['ID_type_emprunteur'];?>"class="m-2"><i class="fa fa-edit "></i></a>
                    <i class="fa fa-trash text-danger" data-bs-toggle="modal" class="bg-danger"
                    data-bs-target="#exampleModal<?php echo $donnees['ID_type_emprunteur'];?>" ></i>
                    <div class="modal fade" data-bs-backrop="static" data-bs-keyboard="false" tabindex="-1" aria-hiden="true" aria-labelledby="staticBackdropLbel"id="exampleModal<?php echo $donnees['ID_type_emprunteur'];?>" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <p>etes vous sur de supprimer ce type d'emprunteur?</p>
                                </div> 
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Annuler</button>
                                    <a href="delete_type_emprunteur.php?ID=<?php echo $donnees['ID_type_emprunteur'];?>">
                                    <button class="btn btn-danger" type="button">Confirmer</button></a>
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
          <script src="https:cdn.jsdelivr.net/npm/@popperjs/core@2..min.js/10.2/dist/umd/popper.min.js"></script>
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