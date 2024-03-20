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
    <title>ajout emprunt</title>
    <?php
    function Enregistrer_emprunt(){
    global $id_emprunt,$nom_emprunteur,$nom_equipement,$statut_emprunt,$id_equipement,$etat_equipement,$matricule_emprunteur,$date_emprunt,$date_retour;
        try{
    include("connexion.php");
        $sql="INSERT INTO emprunt(id_emprunt,statut_emprunt,etat_equipement,date_emprunt,date_retour,matricule_emprunteur,id_equipement)
        values(:id,:statut,:etat,:date_emprunt,:date_retour,:matricule,:id_equi)";
        $sql=$db->prepare($sql);
        $sql->bindvalue(':id',$id_emprunt);
        $sql->bindvalue(':statut',$statut_emprunt);
        $sql->bindvalue(':etat',$etat_equipement);
        $sql->bindvalue(':date_emprunt',$date_emprunt);
        $sql->bindvalue(':date_retour',$date_retour);
        $sql->bindvalue(':matricule',$matricule_emprunteur);
        $sql->bindvalue(':id_equi',$id_equipement);

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


/*cette fonction nous permet e passer du format de la date JJ/MM/AAAA vers AAAA/MM/JJ*/

function recuperer_nom_equipement(){
    global $id_equipement,$nom_equipement;
    try{
        include("connexion.php");
        $sql="SELECT nom_equipement from equipement where id_equipement=:id";
        $sql=$db->prepare($sql);
        $sql->bindvalue(':id',$id_equipement);
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


function soustraire_equipement(){
    global $id_equipement,$quantite_stock_equipement;
        try {
            
            // Requête pour mettre à jour le nombre d'équipements disponibles
            $sql = "UPDATE equipement SET quantite_stock_equipement = quantite_stock_equipement - 1 WHERE id_equipement = :id_equipement";
            $sql = $db->prepare($sql);
            $sql->bindvalue(':id_equipement', $id_equipement);
            $sql->execute();
            
            // Fermer la connexion à la base de données
            $db = null;
            
            return true; // Succès : retourner true
        } catch(PDOException $e) {
            return false; // Échec : retourner false
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

    
  ?>  
</head>
<body>
    <?php
            $id_emprunt="";
            $statut_emprunt="";
            $etat_equipement="";
            $date_emprunt="";
            $date_retour="";
            $id_equipement="";
            $matricule_emprunteur="";
            $nom_emprunteur="";
            $quantite_stock_equipement="";
            $nom_equipement="";

            if(isset($_POST['id_emprunt'])){
                $id_emprunt=$_POST['id_emprunt'];
            }
            if(isset($_POST['statut_emprunt'])){
                $statut_emprunt=$_POST['statut_emprunt'];
            }
            if(isset($_POST['etat_equipement'])){
                $etat_equipement=$_POST['etat_equipement'];
            }
            if(isset($_POST['date_emprunt'])){
                // Convertir la date de format hh:mm:ss en format Y-m-d H:i:s
                $date_emprunt = date('Y-m-d H:i:s', strtotime($_POST['date_emprunt']));
            }
            if(isset($_POST['date_retour'])){
                // Convertir la date de format hh:mm:ss en format Y-m-d H:i:s
                $date_retour = date('Y-m-d H:i:s', strtotime($_POST['date_retour']));
            }
            if(isset($_POST['id_equipement'])){
                $id_equipement=$_POST['id_equipement'];
                recuperer_nom_equipement();
            }
            if(isset($_POST['matricule_emprunteur'])){
                $matricule_emprunteur=$_POST['matricule_emprunteur'];
                recuperer_nom_emprunteur();
            }
            if(isset($_POST['nom_equipement'])){
                $nom_equipement=$_POST['nom_equipement'];}

            if(isset($_POST['nom_emprunteur'])){
                $nom_emprunteur=$_POST['nom_emprunteur'];
            }
            if(isset($_POST['btnEnregistrer_emprunt'])){
                Enregistrer_emprunt();
                soustraire_equipement();
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
    background-color: #555; /* Couleur bleue pour le formulaire */
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
                <form action="Emprunt.php " method="post" class="row col-8 m-5 g-3 form "  >
                    <h1>Ajouter un  emprunt</h1>
                    <div class="formulaire">
                    <div class="col md-5">
                    <label  class="form-label" name="matricule_emprunteur"> Matricule de l'emprunteur:</label>
                           <?php recuperer_matricule_emprunteur();?>
                    <div class="col md-9">
                    <label  class="form-label" name="nom_emprunteur"> Nom de l'emprunteur:</label>
                        <input type="text "name="" placeholder="ecrivez"  value="<?php echo $nom_emprunteur;?>">
                    <div class="col md-5">
                    <label  class="form-label" name="id_equipement"> ID_equipement:</label>
                           <?php recuperer_id_equipement();?>
                    <div class="col md-9">
                    <label  class="form-label" name="nom_equipement"> Nom de l'equipement:</label>
                            <input type="text "name="" placeholder="ecrivez"  value="<?php echo $nom_equipement;?>">
                       
                    <div class="col md-5">
                    <label  class="col-sm-5 control-label">statut de l'emprunt:</label>
                        <div class="col-sm-12">
                            <input type="text "name="statut_emprunt" placeholder="ecrivez" class="form-control" value="<?php echo $statut_emprunt;?>"id="input2">
                        </div>
                    <div>
                    <div class="col md-5">
                    <label  class="col-sm-5 control-label">date d'emprunt:</label>
                        <div class="col-sm-12">
                            <input type="time" name="date_emprunt" class="form-control" value="<?php echo $date_emprunt;?>" id="input2">
                    </div>
                    <div class="col md-5">
                    <label  class="col-sm-5 control-label">Date retour:</label>
                        <div class="col-sm-12">
                            <input type="time" name="date_retour" placeholder="ecrivez" value="<?php echo $date_retour;?>" class="form-control" id="input2">
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
                            <input type="submit" value="emprunter" name="btnEnregistrer_emprunt" class="btn btn-primary m-3 col-12">
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
</html>''