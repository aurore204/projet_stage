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
        <script src="bootstrap-5.1.3-dist\js\bootstrap.min.js"></script>
    <title>Listes des utilisateurs</title>
</head>
<body>
<?php
        include'header.php';
      ?>
      <main id="main">
        <div class="nav">
          <?php
            include'navigation_user.php';
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
            <h2>voici la liste des utilisateurs</h2>
            <a href="user.php " class="fleche"><i class="fa fa-long-arrow-left" ></i></a>
            <div class="liste">
            <a href="user.php"class="btn btn-danger my-6"name="enre" id="ajout" custom-width>Ajouter un utilisateur</a></div>
            <button class="btn btn-dark my-6" data-bs-toggle="modal" data-bs-target="#modaladd"  name="imprimer" onclick="window.print()">imprimer</button>

            <table class="table table-bordered table-striped mt-3">
              <thead class="table-secondary">
                <tr>
                  <th scope="col">id</th>
                  <th scope="col">nom user </th>
                  <th scope="col">Prenom user </th>
                  <th scope="col">Telephone user</th>
                  <th scope="col">mot passe </th>
                  <th scope="col">role</th>
                  <th scope="col">actions</th>


                </tr>
              </thead>
              <tbody class="table-group-divider">
              <?php  $sql="SELECT id_user,nom_user,prenom_user,tel_user,role_user,mot_passe_user from user";
                  $sql=$db->prepare($sql);
                $sql->execute();
                while($donnees=$sql->fetch(PDO::FETCH_ASSOC) ){
                  ?>
                <tr>
                  <th scope="row"><?php echo $donnees['id_user'];?></th>
                  <td><?php echo $donnees['nom_user'];?></td>
                  <td><?php echo $donnees['prenom_user'];?></td>
                  <td><?php echo $donnees['tel_user'];?></td>
                  <td><?php echo $donnees['mot_passe_user'];?></td>
                  <td><?php echo $donnees['role_user'];?></td>
                  <td>
                    <a href="update_user.php?id=<?php echo $donnees['id_user'];?>"class="m-2"><i class="fa fa-edit "></i></a>
                    <i class="fa fa-trash text-danger" data-bs-toggle="modal" class="bg-danger"
                    data-bs-target="#exampleModal<?php echo $donnees['id_user'];?>" ></i>
                    <div class="modal fade" data-bs-backrop="static" data-bs-keyboard="false" tabindex="-1" aria-hiden="true" aria-labelledby="staticBackdropLbel"id="exampleModal<?php echo $donnees['id_user'];?>" role="dialog">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-body">
                            <p>etes vous sur de supprimer cet utilisateur?</p>
                          </div> 
                          <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Annuler</button>
                            <a href="delete_user.php?id=<?php echo $donnees['id_user'];?>">
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