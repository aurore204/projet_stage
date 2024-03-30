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
    <title>Modification type d'emprunteurs</title>
    <?php
    function recuperer_type_emprunteur(){
        global $ID_type_emprunteur,$nom_type_emprunteur;
    
    try{
        include("connexion.php");
        // Préparer la requête SQL pour récupérer les informations de l'enregistrement du tableau
        $sql = "SELECT ID_type_emprunteur,nom_type_emprunteur FROM type_emprunteur WHERE ID_type_emprunteur = :ID";
        $sql = $db->prepare($sql);
        $sql->bindvalue(':ID', $ID_type_emprunteur);
        $sql->execute();
        // recuperer les donnees de l'enregistrement
        while ($donnees=$sql->fetch(PDO::FETCH_ASSOC)){
            $nom_type_emprunteur=$donnees['nom_type_emprunteur'];

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

    function Modification_type_emprunteur(){
    global $ID_type_emprunteur,$nom_type_emprunteur ;

    try{
        include("connexion.php");
        $sql="UPDATE type_emprunteur set nom_type_emprunteur=:nom WHERE ID_type_emprunteur=:ID";
        $sql=$db->prepare($sql);
        $sql->bindvalue(':ID',$ID_type_emprunteur);
        $sql->bindvalue(':nom',$nom_type_emprunteur);
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
            $ID_type_emprunteur="";
            $nom_type_emprunteur="";
            if(isset($_GET['ID'])){
                $ID_type_emprunteur=$_GET['ID'];
                recuperer_type_emprunteur();
            }
            if(isset($_POST['ID_type_emprunteur'])){
                $ID_type_emprunteur=$_POST['ID_type_emprunteur'];
            }
            if(isset($_POST['nom_type_emprunteur'])){
                $nom_type_emprunteur=$_POST['nom_type_emprunteur'];
            }
            if(isset($_POST['btnModifier_type_emprunteur'])){
                Modification_type_emprunteur();
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
                <form action="update_type_emprunteur.php " method="post" class="row col-6 m-5 g-3 form "  id="form">
                    <h2>Modifier un type d'emprunteur</h2>
                    <div class="formulaire">
                        <div class="form-group">
                            <label for="input1" class="col-sm-5 control-label">ID type emprunteur:</label>
                            <div class="col-sm-12">
                                <input type="text "name="ID_type_emprunteur" placeholder="ecrivez" class="form-control" id="input1" value="<?php echo $_GET['ID'] ;?>" required>
                            <div>
                        </div>
                        <div class="form-group">
                        <label for="input2" class="col-sm-9 control-label">nom du type d'emprunteur:</label>
                            <div class="col-sm-12">
                                <input type="text "name="nom_type_emprunteur" placeholder="ecrivez" class="form-control" id="input2" value="<?php echo $nom_type_emprunteur;?>" required>
                            <div>
                        </div>
                            <div class="col md-5 pt-4">
                                <a href="listetype_emprt.php"><input type="submit" value="Modifier" name="btnModifier_type_emprunteur"class="btn btn-primary m-3"></a>
                                <a href=" listetype_emprt.php"><button class="btn btn-success m-3 "type="button"> voir la liste</button></a>
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