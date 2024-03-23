<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="fontawesome-free-6.4.2-web\css\all.min.css">
    <link rel="stylesheet" href="bootstrap-5.1.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/lsts_materiels.css">
        <script src="bootstrap-5.1.3-dist\js\bootstrap.min.js"></script>
    <title>Listes des emprunts</title>
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
            include("connexion.php");
          ?>
         
        </div>
        <div class="container">
          <div class=" ">
            <h2>voici la liste des emprunts</h2>
            <a href="Emprunt.php " class="fleche"><i class="fa fa-long-arrow-left" ></i></a>
            <div class="d-grid gap-5 d-md-flex justif-content-md-start">
              <a href="Emprunt.php"class="btn btn-dark my-6"name="enre" id="ajout" custom-width>Ajouter un emprunt</a>
              <button class="btn btn-secondary my-6" data-bs-toggle="modal" data-bs-target="#modaladd"  name="imprimer" onclick="window.print()">imprimer</button>
              <a href="liste_non_eligibles.php"class="btn btn-info my-6"name="enre" id="ajout" custom-width>voir la liste des non eligibles</a>
</div>
            <table class="table table-bordered table-striped mt-3">
              <thead class="table-success">
                <tr>
                <th scope="col">ID emprunt</th>
                  <th scope="col">Nom emprunteur</th>
                  <th scope="col">nom equipement </th>
                  <th scope="col">Statut de l'emprunt</th>
                  <th scope="col">Etat de l'equipement</th>
                  <th scope="col">Date d'emprunt</th>
                  <th scope="col">Date de retour</th>
                  <th scope="col">actions</th>

                </tr>
              </thead>
              <tbody class="table-group-divider">
                <?php
                $sql = "SELECT emprunt.id_emprunt, emprunteur.nom_emprunteur, equipement.nom_equipement, emprunt.statut_emprunt, emprunt.etat_equipement, DATE_FORMAT(emprunt.date_emprunt, '%Y-%m-%d %H:%i:%s') AS date_emprunt,
                DATE_FORMAT(emprunt.date_retour, '%Y-%m-%d %H:%i:%s') AS date_retour
        FROM emprunt
        LEFT JOIN emprunteur ON emprunt.matricule_emprunteur = emprunteur.matricule_emprunteur
        LEFT JOIN equipement ON emprunt.id_equipement = equipement.id_equipement";

          
         $sql=$db->prepare($sql);
                $sql->execute();
                while($donnees=$sql->fetch(PDO::FETCH_ASSOC) ){
                  ?>
                <tr>
                  <th scope="row"><?php echo $donnees['id_emprunt'];?></th>
                  <td><?php echo $donnees['nom_emprunteur'];?></td>
                  <td><?php echo $donnees['nom_equipement'];?></td>
                  <td><?php echo $donnees['statut_emprunt'];?></td>
                  <td><?php echo $donnees['etat_equipement'];?></td>
                  <td><?php echo $donnees['date_emprunt'];?></td>
                  <td><?php echo $donnees['date_retour'];?></td>
                  <td>
                  <a href="update_emprunt.php?id=<?php echo $donnees['id_emprunt'];?>"class="m-2"><i class="fa fa-edit "></i></a>
                    <i class="fa fa-trash text-danger" data-bs-toggle="modal" class="bg-danger"
                    data-bs-target="#exampleModal<?php echo $donnees['id_emprunt'];?>" ></i>
                    <div class="modal fade" data-bs-backrop="static" data-bs-keyboard="false" tabindex="-1" aria-hiden="true" aria-labelledby="staticBackdropLbel"id="exampleModal<?php echo $donnees['id_emprunt'];?>" role="dialog">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-body">
                            <p>etes vous sur de supprimer cet emprunt?<</p>
                          </div> 
                          <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Annuler</button>
                            <a href="delete_emprunt.php?id=<?php echo $donnees['id_emprunt'];?>">
                              <button class="btn btn-info" type="button">Confirmer</button></a>
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