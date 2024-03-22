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
    function recuperer_emprunteur(){
        global $matricule_emprunteur,$nom_emprunteur,$prenom_emprunteur,$tel_emprunteur,$code_fil,$ID_type_emprunteur;
    
    try{
        include("connexion.php");
        // Préparer la requête SQL pour récupérer les informations de l'enregistrement du tableau
        $sql = "SELECT matricule_emprunteur,nom_emprunteur,prenom_emprunteur,tel_emprunteur,code_fil,ID_type_emprunteur
        FROM emprunteur WHERE matricule_emprunteur = :matricule";
        $sql = $db->prepare($sql);
        $sql->bindvalue(':matricule', $matricule_emprunteur);
        $sql->execute();
        // recuperer les donnees de l'enregistrement
        while ($donnees=$sql->fetch(PDO::FETCH_ASSOC)){
            $matricule_emprunteur=$donnees['matricule_emprunteur'];
            $nom_emprunteur=$donnees['nom_emprunteur'];
            $prenom_emprunteur=$donnees['prenom_emprunteur'];
            $tel_emprunteur=$donnees['tel_emprunteur'];
            $code_fil=$donnees['code_fil'];
            $ID_type_emprunteur=$donnees['ID_type_emprunteur'];


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

        function recuperer_codes_fil(){
            global $code_fil;
            try{
                include("connexion.php");
                $sql="SELECT code_fil from filiere";
                $sql=$db->prepare($sql);
                $sql->execute();
                echo"<SELECT name=\"code_fil\">";
                $a="";
                echo'<option value="'.$a.'">'.$a.'</option>';
                while($donnees=$sql->fetch(PDO::FETCH_ASSOC)){
                    $a=$donnees['code_fil'];
                    if($code_fil==$a){
                        echo'<option value="'.$a.'"selected>'.$a.'</option>';
                    }else{
                        echo'<option value="'.$a.'">'.$a.'</option>';
                    }
                    }
                    $sql->closecursor();
                    echo"</select>";
                }
            catch(Exception $e){
                die('Erreur:'.$e->getMessage());
            }
        }
    
    
        function recuperer_id_type_emprunteur(){
            global $ID_type_emprunteur;
            try{
                include("connexion.php");
                $sql="SELECT ID_type_emprunteur from type_emprunteur";
                $sql=$db->prepare($sql);
                $sql->execute();
                echo"<SELECT name=\"ID_type_emprunteur\"onchange=\"submit()\">";
                $a="";
                echo'<option value="'.$a.'">'.$a.'</option>';
                while($donnees=$sql->fetch(PDO::FETCH_ASSOC)){
                    $a=$donnees['ID_type_emprunteur'];
                    if($ID_type_emprunteur==$a){
                        echo'<option value="'.$a.'"selected>'.$a.'</option>';
                    }else{
                        echo'<option value="'.$a.'">'.$a.'</option>';
                    }
                    }
                    $sql->closecursor();
                    echo"</select>";
                }
            catch(Exception $e){
                die('Erreur:'.$e->getMessage());
            }
        }
    
    
        function recuperer_nom_type_emprunteur(){
            global $ID_type_emprunteur,$nom_type_emprunteur;
            try{
                include("connexion.php");
                $sql="SELECT nom_type_emprunteur from type_emprunteur where ID_type_emprunteur=:ID_type";
                $sql=$db->prepare($sql);
                $sql->bindvalue(':ID_type',$ID_type_emprunteur);
                $sql->execute();
                while($donnees=$sql->fetch(PDO::FETCH_ASSOC)){
                   $nom_type_emprunteur=$donnees['nom_type_emprunteur'];
                    }
                    $sql->closecursor();
                }
            catch(Exception $e){
                die('Erreur:'.$e->getMessage());
            }
        }

    function Modification_emprunteur(){
        global $matricule_emprunteur,$nom_emprunteur,$prenom_emprunteur,$tel_emprunteur,$code_fil,$ID_type_emprunteur;

    try{
        include("connexion.php");
        $sql="UPDATE emprunteur set nom_emprunteur=:nom,prenom_emprunteur=:prenom,tel_emprunteur=:tel,code_fil=:code,ID_type_emprunteur=:id_type WHERE matricule_emprunteur=:matricule";
        $sql=$db->prepare($sql);
        $sql->bindvalue(':matricule',$matricule_emprunteur);
        $sql->bindvalue(':nom',$nom_emprunteur);
        $sql->bindvalue(':prenom',$prenom_emprunteur);
        $sql->bindvalue(':tel',$tel_emprunteur);
        $sql->bindvalue(':code',$code_fil);
        $sql->bindvalue(':id_type',$ID_type_emprunteur);

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
         $matricule_emprunteur="";
         $nom_emprunteur="";
         $prenom_emprunteur="";
         $tel_emprunteur="";
         $code_fil="";
         $ID_type_emprunteur="";
         $nom_type_emprunteur="";


    // Vérifier si le matricule est récupéré
    if(isset($_GET['matricule'])){
        $matricule_emprunteur = $_GET['matricule'];
        recuperer_emprunteur();
    }

            if(isset($_POST['matricule_emprunteur'])){
                $matricule_emprunteur=$_POST['matricule_emprunteur'];
            }
            if(isset($_POST['nom_emprunteur'])){
                $nom_emprunteur=$_POST['nom_emprunteur'];
            }
            if(isset($_POST['prenom_emprunteur'])){
                $prenom_emprunteur=$_POST['prenom_emprunteur'];
            }
            if(isset($_POST['tel_emprunteur'])){
                $tel_emprunteur=$_POST['tel_emprunteur'];
            }
            if(isset($_POST['code_fil'])){
                $code_fil=$_POST['code_fil'];
            }
            if(isset($_POST['ID_type_emprunteur'])){
                $ID_type_emprunteur=$_POST['ID_type_emprunteur'];
                recuperer_nom_type_emprunteur();
            }
            if(isset($_POST['nom_type_emprunteur'])){
                $nom_type_emprunteur=$_POST['nom_type_emprunteur'];
            }
            if(isset($_POST['btnModifier_emprunteur'])){
                Modification_emprunteur();
                header("location:liste_emprunteur.php");
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
    background-color: #333; /* Couleur bleue pour le formulaire */
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
                <form action="update_emprunteur.php " method="post" class="row col-8 m-5 g-3 form "  >
                    <h1>Ajouter un emprunteur</h1>

                    <div class="formulaire">
                    <div class="col md-5">
                    <label  class="col-sm-5 control-label">Matricule de l'emprunteur:</label>
                        <div class="col-sm-12">
                            <input type="text "placeholder="ecrivez" name="matricule_emprunteur" class="form-control" id="input2 "  value="<?php echo isset($_GET['matricule']) ? $_GET['matricule'] : $matricule_emprunteur; ?>">
                        </div>
                    <div>
                    <div class="col md-5">
                    <label  class="col-sm-5 control-label">nom de l'emprunteur:</label>
                        <div class="col-sm-12">
                            <input type="text "name="nom_emprunteur" placeholder="ecrivez" class="form-control" value="<?php echo $nom_emprunteur;?>" required>
                        </div>
                    <div>
                    <div class="col md-5">
                    <label  class="col-sm-5 control-label">Prenom de l'emprunteur:</label>
                        <div class="col-sm-12">
                            <input type="text "name="prenom_emprunteur" placeholder="ecrivez" class="form-control" value="<?php echo $prenom_emprunteur;?>" required>
                        </div>
                    <div>
                    <div class="col md-5">
                    <label  class="col-sm-5 control-label">Tel de l'emprunteur:</label>
                        <div class="col-sm-12">
                            <input type="text "name="tel_emprunteur" placeholder="ecrivez" class="form-control" value="<?php echo $tel_emprunteur;?>" required>
                        </div>
                    <div class="col md-5">
                    <label  class="form-label"> Type d'emprunteur:</label>
                        <div class="col-sm-12">
                           <?php recuperer_id_type_emprunteur();?>
                        </div>  
                    </div>
                    <div class="col md-9">
                    <label  class="form-label" name="nom_type_emprunteur"> Nom type d'emprunteur:</label>
                        <div class="col-sm-12">
                           <?php 
                           echo $nom_type_emprunteur;?>
                        </div>  
                    </div>
                    <div class="col md-5">
                    <label  class="form-label"> code filiere:</label>
                        <div class="col-sm-12">
                           <?php recuperer_codes_fil();?>
                        </div>  
                    </div>
                    
                        <div class="col md-5 pt-4">
                            <input type="submit" value="Modifier" name="btnModifier_emprunteur" class="btn btn-secondary m-3 col-12">

                        </div>
                    </div>
                </form>
                <h3><a href="listetype_emprt.php" class="liste">voir la liste des types d emprunteurs</a></h3>
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