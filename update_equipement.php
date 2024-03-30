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
    <title>Modification equipement</title>
    <?php
    function recuperer_equipement(){
        global $id_equipement,$nom_equipement,$statut_equipement,$quantite_equipement,$quantite_stock_equipement,$ID_type_equi ;
    
    try{
        include("connexion.php");
        // Vérifier si l'ID est défini dans l'URL et recuperation de l'id de l'enregistrement a modifier
        // Préparer la requête SQL pour récupérer les informations de l'enregistrement du tableau
        $sql = "SELECT id_equipement,nom_equipement,statut_equipement,quantite_equipement,quantite_stock_equipement,ID_type_equi FROM equipement WHERE id_equipement=:id_equi ";
        $sql = $db->prepare($sql);
        $sql->bindvalue(':id_equi', $id_equipement);
        $sql->execute();
        // recuperer les donnees de l'enregistrement
        while ($donnees=$sql->fetch(PDO::FETCH_ASSOC)){
            $nom_equipement=$donnees['nom_equipement'];
            $quantite_equipement=$donnees['quantite_equipement'];
            $quantite_stock_equipement=$donnees['quantite_stock_equipement'];
            $ID_type_equi=$donnees['ID_type_equi'];

            $statut_equipement=$donnees['statut_equipement'];

        }
       }
    catch(Exeption $e){
        die('Erreur:'.$e->getMessage());
    
        }}


        function recuperer_id_type_equi(){
            global $ID_type_equi;
            try{
                include("connexion.php");
                $sql="SELECT ID_type_equi from type_equipement";
                $sql=$db->prepare($sql);
                $sql->execute();
                echo"<SELECT name=\"ID_type_equi\"onchange=\"submit()\">";
                $a="";
                echo'<option value="'.$a.'">'.$a.'</option>';
                while($donnees=$sql->fetch(PDO::FETCH_ASSOC)){
                    $a=$donnees['ID_type_equi'];
                    if($ID_type_equi==$a){
                        echo'<option value="'.$a.'" selected>'.$a.'</option>';
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
        
        function recuperer_nom_type_equi(){
            global $ID_type_equi,$nom_type_equi;
            try{
                include("connexion.php");
                $sql="SELECT nom_type_equi from type_equipement where ID_type_equi=:id_type";
                $sql=$db->prepare($sql);
                $sql->bindvalue(':id_type',$ID_type_equi);
                $sql->execute();
                while($donnees=$sql->fetch(PDO::FETCH_ASSOC)){
                   $nom_type_equi=$donnees['nom_type_equi'];
                    }
                    $sql->closecursor();
                }
            catch(Exception $e){
                die('Erreur:'.$e->getMessage());
            }
        }
    function Modification_equipement(){
    global $id_equipement,$nom_equipement,$statut_equipement,$quantite_equipement,$quantite_stock_equipement,$ID_type_equi ;

    try{
        include("connexion.php");
        $sql="UPDATE equipement set nom_equipement=:nom,statut_equipement=:statut,quantite_equipement=:quantite,quantite_stock_equipement=:quantite_stock,ID_type_equi=:id_type WHERE id_equipement=:id_equi";
        $sql=$db->prepare($sql);
        $sql->bindvalue(':id_equi',$id_equipement);
        $sql->bindvalue(':nom',$nom_equipement);
        $sql->bindvalue(':quantite',$quantite_equipement);
        $sql->bindvalue(':quantite_stock',$quantite_stock_equipement);
        $sql->bindvalue(':id_type',$ID_type_equi );
        $sql->bindvalue(':statut',$statut_equipement);
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
            $id_equipement="";
            $nom_equipement="";
            $quantite_equipement="";
            $ID_type_equi ="";
            $quantite_stock_equipement="";
            $nom_type_equi="";
            $statut_equipement="";
            
            if(isset($_GET['id_equi'])){
                $id_equipement=$_GET['id_equi'];
                recuperer_equipement();

            }
            if(isset($_POST['id_equipement'])){
                $id_equipement=$_POST['id_equipement'];
            }
            if(isset($_POST['nom_equipement'])){
                $nom_equipement=$_POST['nom_equipement'];
            }
            if(isset($_POST['quantite_equipement'])){
                $quantite_equipement=$_POST['quantite_equipement'];
            }
            if(isset($_POST['quantite_stock_equipement'])){
                $quantite_stock_equipement=$_POST['quantite_stock_equipement'];
            }
            if(isset($_POST['ID_type_equi'])){
                $ID_type_equi=$_POST['ID_type_equi'];
                recuperer_nom_type_equi();
            }
            if(isset($_POST['statut_equipement'])){
                $statut_equipement=$_POST['statut_equipement'];
            }
            if(isset($_POST['btnModifier_equipement'])){
                Modification_equipement();
                header("location:liste_equipement.php");
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
    background-color: #011; /* Couleur bleue pour le formulaire */
    padding: 30px;
    height:100%;
    border-radius: 10px; /* Bord arrondi pour le formulaire */
    color: white; /* Couleur du texte */
    width: 100%; /* Vous pouvez ajuster la largeur selon vos besoins */
    margin-top: 0px; /* Espacement par rapport au haut de la page */
    margin-left:30%;
}
        </style>
         <div class="container py-3">
                <form action="update_equipement.php " method="post" class="row col-8 m-5 g-3 form "  >
                    <h1>Modification d'un  equipement</h1>
                    <div class="formulaire">
                    <div class="col md-5">
                        <div class="col-sm-12">
                            <input type="text" name="id_equipement" placeholder="ecrivez" class="form-control"  value="<?php echo isset($_GET['id_equi']) ? $_GET['id_equi'] : $id_equipement; ?>" id="input2">
                        </div>
                    <div>
                    <div class="col md-5">
                    <label  class="col-sm-5 control-label">nom du materiel:</label>
                        <div class="col-sm-12">
                            <input type="text" name="nom_equipement" placeholder="ecrivez" class="form-control" value ="<?php echo $nom_equipement; ?>" id="input2" required>
                        </div>
                    <div>
                    <div class="col md-5">
                    <label  class="col-sm-5 control-label">Quantite initial des equipements:</label>
                        <div class="col-sm-12">
                            <input type="text" name="quantite_equipement" placeholder="ecrivez" value ="<?php echo $quantite_equipement; ?>" class="form-control" id="input2" required>
                    </div>
                    <div class="col md-5">
                    <label  class="col-sm-5 control-label">Quantite en stock des equipements:</label>
                        <div class="col-sm-12">
                            <input type="text" name="quantite_stock_equipement" placeholder="ecrivez" class="form-control" value ="<?php echo $quantite_stock_equipement; ?>" id="input2" required>
                    </div>  
                    </div>
                    <div  class="col md-5">
                    <label class="form-label">satut equipement</label>
                            <select  class="form-select" name="statut_equipement" value ="<?php echo $statut_equipement; ?>">
                                <option selected="selected">...</option>
                                <option name="statut_equipement">en stock</option>
                                <option name="statut_equipement">empruntes</option>
                                <option name="statut_equipement">en reparation</option>
                            </select>
                    </div> 
                    <div class="col md-5">
                    <label  class="form-label"> Type d'equipements:</label>
                        <div class="col-sm-12">
                           <?php recuperer_id_type_equi();

                           ?>
                        </div>  
                    </div>
                    <div class="col md-9">
                    <label  class="form-label" name="nom_type_equi"> Nom type d'equipements:</label>
                        <div class="col-sm-12">
                           <?php 
                           echo $nom_type_equi;?>
                        </div>  
                    </div>
                    
                        <div class="col md-5 pt-4">
                            <input type="submit" value="Modifier" name="btnModifier_equipement" class="btn btn-primary m-3 col-12">
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