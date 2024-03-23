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
    function recuperer_emprunt(){

        global $id_emprunt,$id_equipement,$statut_emprunt,$etat_equipement,$matricule_emprunteur,$date_emprunt,$date_retour;

    try{
        include("connexion.php");
        // Préparer la requête SQL pour récupérer les informations de l'enregistrement du tableau
        $sql = "SELECT emprunt.id_emprunt,emprunteur.matricule_emprunteur,equipement.id_equipement,emprunt.statut_emprunt,emprunt.etat_equipement,emprunt.date_emprunt,emprunt.date_retour
        FROM emprunteur,emprunt,equipement WHERE id_emprunt = :id";
        $sql = $db->prepare($sql);
        $sql->bindvalue(':id', $id_emprunt);
        $sql->execute();
        // recuperer les donnees de l'enregistrement
        while ($donnees=$sql->fetch(PDO::FETCH_ASSOC)){
            $id_emprunt=$donnees['id_emprunt'];
            $matricule_emprunteur=$donnees['matricule_emprunteur'];
            $id_equipement=$donnees['id_equipement'];
            $statut_emprunt=$donnees['statut_emprunt'];
            $etat_equipement=$donnees['etat_equipement'];
            $date_emprunt=$donnees['date_emprunt'];
            $date_retour=$donnees['date_retour'];


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

        function recuperer_id_equipement(){
            global $id_equipement;
            try{
                include("connexion.php");
                $sql="SELECT id_equipement from equipement";
                $sql=$db->prepare($sql);
                $sql->execute();
                echo"<SELECT name=\"id_equipement\"onchange=\"submit()\">";
                $a="";
                echo'<option value="'.$a.'">'.$a.'</option>';
                while($donnees=$sql->fetch(PDO::FETCH_ASSOC)){
                    $a=$donnees['id_equipement'];
                    if($id_equipement==$a){
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
        
        
        function recuperer_matricule_emprunteur(){
            global $matricule_emprunteur;
            try{
                include("connexion.php");
                $sql="SELECT  matricule_emprunteur from emprunteur";
                $sql=$db->prepare($sql);
                $sql->execute();
                echo"<SELECT name=\"matricule_emprunteur\"onchange=\"submit()\">";
                $a="";
                echo'<option value="'.$a.'">'.$a.'</option>';
                while($donnees=$sql->fetch(PDO::FETCH_ASSOC)){
                    $a=$donnees['matricule_emprunteur'];
                    if($matricule_emprunteur==$a){
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
        
        function recuperer_nom_equipement(){
            global $id_equipement,$nom_equipement;
            try{
                include("connexion.php");
                $sql="SELECT nom_equipement from equipement where id_equipement=:id_equi";
                $sql=$db->prepare($sql);
                $sql->bindvalue(':id_equi',$id_equipement);
                $sql->execute();
                while($donnees=$sql->fetch(PDO::FETCH_ASSOC)){
                   $nom_equipement=$donnees['nom_equipement'];
                    }
                    $sql->closecursor();
                }
            catch(Exception $e){
                die('Erreur:'.$e->getMessage());
            }
        }
        
        
        function recuperer_nom_emprunteur(){
            global $matricule_emprunteur,$nom_emprunteur;
            try{
                include("connexion.php");
                $sql="SELECT nom_emprunteur from emprunteur where matricule_emprunteur=:matricule";
                $sql=$db->prepare($sql);
                $sql->bindvalue(':matricule',$matricule_emprunteur);
                $sql->execute();
                while($donnees=$sql->fetch(PDO::FETCH_ASSOC)){
                   $nom_emprunteur=$donnees['nom_emprunteur'];
                    }
                    $sql->closecursor();
                }
            catch(Exception $e){
                die('Erreur:'.$e->getMessage());
            }
        }

        function Ajout_equipement(){
            global $id_equipement,$quantite_stock_equipement,$nom_equipement;
                try {
                    include("connexion.php");

                    // Requête pour mettre à jour le nombre d'équipements disponibles
                    $sql = "UPDATE equipement SET quantite_stock_equipement = quantite_stock_equipement + 1 WHERE id_equipement = :id_equipement and nom_equipement=:nom ";
                    $sql = $db->prepare($sql);
                    $sql->bindvalue(':id_equipement', $id_equipement);
                    $sql->bindvalue(':nom', $nom_equipement);

                    $sql->execute();
                    $sql->closecursor();
                } catch(Exception $e) {
                    die('Erreur:'.$e->getMessage()); // Échec : retourner false
                }
            }       
        

        function Modification_emprunt(){
            global $id_emprunt,$id_equipement,$statut_emprunt,$etat_equipement,$matricule_emprunteur,$date_emprunt,$date_retour;

        try{
            include("connexion.php");
            $sql="UPDATE emprunt set id_emprunt=:id,id_equipement=:id_equi,statut_emprunt=:statut,etat_equipement=:etat,matricule_emprunteur=:matricule,date_emprunt=:date_emprunt,date_retour=:date_retour WHERE id_emprunt=:id";
            $sql=$db->prepare($sql);
            $sql->bindvalue(':id',$id_emprunt);
            $sql->bindvalue(':id_equi',$id_equipement);
            $sql->bindvalue(':matricule',$matricule_emprunteur);
            $sql->bindvalue('statut',$statut_emprunt);
            $sql->bindvalue(':etat',$etat_equipement);
            $sql->bindvalue(':tel',$tel_emprunteur);
            $sql->bindvalue(':date_emprunt',$date_emprunt);
            $sql->bindvalue(':date_retour',$date_retour);
    
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
         $id_emprunt="";
         $matricule_emprunteur="";
         $nom_emprunteur="";
         $id_equipement="";
         $nom_equipement="";
         $etat_equipement="";
         $statut_emprunt="";
         $date_emprunt="";
         $date_retour="";


    // Vérifier si le matricule est récupéré
    if(isset($_GET['id'])){
        $id_emprunt = $_GET['id'];
        recuperer_emprunt();
    }

            if(isset($_POST['id_emprunt'])){
                $id_emprunt=$_POST['id_emprunt'];
            }
            if(isset($_POST['nom_emprunteur'])){
                $nom_emprunteur=$_POST['nom_emprunteur'];
            }
            if(isset($_POST['matricule_emprunteur'])){
                $matricule_emprunteur=$_POST['matricule_emprunteur'];
                recuperer_nom_emprunteur();

            }
            if(isset($_POST['statut_emprunt'])){
                $statut_emprunt=$_POST['statut_emprunt'];
            }
            if(isset($_POST['etat_equipement'])){
                $etat_equipement=$_POST['etat_equipement'];
            }
            if(isset($_POST['id_equipement'])){
                $id_equipement=$_POST['id_equipement'];
                recuperer_nom_equipement();

            }
            if(isset($_POST['date_emprunt'])){
                // Convertir la date de format hh:mm:ss en format Y-m-d H:i:s
                $date_emprunt = date('Y-m-d H:i:s', strtotime($_POST['date_emprunt']));
            }
            if(isset($_POST['date_retour'])){
                // Convertir la date de format hh:mm:ss en format Y-m-d H:i:s
                $date_retour = date('Y-m-d H:i:s', strtotime($_POST['date_retour']));
            }
            if(isset($_POST['nom_equipement'])){
                $nom_equipement=$_POST['nom_equipement'];
            }
            if(isset($_POST['btnModifier_emprunt'])){
                Modification_emprunt();
                header("location:liste_emprunts.php");
            }
            if(isset($_POST['btnRetourner_equipement'])){
                Ajout_equipement();
                header("location:liste_emprunts.php");
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
    background-color: #123; /* Couleur bleue pour le formulaire */
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
                <form action="update_emprunt.php " method="post" class="row col-8 m-5 g-3 form "  >
                    <h1>Modifier un emprunt</h1>

                    <div class="formulaire">
                    <div class="col md-5">
                    <label  class="col-sm-5 control-label">id de l'emprunt:</label>
                        <div class="col-sm-12">
                            <input type="text "placeholder="ecrivez" name="id_emprunt" class="form-control" id="input2 "  value="<?php echo isset($_GET['id']) ? $_GET['id'] : $id_emprunt; ?>" required>
                        </div>
                    <div>
                    <div class="col md-5">
                    <label  class="form-label" name="matricule_emprunteur"   value="<?php echo $matricule_emprunteur;?>"> Matricule de l'emprunteur:</label>
                           <?php recuperer_matricule_emprunteur();?>
                    <div class="col md-9">
                    <label  class="form-label" name="nom_emprunteur"> Nom de l'emprunteur:</label>
                        <input type="text "name="" placeholder="ecrivez"  value="<?php echo $nom_emprunteur;?>" required>
                    <div class="col md-5">
                    <label  class="form-label" name="id_equipement"  value="<?php echo $id_equipement;?>"> ID_equipement:</label>
                           <?php recuperer_id_equipement();?>
                    <div class="col md-9">
                    <label  class="form-label" name="nom_equipement"> Nom de l'equipement:</label>
                            <input type="text "name="" placeholder="ecrivez"  value="<?php echo $nom_equipement;?>" required>
                       
                    <div class="col md-5">
                    <label  class="col-sm-5 control-label">statut de l'emprunt:</label>
                        <div class="col-sm-12">
                            <input type="text "name="statut_emprunt" placeholder="ecrivez" class="form-control" id="input2" value="<?php echo $statut_emprunt;?>" required>
                        </div>
                    <div>
                    <div class="col md-5">
                    <label  class="col-sm-5 control-label">date d'emprunt:</label>
                        <div class="col-sm-12">
                            <input type="time" name="date_emprunt" class="form-control" id="input2" value="<?php echo $date_emprunt;?>" required>
                    </div>
                    <div class="col md-5">
                    <label  class="col-sm-5 control-label">Date retour:</label>
                        <div class="col-sm-12">
                            <input type="time"name="date_retour" placeholder="ecrivez" class="form-control" id="input2" value="<?php echo $date_retour;?>" required>
                    </div>  
                    </div>
                    <div class="col md-5">
                        <label class="form-label">etat equipement</label>
                        <select class="form-select" name="etat_equipement">
                            <option value="en bon etat" <?php if ($etat_equipement == 'en bon etat') echo 'selected'; ?>>en bon etat</option>
                            <option value="defectueux" <?php if ($etat_equipement == 'defectueux') echo 'selected'; ?>>defectueux</option>
                        </select>
                    </div>
                    <div class="col md-5">
                    <label  class="col-sm-5 control-label">Description:</label>
                        <div class="col-sm-12">
                            <textarea class="form-control" placeholder="veuillez remplir une description" rows="5"> </textarea>
                    </div>
                    
                        <div class="col md-5 pt-4">
                            <input type="submit" value="Modifier" name="btnModifier_emprunt" class="btn btn-secondary m-3 col-12">
                            <input type="submit" value="retourner" name="btnRetourner_equipement" class="btn btn-success m-3 col-12">

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