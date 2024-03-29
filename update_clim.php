<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="fontawesome-free-6.4.2-web\css\all.min.css">
    <link rel="stylesheet" href="bootstrap-5.1.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/insere_equipement.css" type="text/css">
    <title>Modification des climatiseurs</title>
    <?php
    function recuperer_clim(){
        global $id_clim,$modele_clim,$salle_clim;
    
    try{
        include("connexion.php");
        // Préparer la requête SQL pour récupérer les informations de l'enregistrement du tableau
        $sql = "SELECT id_clim,modele_clim,salle_clim FROM climatiseur WHERE id_clim=:id";
        $sql = $db->prepare($sql);
        $sql->bindvalue(':id', $id_clim );
        $sql->execute();
        // recuperer les donnees de l'enregistrement
        while ($donnees=$sql->fetch(PDO::FETCH_ASSOC)){
            $modele_clim=$donnees['modele_clim'];
            $salle_clim=$donnees['salle_clim'];


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

    function Modification_clim(){
    global $id_clim,$modele_clim,$salle_clim ;

    try{
        include("connexion.php");
        $sql="UPDATE climatiseur set modele_clim=:modele,salle_clim=:salle WHERE id_clim=:id";
        $sql=$db->prepare($sql);
        $sql->bindvalue(':id',$id_clim);
        $sql->bindvalue(':modele',$modele_clim);
        $sql->bindvalue(':salle',$salle_clim);
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
  ?>  
</head>
<body>
    <?php
            $id_clim="";
            $modele_clim="";
            $salle_clim="";

            if(isset($_GET['id'])){
                $id_clim=$_GET['id'];
                recuperer_clim();
            }
            if(isset($_POST['id_clim'])){
                $id_clim=$_POST['id_clim'];
            }
            if(isset($_POST['modele_clim'])){
                $modele_clim=$_POST['modele_clim'];
            }
            if(isset($_POST['salle_clim'])){
                $salle_clim=$_POST['salle_clim'];
            }
            if(isset($_POST['btnModifier_clim'])){
                Modification_clim();
                header("location:liste_clim.php"); 
            }
        ?>
<?php
     include'header.php';

?>
<main id="main">
    <div class="nav">
        <?php
             include'navigation_m.php';
        ?>
    </div>
    <style>
        .formulaire {
    background-color:#454; /* Couleur bleue pour le formulaire */
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

}</style>
        <div class="container py-3">
                <form action="update_clim.php " method="post" class="row col-6 m-5 g-3 form "  id="form">
                    <h2>Modifier un climatiseur</h2>          

                    <div class="formulaire">
                  
                        <div class="form-group">
                        <label for="input2" class="col-sm-5 control-label">modele de la clim:</label>
                            <div class="col-sm-12">
                                <input type="text "name="modele_clim" placeholder="ecrivez" class="form-control" id="input2" value="<?php echo $modele_clim;?>" required>
                            <div>
                        </div>
                        <div class="form-group">
                        <label for="input2" class="col-sm-5 control-label">salle de la clim:</label>
                            <div class="col-sm-12">
                                <input type="text "name="salle_clim" placeholder="ecrivez" class="form-control" id="input2" value="<?php echo $salle_clim;?>" required>
                            <div>
                        </div>
                            <div class="col md-5 pt-4">
                                <a href="liste_clim.php"><input type="submit" value="Modifier" name="btnModifier_clim"class="btn btn-secondary m-3"></a>
                                <a href=" liste_clim.php"><button class="btn btn-success m-3 "type="button"> voir la liste</button></a>
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