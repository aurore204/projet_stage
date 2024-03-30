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
    function recuperer_user(){
        global $id_user,$nom_user,$prenom_user,$tel_user,$role_user,$mot_passe_user;
    
    try{
        include("connexion.php");
        // Préparer la requête SQL pour récupérer les informations de l'enregistrement du tableau
        $sql = "SELECT id_user,nom_user,prenom_user,tel_user,role_user,mot_passe_user FROM user WHERE id_user= :id";
        $sql = $db->prepare($sql);
        $sql->bindvalue(':id', $id_user);
        $sql->execute();
        // recuperer les donnees de l'enregistrement
        while ($donnees=$sql->fetch(PDO::FETCH_ASSOC)){
            $id_user=$donnees['id_user'];
            $nom_user=$donnees['nom_user'];
            $prenom_user=$donnees['prenom_user'];
            $tel_user=$donnees['tel_user'];
            $mot_passe_user=$donnees['mot_passe_user'];
            $role_user=$donnees['role_user'];
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

    function Modification_user(){
        global $id_user,$nom_user,$prenom_user,$tel_user,$role_user,$mot_passe_user;
    try{
        include("connexion.php");
        $sql="UPDATE user set nom_user=:nom,prenom_user=:prenom,tel_user=:tel,role_user=:role_user,mot_passe_user=:mot_passe WHERE id_user=:id";
        $sql=$db->prepare($sql);
        $sql->bindvalue(':id',$id_user);
        $sql->bindvalue(':nom',$nom_user);
        $sql->bindvalue(':prenom',$prenom_user);
        $sql->bindvalue(':tel',$tel_user);
        $sql->bindvalue(':mot_passe',$mot_passe_user);
        $sql->bindvalue(':role_user',$role_user);
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
         $id_user="";
         $nom_user="";
         $prenom_user="";
         $tel_user="";
         $mot_passe_user="";
         $role_user="";


    // Vérifier si le matricule est récupéré
    if(isset($_GET['id'])){
        $id_user = $_GET['id'];
        recuperer_user();
    }

            if(isset($_POST['id_user'])){
                $id_user=$_POST['id_user'];
            }
            if(isset($_POST['nom_user'])){
                $nom_user=$_POST['nom_user'];
            }
            if(isset($_POST['prenom_user'])){
                $prenom_user=$_POST['prenom_user'];
            }
            if(isset($_POST['tel_user'])){
                $tel_user=$_POST['tel_user'];
            }
            if(isset($_POST['mot_passe_user'])){
                $mot_passe_user=$_POST['mot_passe_user'];
            }
            if(isset($_POST['role_user'])){
                $role_user=$_POST['role_user'];
            }
            if(isset($_POST['btnModifier_user'])){
                Modification_user();
                header("location:liste_user.php");
            }
        ?>
<?php
     include'header.php';
?>
<main id="main">
    <div class="nav">
        <?php
             include'navigation_user.php';
        ?>
    </div>
    <style>
        .formulaire {
    background-color: #444; /* Couleur bleue pour le formulaire */
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
                <form action="update_user.php " method="post" class="row col-8 m-5 g-3 form "  >
                    <h1>Ajouter un emprunteur</h1>

                    <div class="formulaire">
                    <div class="col md-5">
                    <label  class="col-sm-5 control-label">Id de l'utilisateru:</label>
                        <div class="col-sm-12">
                            <input type="text "placeholder="ecrivez" name="id_user" class="form-control" id="input2 " value="<?php echo $_GET['id'];?>" required>
                        </div>
                    <div>
                    <div class="col md-5">
                    <label  class="col-sm-5 control-label">nom de l'utilisateur:</label>
                        <div class="col-sm-12">
                            <input type="text "name="nom_user" placeholder="ecrivez" class="form-control"  value="<?php echo $nom_user;?>" required>
                        </div>
                    <div>
                    <div class="col md-5">
                    <label  class="col-sm-5 control-label">Prenom de l'utilisateur:</label>
                        <div class="col-sm-12">
                            <input type="text "name="prenom_user" placeholder="ecrivez" class="form-control"  value="<?php echo $prenom_user;?>" required>
                        </div>
                    </div>
                    <div class="col md-5">
                    <label  class="col-sm-5 control-label">Tel de l'utilisateur:</label>
                        <div class="col-sm-12">
                            <input type="text "name="tel_user" placeholder="ecrivez" class="form-control"  value="<?php echo $tel_user;?>" required>
                        </div>
                    </div>
                    <div class="col md-5">
                    <label  class="col-sm-5 control-label">Mot de passe l'utilisateur:</label>
                        <div class="col-sm-12">
                            <input type="text "name="mot_passe_user" placeholder="ecrivez" class="form-control"  value="<?php echo $mot_passe_user;?>" required>
                        </div>
                    </div>
                    <div class="col md-5">
                    <label  class="col-sm-5 control-label">Role de l'utilisateur:</label>
                        <div class="col-sm-12">
                            <input type="text "name="role_user" placeholder="ecrivez" class="form-control"  value="<?php echo $role_user;?>" required>
                        </div>
                    </div>
                        <div class="col md-5 pt-4">
                            <input type="submit" value="Modifier" name="btnModifier_user" class="btn btn-secondary m-3 col-12">
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