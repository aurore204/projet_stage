<?php
session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="fontawesome-free-6.4.2-web/css/all.min.css">
    <link rel="stylesheet" href="bootstrap-5.1.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/lsts_materiels.css">
    <script src="bootstrap-5.1.3-dist/js/bootstrap.min.js"></script>
    <title>Listes des emprunts</title>
</head>
<body>
    <?php
    include 'header.php';
    ?>
    <main id="main">
        <div class="nav">
            <?php
            include 'navigation_emprt.php';
            ?>
            <?php
            include "connexion.php";
            ?>
        </div>
        <div class="container">
            <div class=" ">
                <h2>Voici la liste des non eligibles</h2>
                <a href="liste_emprunts.php" class="fleche"><i class="fa fa-long-arrow-left"></i></a>
                <button class="btn btn-secondary my-6" data-bs-toggle="modal" data-bs-target="#modaladd" name="imprimer" onclick="window.print()">Imprimer</button>

                <table class="table table-bordered table-striped mt-3">
                    <thead class="table-danger">
                        <tr>
                            <th scope="col">Nom emprunteur</th>
                            <th scope="col">prenom emprunteur</th>
                            <th scope="col">Nom équipement</th>
                            <th scope="col">filiere</th>
                            <th scope="col">telephone</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        <?php
                        $sql = "SELECT e.nom_emprunteur, e.prenom_emprunteur, eq.nom_equipement, f.code_fil, e.tel_emprunteur
                        FROM emprunteur e
                        JOIN emprunt em ON e.matricule_emprunteur = em.matricule_emprunteur
                        JOIN equipement eq ON eq.id_equipement = em.id_equipement
                        JOIN filiere f ON f.code_fil = e.code_fil
                        WHERE em.statut_emprunt = 'en prêt'
                          AND em.date_retour < DATE_SUB(NOW(), INTERVAL 24 HOUR)";

                        $sql = $db->prepare($sql);
                        $sql->execute();
                        while ($donnees = $sql->fetch(PDO::FETCH_ASSOC)) {
                            ?>
                            <tr>
                                <th scope="row"><?php echo $donnees['nom_emprunteur']; ?></th>
                                <td><?php echo $donnees['prenom_emprunteur']; ?></td>
                                <td><?php echo $donnees['nom_equipement']; ?></td>
                                <td><?php echo $donnees['code_fil']; ?></td>
                                <td><?php echo $donnees['tel_emprunteur']; ?></td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>  
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
            <script src="bootstrap-5.1.3-dist/js/bootstrap.min.js"></script>
        </div>
    </main>
    <div class="footer">
        <?php
        include('footer.php')
        ?>
    </div>
</body>
</html>