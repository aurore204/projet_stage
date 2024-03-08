<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="fontawesome-free-6.4.2-web\css\all.min.css">
    <link rel="stylesheet" href="bootstrap-5.1.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/insere_equipement.css" type="text/css">
    <title>Modification equipement</title>
    <?php
    function recuperer_equipement(){
        global $id_equipement,$nom_equipement,$statut_equipement,$quantite_equipement ;
    
    try{
        include("connexion.php");
        // Vérifier si l'ID est défini dans l'URL et recuperation de l'id de l'enregistrement a modifier
        // Préparer la requête SQL pour récupérer les informations de l'enregistrement du tableau
        $sql = "SELECT id_equipement,nom_equipement,statut_equipement,quantite_equipement FROM equipement WHERE id_equipement = :id_equipement";
        $sql = $db->prepare($sql);
        $sql->bindvalue(':id_equipement', $id_equipement);
        $sql->execute();
        // recuperer les donnees de l'enregistrement
        while ($donnees=$sql->fetch(PDO::FETCH_ASSOC)){
            $nom_equipement=$donnees['nom_equipement'];
            $quantite_equipement=$donnees['quantite_equipement'];

            $statut_equipement=$donnees['statut_equipement'];
            echo"le statut est .$statut_equipement";

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

    function Modification_equipement(){
    global $id_equipement,$nom_equipement,$statut_equipement,$quantite_equipement ;

    try{
        include("connexion.php");
        $sql="UPDATE equipement set nom_equipement=:nom,statut_equipement=:statut,quantite_equipement=:quantite WHERE id_equipement=:id";
        $sql=$db->prepare($sql);
        $sql->bindvalue(':id',$id_equipement);
        $sql->bindvalue(':nom',$nom_equipement);
        $sql->bindvalue(':quantite',$quantite_equipement);
        $sql->bindvalue(':statut',$statut_equipement);
        $sql->execute();
        $donnees=$sql->fetch(PDO::FETCH_ASSOC);
        if($sql){
            echo"<h4><font color=blue> Modification reuissie </font></h4>";
        }
        else{
            echo"<h4><font color=red>Echec de Modification </font></h4>";

        }
        $sql->closecursor();
    }
    catch(Exeption $e){
        die('Erreur:'.$e->getMessage());
    } 
    
}

/* Vérifier si l'ID est défini dans l'URL
if(isset($_POST['id_equipement']) && !empty($_GET['id_equipement'])) {
    $donnees = getDonneesAModifier($_GET['id_equipement']);

    if($donnees !== false) {
        // Remplir les champs du formulaire avec les données récupérées
        $id_equipement = $donnees['id_equipement'];
        $nom_equipement = $donnees['nom_equipement'];
        $statut_equipement = $donnees['statut_equipement'];
    }}*/
    
  ?>  
</head>
<body>
    <?php
            $id_equipement="";
            $nom_equipement="";
            $equipement_equipement="";

            $statut_equipement="";
            if(isset($_GET['id'])){
                $id_equipement=$_GET['id'];
                recuperer_equipement();

            }
            if(isset($_POST['id_equipement'])){
                $id_equipement=$_POST['id_equipement'];
            }
            if(isset($_POST['nom_equipement'])){
                $nom_equipement=$_POST['nom_equipement'];
            }
            if(isset($_POST['quantite_equipement'])){
                $quantite_equipement=$_POST['quantite_equipement'];
            }
            if(isset($_POST['statut_equipement'])){
                $statut_equipement=$_POST['statut_equipement'];
            }
            if(isset($_POST['btnModifier_equipement'])){
                Modification_equipement();
                header("location:liste_equipement.php");
            }
        ?>
<?php
     include'header.php';
?>
<main id="main">
    <div class="nav">
        <?php
             include'navigation1.php';
        ?>
    </div>
        <div class="container py-3">
                <form action="update_equipement.php " method="post" class="row col-6 m-5 g-3 form "  id="form">
                    <h2>Modifier un  materiel</h2>
                    <div class="form-group">
<label for="input1" class="col-sm-2 control-label">id materiel:</label>
                        <div class="col-sm-12">
                            <input type="text "name="id_equipement" placeholder="ecrivez" class="form-control" id="input1" value="<?php echo $_GET['id'] ;?>">
                        <div>
                    <div>
                    <div class="form-group">
                    <label for="input2" class="col-sm-2 control-label">nom du materiel:</label>
                        <div class="col-sm-12">
                            <input type="text "name="nom_equipement" placeholder="ecrivez" class="form-control" id="input2" value="<?php echo $nom_equipement;?>">
                        <div>
                    <div>
                    <div class="form-group">
                    <label for="input2" class="col-sm-2 control-label">Quantite du materiel:</label>
                        <div class="col-sm-12">
                            <input type="text "name="quantite_equipement" placeholder="ecrivez" class="form-control" id="input2" value="<?php echo $quantite_equipement;?>">
                        <div>
                    <div>
                    <div  class="col md-5">
                    <label class="form-label">statut equipement</label>
                            <input type="text" name="statut_equipement" class="form-control" value="<?php echo $statut_equipement;?>">
                        </div> 
                        <div class="col md-5 pt-4">
                            <a href="liste_equipement.php"><input type="submit" value="Modifier" name="btnModifier_equipement"class="btn btn-primary m-3"></a>
                            <a href=" liste_equipement.php"><button class="btn btn-success m-3 "type="button"> voir la liste</button></a>
                        </div>

                        
                </form>
        </div>
     </div>


        <script src="https:cdn.jsdelivr.net/npm/@popperjs/core@2..min.js/10.2/dist/umd/popper"></script>
        <script src="bootstrap-5.1.3-dist\js\bootstrap.min.js"></script>
       
</main>
        <div class="footer">
            <?php
                include('footer.php')
                ?>
        </div>

</body>
</html>