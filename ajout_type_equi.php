<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="fontawesome-free-6.4.2-web\css\all.min.css">
    <link rel="stylesheet" href="bootstrap-5.1.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/insere_equipement.css" type="text/css">
        <script src="bootstrap-5.1.3-dist\js\bootstrap.min.js"></script>
    <title>ajout type equipement</title>
    <?php
    function Enregistrer_type_equipement(){
    global $id_type_equi,$nom_type_equi ;
    try{
        include("connexion.php");
        $sql="INSERT INTO type_equipement(id_type_equi,nom_type_equi) values(:id,:nom)";
        $sql=$db->prepare($sql);
        $sql->bindvalue(':id',$id_type_equi);
        $sql->bindvalue(':nom',$nom_type_equi);
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
            $id_type_equi="";
            $nom_type_equi="";

            if(isset($_POST['id_type_equi'])){
                $id_type_equi=$_POST['id_type_equi'];
            }
            if(isset($_POST['nom_type_equi'])){
                $nom_type_equi=$_POST['nom_type_equi'];
            }
            if(isset($_POST['btnEnregistrer_type_equipement'])){
                Enregistrer_type_equipement();
                header("location:liste_type_equi.php");
            }
        ?>
<?php
     include'header.php';
?>
<main id="main">
    <div class="nav">
        <?php
             include'navigation_equi.php';
        ?>
    </div>
    <style>
        .formulaire {
    background-color: black; /* Couleur bleue pour le formulaire */
    padding: 30px;
    height:100%;
    border-radius: 10px; /* Bord arrondi pour le formulaire */
    color: white; /* Couleur du texte */
    width: 100%; /* Vous pouvez ajuster la largeur selon vos besoins */
    margin-top: 70px; /* Espacement par rapport au haut de la page */
    margin-left:30%;
}
h1{
    margin-left:50%;
    color:#678;
    margin-top:40%;
}

        </style>
        <div class="container py-3">
                <form action="ajout_type_equi.php " method="post" class="row col-8 m-5 g-3 form "  >
                    <h1>Ajouter un  type materiel</h1>
                    <div class="formulaire">
                    <div class="col md-5">
                    <label  class="col-sm-5 control-label">nom du type equipement:</label>
                        <div class="col-sm-12">
                            <input type="text "name="nom_type_equi" placeholder="ecrivez" class="form-control" id="input2" required>
                        </div>
                    </div>
                        <div class="col md-5 pt-4">
                            <input type="submit" value="enregistrer" name="btnEnregistrer_type_equipement" class="btn btn-primary m-3 col-12" required>
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