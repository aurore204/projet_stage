<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="fontawesome-free-6.4.2-web\css\all.min.css">
    <link rel="stylesheet" href="bootstrap-5.1.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/insere_equipement.css" type="text/css">
        <script src="bootstrap-5.1.3-dist\js\bootstrap.min.js"></script>
    <title>ajout climatiseur</title>
    <?php

    function Enregistrer_clim(){
    global $id_clim,$modele_clim,$salle_clim;
    try{
        include("connexion.php");
        $sql="INSERT INTO climatiseur(id_clim,modele_clim,salle_clim) values(:id,:modele,:salle)";
        $sql=$db->prepare($sql);
        $sql->bindvalue(':id',$id_clim);
        $sql->bindvalue(':modele',$modele_clim);
        $sql->bindvalue(':salle',$salle_clim);
       
        $sql->execute();
        if($sql){
            echo"<h4><font color=blue> Insertion reuissie </font></h4>";
        }
        else{
            echo"<h4><font color=red>Echec d'insertion </font></h4>";

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

            if(isset($_POST['id_clim'])){
                $id_clim=$_POST['id_clim'];
            }
            if(isset($_POST['modele_clim'])){
                $modele_clim=$_POST['modele_clim'];
            }
            
            if(isset($_POST['salle_clim'])){
                $salle_clim=$_POST['salle_clim'];
            }
            if(isset($_POST['btnEnregistrer_clim'])){
                Enregistrer_clim();
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
    background-color: #245; /* Couleur bleue pour le formulaire */
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
                <form action="ajout_clim.php " method="post" class="row col-8 m-5 g-3 form "  >
                    <h1>Ajouter un climatiseur</h1>

                    <div class="formulaire">
                    <div class="col md-5">
                        
                    <div>
                    <div class="col md-5">
                    <label  class="col-sm-5 control-label">modele climatiseur:</label>
                        <div class="col-sm-12">
                            <input type="text "name="modele_clim" placeholder="ecrivez" value="<?php echo $modele_clim;?>" class="form-control" id="input2" required>
                        </div>
                    <div>
                    <div class="col md-5">
                    <label  class="col-sm-5 control-label">Salle climatiseur:</label>
                        <div class="col-sm-12">
                            <input type="text "name="salle_clim" placeholder="ecrivez" class="form-control" value="<?php echo $salle_clim;?>" id="input2" required>
                        </div>
                    </div>
                        <div class="col md-5 pt-4">
                            <input type="submit" value="enregistrer" name="btnEnregistrer_clim" class="btn btn-secondary m-3 col-12">
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