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
    <title>ajout type d'emprunteur</title>
    <?php
    function Enregistrer_type_emprunteur(){
    global $ID_type_emprunteur,$nom_type_emprunteur;
    try{
        include("connexion.php");
        $sql="INSERT INTO type_emprunteur(ID_type_emprunteur,nom_type_emprunteur) values(:ID,:nom)";
        $sql=$db->prepare($sql);
        $sql->bindvalue(':ID',$ID_type_emprunteur);
        $sql->bindvalue(':nom',$nom_type_emprunteur);
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
              $ID_type_emprunteur="";
            $nom_type_emprunteur="";
          
            if(isset($_POST['nom_type_emprunteur'])){
                $nom_type_emprunteur=$_POST['nom_type_emprunteur'];
            }
            if(isset($_POST['ID_type_emprunteur'])){
                $ID_type_emprunteur=$_POST['ID_type_emprunteur'];
            }
            if(isset($_POST['btnEnregistrer_type_emprunteur'])){
                Enregistrer_type_emprunteur();
                header("location:listetype_emprt.php");
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
    background-color: #468; /* Couleur bleue pour le formulaire */
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
#form{
    margin-left:-20vh
}

        </style>
        <div class="container py-3">
                <form action="ajout_type_emprunteur.php " method="post" class="row col-8 m-5 g-3 form "  >
                    <h1>Ajouter un type d'emprunteur</h1>
                    <div>
                    <div class="col md-5">
                    <label  class="col-sm-5 control-label">Nom Type emprunteur:</label>
                        <div class="col-sm-12">
                            <input type="text "name="nom_type_emprunteur" placeholder="ecrivez" class="form-control" id="input2">
                        </div>
                    <div>
                    </div>
                        <div class="col md-5 pt-4">
                            <input type="submit" value="enregistrer" name="btnEnregistrer_type_emprunteur" class="btn btn-primary m-3 col-12">
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