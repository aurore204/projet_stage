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
        <style>
        .liste a{
            float: right;
          }</style>
        <div class="container">
          <div class=" ">
            <h2>voici la liste des equipements</h2>
            <a href="accueil.php " class="fleche"><i class="fa fa-long-arrow-left" ></i></a>
            <div class="liste">
            <a href="ajout_equipement.php"class="btn btn-success my-6"name="enre" id="ajout" custom-width>Ajouter un materiel</a></div>
            <button class="btn btn-secondary my-6" data-bs-toggle="modal" data-bs-target="#modaladd"  name="imprimer" onclick="window.print()">imprimer</button>

            <table class="table table-bordered table-striped mt-3">
              <thead class="table-dark">
                <tr>
                  <th scope="col">ID materiel</th>
                  <th scope="col">nom Materiel </th>
                  <th scope="col">Quantite de l'equipement </th>
                  <th scope="col">Quantite en stock de l'equipement </th>
                  <th scope="col">Nom du type d'equipement</th>
                  <th scope="col">Statut</th>
                  <th scope="col">Actions</th>
                </tr>
              </thead>
              <tbody class="table-group-divider">
              <?php   $sql = "SELECT equipement.id_equipement, 
               equipement.nom_equipement, 
               equipement.statut_equipement, 
               equipement.quantite_equipement,
               equipement.quantite_stock_equipement, 
               type_equipement.nom_type_equi
        FROM equipement
        LEFT JOIN type_equipement ON equipement.ID_type_equi = type_equipement.ID_type_equi";   
                  $sql=$db->prepare($sql);
                $sql->execute();
                while($donnees=$sql->fetch(PDO::FETCH_ASSOC) ){
                  ?>
                <tr>
                  <th scope="row"><?php echo $donnees['id_equipement'];?></th>
                  <td><?php echo $donnees['nom_equipement'];?></td>
                  <td><?php echo $donnees['quantite_equipement'];?></td>
                  <td><?php echo $donnees['quantite_stock_equipement'];?></td>
                  <td><?php echo $donnees['nom_type_equi'];?></td>

                  <td><?php echo $donnees['statut_equipement'];?></td>
                  <td>
                    <a href="update_equipement.php?id_equi=<?php echo $donnees['id_equipement'];?>"class="m-2"><i class="fa fa-edit "></i></a>
                    <i class="fa fa-trash text-danger" data-bs-toggle="modal" class="bg-danger"
                    data-bs-target="#exampleModal<?php echo $donnees['id_equipement'];?>" ></i>
                    <div class="modal fade" data-bs-backrop="static" data-bs-keyboard="false" tabindex="-1" aria-hiden="true" aria-labelledby="staticBackdropLbel"id="exampleModal<?php echo $donnees['id_equipement'];?>" role="dialog">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-body">
                            <p>etes vous sur de supprimer cet equipement?</p>
                          </div> 
                          <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Annuler</button>
                            <a href="delete_equip.php?id_equi=<?php echo $donnees['id_equipement'];?>">
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