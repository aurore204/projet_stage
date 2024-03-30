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
    <title>Modification des types d'equiments</title>
    <?php
    function recuperer_type_equipement(){
        global $id_type_equi,$nom_type_equi;
    
    try{
        include("connexion.php");
        // Préparer la requête SQL pour récupérer les informations de l'enregistrement du tableau
        $sql = "SELECT ID_type_equi ,nom_type_equi FROM type_equipement WHERE id_type_equi = :id";
        $sql = $db->prepare($sql);
        $sql->bindvalue(':id', $id_type_equi);
        $sql->execute();
        // recuperer les donnees de l'enregistrement
        while ($donnees=$sql->fetch(PDO::FETCH_ASSOC)){
            $nom_type_equi=$donnees['nom_type_equi'];

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

    function Modification_type_equi(){
    global $id_type_equi,$nom_type_equi ;

    try{
        include("connexion.php");
        $sql="UPDATE type_equipement set nom_type_equi=:nom WHERE id_type_equi=:id";
        $sql=$db->prepare($sql);
        $sql->bindvalue(':id',$id_type_equi);
        $sql->bindvalue(':nom',$nom_type_equi);
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
            $id_type_equi="";
            $nom_type_equi="";
            if(isset($_GET['id'])){
                $id_type_equi=$_GET['id'];
                recuperer_type_equipement();
            }
            if(isset($_POST['id_type_equi'])){
                $id_type_equi=$_POST['id_type_equi'];
            }
            if(isset($_POST['nom_type_equi'])){
                $nom_type_equi=$_POST['nom_type_equi'];
            }
            if(isset($_POST['btnModifier_type_equi'])){
                Modification_type_equi();
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
    background-color:#555; /* Couleur bleue pour le formulaire */
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
                <form action="update_type_equipement.php " method="post" class="row col-6 m-5 g-3 form "  id="form">
                    <h2>Modifier d'un type d'equipement</h2>
                    <div class="formulaire">
                        <div class="form-group">
                            <label for="input1" class="col-sm-5 control-label">:</label>
                            <div class="col-sm-12">
                                <input type="text "name="id_type_equi" placeholder="ecrivez" class="form-control" id="input1" value="<?php echo $_GET['id'] ;?>" required>
                            <div>
                        </div>
                        <div class="form-group">
                        <label for="input2" class="col-sm-5 control-label">nom du type d'equipement:</label>
                            <div class="col-sm-12">
                                <input type="text "name="nom_type_equi" placeholder="ecrivez" class="form-control" id="input2" value="<?php echo $nom_type_equi;?>" required>
                            <div>
                        </div>
                            <div class="col md-5 pt-4">
                                <a href="liste_type_equi.php"><input type="submit" value="Modifier" name="btnModifier_type_equi"class="btn btn-secondary m-3"></a>
                                <a href=" liste_type_equi.php"><button class="btn btn-dark m-3 "type="button"> voir la liste</button></a>
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