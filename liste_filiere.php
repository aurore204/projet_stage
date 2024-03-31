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
    <script src="https:cdn.jsdelivr.net/npm/@popperjs/core@2..min.js/10.2/dist/umd/popper"></script>
        <script src="bootstrap-5.1.3-dist\js\bootstrap.min.js"></script>
    <title>Listes des filieres</title>
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
        <style>
        .liste a{
            float: right;
          }</style>
        <div class="container">
          <div class=" ">
            <h2>voici la liste des filieres d'IME</h2>
            <a href="ajout_filiere.php " class="fleche"><i class="fa fa-long-arrow-left" ></i></a>
            <div class="liste">
            <a href="ajout_filiere.php"class="btn btn-dark my-6"name="enre" id="ajout" custom-width>Ajouter une filiere</a>     </div>
            <button class="btn btn-secondary my-6" data-bs-toggle="modal" data-bs-target="#modaladd"  name="imprimer" onclick="window.print()">imprimer</button>

            <table class="table table-bordered table-striped mt-3">
              <thead class="table-primary">
                <tr>
                  <th scope="col">code de la filiere</th>
                  <th scope="col">nom de la filiere</th>
                  <th scope="col">Actions</th>
                </tr>
              </thead>
              <tbody class="table-group-divider">
              <?php  $sql="SELECT code_fil,nom_fil from filiere";
                  $sql=$db->prepare($sql);
                $sql->execute();
                while($donnees=$sql->fetch(PDO::FETCH_ASSOC) ){
                  ?>
                <tr>
                  <th scope="row"><?php echo $donnees['code_fil'];?></th>
                  <td><?php echo $donnees['nom_fil'];?></td>
                  <td>
                    <a href="update_filiere.php?code=<?php echo $donnees['code_fil'];?>"class="m-2"><i class="fa fa-edit b"></i></a>
                    <i class="fa fa-trash text-danger" data-bs-toggle="modal" class="bg-info"
                    data-bs-target="#exampleModal<?php echo $donnees['code_fil'];?>" ></i>
                    <div class="modal fade" data-bs-backrop="static" data-bs-keyboard="false" tabindex="-1" aria-hiden="true" aria-labelledby="staticBackdropLbel"id="exampleModal<?php echo $donnees['code_fil'];?>" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <p>etes vous sur de supprimer cette filiere?</p>
                                </div> 
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-info" data-bs-dismiss="modal">Annuler</button>
                                    <a href="delete_filiere.php?code=<?php echo $donnees['code_fil'];?>">
                                    <button class="btn btn-dark" type="button">Confirmer</button></a>
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