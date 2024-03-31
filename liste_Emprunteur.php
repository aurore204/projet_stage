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
    <title>Listes des emprunteurs</title>
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
            <h2>voici la liste des emprunteurs</h2>
            <a href="ajout_emprunteur.php " class="fleche"><i class="fa fa-long-arrow-left" ></i></a>
            <div class="liste">
            <a href="ajout_emprunteur.php"class="btn btn-success my-6"name="enre" id="ajout" custom-width>Ajouter un emprunteur</a></div>
            <button class="btn btn-secondary my-6" data-bs-toggle="modal" data-bs-target="#modaladd"  name="imprimer" onclick="window.print()">imprimer</button>

            <table class="table table-bordered table-striped mt-3">
              <thead class="table-dark">
                <tr>
                  <th scope="col">matricule emprunteur</th>
                  <th scope="col">nom emprunteur </th>
                  <th scope="col">Prenom emprunteur </th>
                  <th scope="col">Telephone emprunteur</th>
                  <th scope="col">Code filiere</th>
                  <th scope="col">nom type emprunteur</th>
                  <th scope="col">actions</th>

                </tr>
              </thead>
              <tbody class="table-group-divider">
                <?php
              $sql = "SELECT emprunteur.matricule_emprunteur, emprunteur.nom_emprunteur, emprunteur.prenom_emprunteur, emprunteur.tel_emprunteur, emprunteur.code_fil, type_emprunteur.nom_type_emprunteur
        FROM emprunteur, type_emprunteur, filiere
        WHERE emprunteur.ID_type_emprunteur = type_emprunteur.ID_type_emprunteur
        AND emprunteur.code_fil = filiere.code_fil";                 
         $sql=$db->prepare($sql);
                $sql->execute();
                while($donnees=$sql->fetch(PDO::FETCH_ASSOC) ){
                  ?>
                <tr>
                  <th scope="row"><?php echo $donnees['matricule_emprunteur'];?></th>
                  <td><?php echo $donnees['nom_emprunteur'];?></td>
                  <td><?php echo $donnees['prenom_emprunteur'];?></td>
                  <td><?php echo $donnees['tel_emprunteur'];?></td>
                  <td><?php echo $donnees['code_fil'];?></td>
                  <td><?php echo $donnees['nom_type_emprunteur'];?></td>
                  <td>
                    <a href="update_emprunteur.php?matricule=<?php echo $donnees['matricule_emprunteur'];?>"class="m-2"><i class="fa fa-edit "></i></a>
                    <i class="fa fa-trash text-danger" data-bs-toggle="modal" class="bg-danger"
                    data-bs-target="#exampleModal<?php echo $donnees['matricule_emprunteur'];?>" ></i>
                    <div class="modal fade" data-bs-backrop="static" data-bs-keyboard="false" tabindex="-1" aria-hiden="true" aria-labelledby="staticBackdropLbel"id="exampleModal<?php echo $donnees['matricule_emprunteur'];?>" role="dialog">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-body">
                            <p>etes vous sur de supprimer cet emprunteur?</p>
                          </div> 
                          <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Annuler</button>
                            <a href="delete_emprunteur.php?matricule=<?php echo $donnees['matricule_emprunteur'];?>">
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