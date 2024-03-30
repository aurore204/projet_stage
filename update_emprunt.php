<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="fontawesome-free-6.4.2-web\css\all.min.css">
    <link rel="stylesheet" href="bootstrap-5.1.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/insere_equipement.css" type="text/css">
    <title>Modification des types d'equiments</title>
    <?php
    function recuperer_emprunt(){

        global $id_emprunt,$nom_equipement,$statut_emprunt,$etat_equipement,$nom_emprunteur,$date_emprunt,$date_retour;

    try{
        include("connexion.php");
        // Préparer la requête SQL pour récupérer les informations de l'enregistrement du tableau
        $sql = "SELECT emprunt.id_emprunt,emprunteur.nom_emprunteur,equipement.nom_equipement,emprunt.statut_emprunt,emprunt.etat_equipement,emprunt.date_emprunt,emprunt.date_retour
        FROM emprunteur,emprunt,equipement WHERE id_emprunt = :id";
        $sql = $db->prepare($sql);
        $sql->bindvalue(':id', $id_emprunt);
        $sql->execute();
        // recuperer les donnees de l'enregistrement
        while ($donnees=$sql->fetch(PDO::FETCH_ASSOC)){
            $id_emprunt=$donnees['id_emprunt'];
            $nom_emprunteur=$donnees['nom_emprunteur'];
            $nom_equipement=$donnees['nom_equipement'];
            $statut_emprunt=$donnees['statut_emprunt'];
            $etat_equipement=$donnees['etat_equipement'];
            $date_emprunt=$donnees['date_emprunt'];
            $date_retour=$donnees['date_retour'];


        }
        // verification si l'enregistrement existe
        if(!$donnees){
            //echo"l'enregistrement avec l'id $id_equipement n'existe pas.";
            //exit;
        }
        //Affichage du formulaire de modification avec les donnees pre-remplies
       }
    catch(Exeption $e){
        die('Erreur:'.$e->getMessage());
    
        }}


        function Ajout_equipement(){
            global $id_equipement,$quantite_stock_equipement,$nom_equipement;
                try {
                    include("connexion.php");

                    // Requête pour mettre à jour le nombre d'équipements disponibles
                    $sql = "UPDATE equipement SET quantite_stock_equipement = quantite_stock_equipement + 1 WHERE id_equipement = :id_equipement and nom_equipement=:nom ";
                    $sql = $db->prepare($sql);
                    $sql->bindvalue(':id_equipement', $id_equipement);
                    $sql->bindvalue(':nom', $nom_equipement);

                    $sql->execute();
                    $sql->closecursor();
                } catch(Exception $e) {
                    die('Erreur:'.$e->getMessage()); // Échec : retourner false
                }
            }       
        

            function Modification_emprunt(){
                global $id_emprunt, $nom_equipement, $statut_emprunt, $etat_equipement, $nom_emprunteur, $date_emprunt, $date_retour;
            
                try {
                    include("connexion.php");
            
                    // Récupérer l'identifiant de l'équipement basé sur son nom
                    $sql_equipement = "SELECT id_equipement FROM equipement WHERE nom_equipement = :nom_equipement";
                    $stmt_equipement = $db->prepare($sql_equipement);
                    $stmt_equipement->bindValue(':nom_equipement', $nom_equipement);
                    $stmt_equipement->execute();
                    $row_equipement = $stmt_equipement->fetch(PDO::FETCH_ASSOC);
                    $id_equipement = $row_equipement['id_equipement'];
            
                    // Récupérer l'identifiant de l'emprunteur basé sur son nom
                    $sql_emprunteur = "SELECT matricule_emprunteur FROM emprunteur WHERE nom_emprunteur = :nom_emprunteur";
                    $stmt_emprunteur = $db->prepare($sql_emprunteur);
                    $stmt_emprunteur->bindValue(':nom_emprunteur', $nom_emprunteur);
                    $stmt_emprunteur->execute();
                    $row_emprunteur = $stmt_emprunteur->fetch(PDO::FETCH_ASSOC);
                    $matricule_emprunteur = $row_emprunteur['matricule_emprunteur'];
            
                    // Mettre à jour l'emprunt avec les nouvelles informations
                    $sql_update_emprunt = "UPDATE emprunt SET id_equipement = :id_equipement, statut_emprunt = :statut_emprunt, etat_equipement = :etat_equipement, matricule_emprunteur = :matricule_emprunteur, date_emprunt = :date_emprunt, date_retour = :date_retour WHERE id_emprunt = :id_emprunt";
                    $stmt_update_emprunt = $db->prepare($sql_update_emprunt);
                    $stmt_update_emprunt->bindValue(':id_emprunt', $id_emprunt);
                    $stmt_update_emprunt->bindValue(':id_equipement', $id_equipement);
                    $stmt_update_emprunt->bindValue(':statut_emprunt', $statut_emprunt);
                    $stmt_update_emprunt->bindValue(':etat_equipement', $etat_equipement);
                    $stmt_update_emprunt->bindValue(':matricule_emprunteur', $matricule_emprunteur);
                    $stmt_update_emprunt->bindValue(':date_emprunt', $date_emprunt);
                    $stmt_update_emprunt->bindValue(':date_retour', $date_retour);
                    $stmt_update_emprunt->execute();
            
                    echo "<h4><font color=blue> Modification réussie </font></h4>";
                } catch(Exception $e) {
                    die('Erreur : ' . $e->getMessage());
                }
            }
            
            
          ?>  
 
</head>
<body>
    <?php
         $id_emprunt="";
         $matricule_emprunteur="";
         $nom_emprunteur="";
         $id_equipement="";
         $nom_equipement="";
         $etat_equipement="";
         $statut_emprunt="";
         $date_emprunt="";
         $date_retour="";


    // Vérifier si le matricule est récupéré
    if(isset($_GET['id'])){
        $id_emprunt = $_GET['id'];
        recuperer_emprunt();
    }

            if(isset($_POST['id_emprunt'])){
                $id_emprunt=$_POST['id_emprunt'];
            }
            if(isset($_POST['nom_emprunteur'])){
                $nom_emprunteur=$_POST['nom_emprunteur'];
            }
            if(isset($_POST['matricule_emprunteur'])){
                $matricule_emprunteur=$_POST['matricule_emprunteur'];

            }
            if(isset($_POST['statut_emprunt'])){
                $statut_emprunt=$_POST['statut_emprunt'];
            }
            if(isset($_POST['etat_equipement'])){
                $etat_equipement=$_POST['etat_equipement'];
            }
            if(isset($_POST['id_equipement'])){
                $id_equipement=$_POST['id_equipement'];

            }
            if(isset($_POST['date_emprunt'])){
                // Convertir la date de format hh:mm:ss en format Y-m-d H:i:s
                $date_emprunt = date('Y-m-d H:i:s', strtotime($_POST['date_emprunt']));
            }
            if(isset($_POST['date_retour'])){
                // Convertir la date de format hh:mm:ss en format Y-m-d H:i:s
                $date_retour = date('Y-m-d H:i:s', strtotime($_POST['date_retour']));
            }
            if(isset($_POST['nom_equipement'])){
                $nom_equipement=$_POST['nom_equipement'];
            }
            if(isset($_POST['btnModifier_emprunt'])){
                Modification_emprunt();
                header("location:liste_emprunts.php");
            }
            if(isset($_POST['btnRetourner_equipement'])){
                Ajout_equipement();
                header("location:liste_emprunts.php");
            }
        ?>
<?php
     include'header.php';
?>
<main id="main">
    <div class="nav">
        <?php
             include'navigation_emprt.php';
        ?>
    </div>
    <style>
        .formulaire {
    background-color: #123; /* Couleur bleue pour le formulaire */
    padding: 30px;
    height:100%;
    border-radius: 10px; 
    color: ivory;
    width: 100%; /* Vous pouvez ajuster la largeur selon vos besoins */
    margin-top: 70px; /* Espacement par rapport au haut de la page */
    margin-left:30%;
}
.formulaire label{
    font-family:"times new roman";
    font-size:20px;
}
h1{
    margin-left:50%;
    color:#999;
    margin-top:40%;
}
#form{
    margin-left:-20vh
}
.formulaire a{
    text-decoration:none;
    color:#234;
}
.liste{
    font-family:"times new roman";

}
        </style>
        <div class="container py-3">
        <form action="update_emprunt.php" method="post" class="row col-8 m-5 g-3 form">
    <h1>Modifier un emprunt</h1>

    <div class="formulaire">
        <div class="col md-5">
            <label class="col-sm-5 control-label">id emprunt:</label>
            <div class="col-sm-12">
                <input type="text" placeholder="Ecrivez" name="id_emprunt" class="form-control" id="input2" value="<?php echo isset($_GET['id']) ? $_GET['id'] : $id_emprunt; ?>">
            </div>
        </div>
        <div class="col md-9">
            <label class="col-sm-5 control-label">nom emprunteur:</label>
            <div class="col-sm-12">
                <input type="text" name="nom_emprunteur" class="form-control" placeholder="Ecrivez" id="input2" value="<?php echo $nom_emprunteur;?>" required>
            </div>
        </div>
        <div class="col md-9">
            <label class="col-sm-5 control-label">nom de l'équipement:</label>
            <div class="col-sm-12">
                <input type="text" name="nom_equipement" class="form-control" placeholder="Ecrivez" id="input2" value="<?php echo $nom_equipement;?>" required>
            </div>
        </div>
        <div class="col md-5">
            <label class="col-sm-5 control-label">statut de l'emprunt:</label>
            <div class="col-sm-12">
                <input type="text" name="statut_emprunt" placeholder="Ecrivez" class="form-control" id="input2" value="<?php echo $statut_emprunt;?>" required>
            </div>
        </div>
        <div class="col md-5">
            <label class="col-sm-5 control-label">date d'emprunt:</label>
            <div class="col-sm-12">
                <input type="text" name="date_emprunt" class="form-control" id="input2" value="<?php echo $date_emprunt;?>" required>
            </div>
        </div>
        <div class="col md-5">
            <label class="col-sm-5 control-label">Date retour:</label>
            <div class="col-sm-12">
                <input type="time" name="date_retour" placeholder="Ecrivez" class="form-control" id="input2" value="<?php echo $date_retour;?>" required>
            </div>
        </div>
        <div class="col md-5">
            <label class="form-label">état de l'équipement:</label>
            <select class="form-select" name="etat_equipement">
                <option value="en bon état" <?php if ($etat_equipement == 'en bon état') echo 'selected'; ?>>en bon état</option>
                <option value="défectueux" <?php if ($etat_equipement == 'défectueux') echo 'selected'; ?>>défectueux</option>
            </select>
                    </div>
                 
                    
                        <div class="col md-5 pt-4">
                            <input type="submit" value="Modifier" name="btnModifier_emprunt" class="btn btn-secondary m-3 col-12">
                            <input type="submit" value="retourner" name="btnRetourner_equipement" class="btn btn-success m-3 col-12">

                        </div>
                    </div>
                </form>
        </div>
     </div>


        <script src="bootstrap-5.1.3-dist\js\bootstrap.min.js"></script>
       
</main>
        <div class="footer">
            <?php
                include('footer.php')
                ?>
        </div>

</body>
</html>