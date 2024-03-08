<html>
  <head>
    <link rel="stylesheet" href="fontawesome-free-6.4.2-web\css\all.min.css">
    <link rel="stylesheet" href="bootstrap-5.1.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/lsts_materiels.css">
    <?php
    function Enregistrer_materiel(){
    global $code_chauffeur,$nom_chauffeur,$date_naissance,$type_permis;
    try{
        include("connexion.php");
        $sql="INSERT INTO chauffeur(code_chauffeur,nom_chauffeur,date_naissance,type_permis) values(:code,:nom,:daten,:typep)";
        $sql=$db->prepare($sql);
        $sql->bindvalue(':code',$code_chauffeur);
        $sql->bindvalue(':nom',$nom_chauffeur);
        $sql->bindvalue(':daten',$date_naissance);
        $sql->bindvalue(':typep',$type_permis);
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
            $code_chauffeur="";
            $nom_chauffeur="";
            $date_naissance="";
            $type_permis="";
            if(isset($_POST['code_chauffeur'])){
                $code_chauffeur=$_POST['code_chauffeur'];
            }
            if(isset($_POST['nom_chauffeur'])){
                $nom_chauffeur=$_POST['nom_chauffeur'];
            }
            if(isset($_POST['date_naissance'])){
                $date_naissance=$_POST['date_naissance'];
            }
            if(isset($_POST['type_permis'])){
                $type_permis=$_POST['type_permis'];
            }
            if(isset($_POST['btnenregistrer_chauffeur'])){
                Enregistrer_chauffeur();
            }
        ?>
          <?php
        include'header.php';
      ?>
      <main id="main">
        <div class="nav">
          <?php
            include'navigation1.php';
          ?>
        </div>
        <div class="container">
          <div class=" ">
            <h2>voici la liste des emprunts</h2>
            <a href=" ajout_mat.php"class="btn btn-success my-6"name="enre" id="ajout" custom-width>Ajouter un emprunt</a>
            
            <table class="table table-striped mt-3">
              <thead class="table-dark">
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">nomMateriel </th><a href="enregistrement.php " class="fleche"><i class="fa fa-long-arrow-left" ></i></a>

                  <th scope="col">nomEtuiant</th>
                  <th scope="col">Etat</th>
                  <th scope="col">Actions</th>
                </tr>
              </thead>
              <tbody class="table-group-divider">
                <tr>
                  <th scope="row">1</th>
                  <td>Mark</td>
                  <td>Otto</td>
                  <td>@mdo</td>
                  <td>
                    <i class="fa fa-edit "></i>
                    <i class="fa fa-trash  red-icon"></i>

                  </td>
                </tr>
                <tr>
                  <th scope="row">2</th>
                  <td>Jacob</td>
                  <td>Thornton</td>
                  <td>@fat</td>
                  <td>
                    <i class="fa fa-edit "></i>
                    <i class="fa fa-trash  red-icon"></i>

                  </td>
                </tr>
                <tr>
                  <th scope="row">3</th>
                  <td colspan="2">Larry the Bird</td>
                  <td>@twitter</td>
                  <td>
                <i class="fa fa-edit "></i>
                <i class="fa fa-trash  red-icon"></i></i>                
                  </td>
                </tr>
                <tr>
                  <th scope="row">4</th>
                  <td colspan="2">Larry the Bird</td>
                  <td>@twitter</td>
                  <td>
                  <i class="fa fa-edit "></i>
                  <i class="fa fa-trash  red-icon"></i></i>                  

                  </td>
                </tr>
            </tbody>
          </table>
          </div>  
      </div>
    </main>
    <div class="footer">
    <?php
      include('footer.php')
      ?>
        </div>
  </body>    
</html>