<?php
session_start(); 
?>
<!DOCTYPE html>
<html>
<head >
    <meta name="viewport"content="width-device-width,initial-acale+1.0">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <link rel= "stylesheet" media="screen" href="css/style.css"type="text/css">
    <link rel="stylesheet" href="fontawesome-free-6.4.2-web\css\all.min.css">
    <link rel="stylesheet" href="bootstrap-5.1.3-dist/css/bootstrap.min.css">
    <title>Page d'accueil avec dashboard</title>
    <?php
    function compter_nbre_emprunts(){
include('connexion.php');

// Compter le nombre d'équipements
$sql = "SELECT COUNT(*) AS count FROM emprunt";
$stmt = $db->prepare($sql);
$stmt->execute();
$result = $stmt->fetch();

    $nombre_emprunts = $result['count'];
    echo $nombre_emprunts;
}


function compter_nbre_user(){
include('connexion.php');

// Compter le nombre d'équipements
$sql = "SELECT COUNT(*) AS count FROM user";
$stmt = $db->prepare($sql);
$stmt->execute();
$result = $stmt->fetch();

    $nombreuser = $result['count'];
    echo $nombreuser;}


    function compter_nbre_filieres(){
        include('connexion.php');
        
        // Compter le nombre d'équipements
        $sql = "SELECT COUNT(*) AS count FROM filiere";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch();
        
            $nombre_filiere= $result['count'];
            echo $nombre_filiere;}
?>
</head>
<body>
    <?php
        include'header.php';
    ?>
    <main class="main">
    <?php
        include'navigation.php';
    ?>
    <?php $nombreEquipements=""; ?>
    <div class="content">
        <div class="main--content">
            <div class="card--container">
                <div class="card--wrapper">
                    <div class="card--wrapper1">
                        <div class="dashbord">
                            <div class="card--header">
                                <div class="amount">
                                    <span class="tittle">Nombre d'emprunts</span>
                                    <span class="vp-values"><?php compter_nbre_emprunts(); ?></span> 
                                    <i class="fas fa-handshake icon"></i>
                                </div>
                            </div>
                        </div>   
                        <div class="dashbord">
                            <div class="card--header">
                                <div class="amount">
                                    <span class="tittle">Nombre utilisateurs</span>
                                    <span class="vp-values"> <?php compter_nbre_user(); ?></span> 
                                    <i class="fas fa-user icon"></i>
                                </div>
                                
                            </div>
                        </div>   
                        <div class="dashbord">
                            <div class="card--header">
                                <div class="amount">
                                    <span class="tittle">Nombre filieres</span>
                                    <span class="vp-values"> <?php compter_nbre_filieres(); ?></span> 
                                    <i class="fas fa-university icon"></i>
                                </div>
                            </div>
                        </div>   
                    </div> 
                    <div class="card--wrapper2">   
                        <div class="dashbord">
                            <div class="card--header">
                                <div class="amount">
                                    <span class="tittle">climatiseurs en cours de reparation</span>
                                    <span class="vp-values">10</span> 
                                    <i class="fas fa-cloud icon"></i>
                                </div>
                            </div>   
                        </div>
                        <div class="dashbord">
                            <div class="card--header">
                                <div class="amount">
                                    <span class="tittle">climatiseurs repares</span>
                                    <span class="vp-values">10</span> 
                                    <i class="fas fa-cloud icon"></i>
                                </div>
                            </div>    
                        </div>
                        <div class="dashbord">
                            <div class="card--header">
                                <div class="amount">
                                    <span class="tittle">impressions effectues</span>
                                    <span class="vp-values">19</span> 
                                    <i class="fas fa-print icon"></i>
                                </div>
                            </div>
                        </div>   
                    </div>       
                </div>
            </div>
    </div>
        <div class="liste">
        <a href="Emprunt.php"class="btn btn-dark my-6"name="enre" id="ajout" custom-width>Ajouter un emprunt</a>

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
          </table></div>
                </div>
    </main>
    
    <div class="footer">
        <?php
            include'footer.php';
        ?>
    </div>
</body>
</html>