<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="fontawesome-free-6.4.2-web\css\all.min.css">
    <link rel="stylesheet" href="bootstrap-5.1.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/insere_equipement.css" type="text/css">
    <script src="https:cdn.jsdelivr.net/npm/@popperjs/core@2..min.js/10.2/dist/umd/popper"></script>
        <script src="bootstrap-5.1.3-dist\js\bootstrap.min.js"></script>
    <title>ajout equipement</title>
    <?php
    function Enregistrer_equipement(){
    global $id_equipement,$nom_equipement,$statut_equipement ;
    try{
        include("connexion.php");
        $sql="INSERT INTO equipement(id_equipement,nom_equipement,statut_equipement) values(:id,:nom,:statut)";
        $sql=$db->prepare($sql);
        $sql->bindvalue(':id',$id_equipement);
        $sql->bindvalue(':nom',$nom_equipement);
        $sql->bindvalue(':statut',$statut_equipement);
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
            $id_equipement="";
            $nom_equipement="";
            $statut_equipement="";
            $quantite_equipement="";

            if(isset($_POST['id_equipement'])){
                $id_equipement=$_POST['id_equipement'];
            }
            if(isset($_POST['nom_equipement'])){
                $nom_equipement=$_POST['nom_equipement'];
            }
            if(isset($_POST['statut_equipement'])){
                $statut_equipement=$_POST['statut_equipement'];
            }
            if(isset($_POST['quantite_equipement'])){
                $quantite_equipement=$_POST['quantite_equipement'];
            }
            if(isset($_POST['btnEnregistrer_equipement'])){
                Enregistrer_equipement();
                header("location:liste_equipement.php");
            }
        ?>
<?php
     include'header.php';
?>
<main id="main">
    <div class="nav">
        <?php
             include'navigation.php';
        ?>
    </div>
    <style>
        .formulaire {
    background-color: #454; /* Couleur bleue pour le formulaire */
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
                <form action="ajout_equipement.php " method="post" class="row col-8 m-5 g-3 form "  >
                    <h1>Ajouter un  materiel</h1>
                    <div class="formulaire">
                    <div class="col md-5">
                    <label  class="col-sm-2 control-label">nom du materiel:</label>
                        <div class="col-sm-12">
                            <input type="text "name="nom_equipement" placeholder="ecrivez" class="form-control" id="input2">
                        </div>
                    <div>
                    <div class="col md-5">
                    <label  class="col-sm-2 control-label">Quantite initial du materiel:</label>
                        <div class="col-sm-12">
                            <input type="text "name="quantite_equipement" placeholder="ecrivez" class="form-control" id="input2">
                    </div>
                    </div>
                    <div  class="col md-5">
                    <label class="form-label">satut equipement</label>
                            <select  class="form-select" name="statut_equipement">
                                <option selected="selected">...</option>
                                <option name="statut_equipement">en stock</option>
                                <option name="statut_equipement">empruntes</option>
                                <option name="statut_equipement">en reparation</option>
                            </select>
                        </div> 
                        <div class="col md-5 pt-4">
                            <input type="submit" value="enregistrer" name="btnEnregistrer_equipement" class="btn btn-primary m-3 col-12">
                        </div>

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