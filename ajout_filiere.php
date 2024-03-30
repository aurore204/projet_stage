<?php
session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="fontawesome-free-6.4.2-web\css\all.min.css">
    <link rel="stylesheet" href="bootstrap-5.1.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/insere_equipement.css" type="text/css">
        <script src="bootstrap-5.1.3-dist\js\bootstrap.min.js"></script>
    <title>ajout type d'emprunteur</title>
    <?php
    function Enregistrer_filiere(){
    global $code_fil,$nom_fil;
    try{
        include("connexion.php");
        $sql="INSERT INTO filiere(code_fil,nom_fil) values(:code,:nom)";
        $sql=$db->prepare($sql);
        $sql->bindvalue(':code',$code_fil);
        $sql->bindvalue(':nom',$nom_fil);
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
              $code_fil="";
            $nom_fil="";
          
            if(isset($_POST['nom_fil'])){
                $nom_fil=$_POST['nom_fil'];
            }
            if(isset($_POST['code_fil'])){
                $code_fil=$_POST['code_fil'];
            }
            if(isset($_POST['btnEnregistrer_filiere'])){
                Enregistrer_filiere();
                header("location:liste_filiere.php");
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
    background-color: black; /* Couleur bleue pour le formulaire */
    padding: 30px;
    height:100%;
    border-radius: 15px; /* Bord arrondi pour le formulaire */
    color: #00FFFF; /* Couleur du texte */
    width: 100%; /* Vous pouvez ajuster la largeur selon vos besoins */
    margin-top: 70px; /* Espacement par rapport au haut de la page */
    margin-left:30%;
}
h1{
    margin-left:50%;
    color:#953;
    margin-top:40%;
}
#form{
    margin-left:-20vh
}

        </style>
        <div class="container py-3">
                <form action="ajout_filiere.php " method="post" class="row col-8 m-5 g-3 form "   >
                    <h1>Ajouter une filiere</h1>
                    <div class="formulaire">
                        <div class="col md-6">
                        <label  class="col-sm-5 control-label">Code de la filiere:</label>
                            <div class="col-sm-12">
                                <input type="text "name="code_fil" placeholder="ecrivez" class="form-control" id="input2" required>
                            </div>
                        </div>
                        <div class="col md-6">
                        <label  class="col-sm-5 control-label">Nom de la filiere:</label>
                            <div class="col-sm-12">
                                <input type="text "name="nom_fil" placeholder="ecrivez" class="form-control" id="input2" required>
                            </div>
                        </div>
                        <div>
                            <div class="col md-5 pt-4">
                                <a href="liste_filiere.php"><input type="submit" value="enregistrer" name="btnEnregistrer_filiere" class="btn btn-info m-3 col-12"></a>
                            </div>
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