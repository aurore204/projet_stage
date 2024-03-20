<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="fontawesome-free-6.4.2-web\css\all.min.css">
    <link rel="stylesheet" href="bootstrap-5.1.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/user.css" type="text/css">
        <script src="bootstrap-5.1.3-dist\js\bootstrap.min.js"></script>
    <title>Gestion des utilisateurs</title>
    <?php
    function Enregistrer_user(){
    global $id_user,$nom_user,$prenom_user,$tel_user,$role_user,$mot_passe_user;
    try{
        include("connexion.php");
        $sql="INSERT INTO user(id_user,nom_user,prenom_user,tel_user,role_user,mot_passe_user) values(:id,:nom,:prenom,:tel,:role_u,:mot_passe)";
        $sql=$db->prepare($sql);
        $sql->bindvalue(':id',$id_user);
        $sql->bindvalue(':nom',$nom_user);
        $sql->bindvalue(':prenom',$prenom_user);
        $sql->bindvalue(':tel',$tel_user);
        $sql->bindvalue(':role_u',$role_user);
        $sql->bindvalue(':mot_passe',$mot_passe_user);
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
              $id_user="";
            $nom_user="";
            $prenom_user="";
            $tel_user="";
            $role_user="";
            $mot_passe_user="";
          
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
            if(isset($_POST['role_user'])){
                $role_user=$_POST['role_user'];
            }
            if(isset($_POST['mot_passe_user'])){
                $mot_passe_user=$_POST['mot_passe_user'];
            }
            if(isset($_POST['btnEnregistrer_user'])){
                Enregistrer_user();
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
    background-color: #fff; /* Couleur bleue pour le formulaire */
    padding: 30px;
    height:100%;
    border-radius: 15px; /* Bord arrondi pour le formulaire */
    color: black; /* Couleur du texte */
    width: 100%; /* Vous pouvez ajuster la largeur selon vos besoins */
    margin-top: 70px; /* Espacement par rapport au haut de la page */
    margin-left:30%;
}
h1{
    margin-left:50%;
    color:#345;
    margin-top:40%;
}
#form{
    margin-left:-20vh
}

        </style>
        <div class="container py-3">
                <form action="user.php " method="post" class="row col-8 m-5 g-3 form "   >
                    <h1>Gestion des utilisateurs</h1>
                    <div class="formulaire">
                        <div class="col md-6">
                        <label  class="col-sm-5 control-label">Nom utilisateur:</label>
                            <div class="col-sm-12">
                                <input type="text "name="nom_user" placeholder="ecrivez" class="form-control" id="input2">
                            </div>
                        </div>
                        <div class="col md-6">
                        <label  class="col-sm-5 control-label">Prenom utilisateur:</label>
                            <div class="col-sm-12">
                                <input type="text "name="prenom_user" placeholder="ecrivez" class="form-control" id="input2">
                            </div>
                        </div>
                        <div class="col md-6">
                        <label  class="col-sm-5 control-label">Telephone utilisateur:</label>
                            <div class="col-sm-12">
                                <input type="text "name="tel_user" placeholder="ecrivez" class="form-control" id="input2">
                            </div>
                        </div>
                        <div class="col md-6">
                        <label  class="col-sm-5 control-label">Mot de passe utilisateur:</label>
                            <div class="col-sm-12">
                                <input type="password" name="mot_passe_user" placeholder="ecrivez" class="form-control" id="input2">
                            </div>
                        </div>
                        <div class="col md-6">
                        <label  class="col-sm-5 control-label">role utilisateur:</label>
                            <div class="col-sm-12">
                                <input type="text "name="role_user" placeholder="ecrivez" class="form-control" id="input2">
                            </div>
                        </div>
                        <div>
                            <div class="col md-5 pt-4">
                                <a href="liste_user.php"><input type="submit" value="enregistrer" name="btnEnregistrer_user" class="btn btn-primary m-3 col-12"></a>
                            </div>
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