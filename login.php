<?php
        $link = mysqli_connect("127.0.0.1", "root", "", "projet_stage");
//$link est l’identifiant de lien retourne par la fonction mysqli_connect
// c’est une ressource
/* Verification de la connexion */
if (mysqli_connect_errno()) {
 echo("Echec de la connexion :" . mysqli_connect_error());
 exit();}
 mysqli_select_db($link, "projet_stage");
/*fin verification*/
$id="";
$nom="";
$numero="";
$mot_passe="";
//insertion dans la base de donnees//
if(isset($_POST['envoyer'])){
    if(isset($_POST['nom']) AND isset($_POST['numero']) AND isset($_POST['motpasse'])){
            $id="";
            $nom=$_POST['nom'];
            $numero=$_POST['numero'];
            $mot_passe=$_POST['mot_passe'];
            $_query="INSERT INTO users(id,nom,numero,mot_passe) VALUES('$id','$nom','$numero','$mot_passe')";

                }}

//if($motpasse=$_resul){
    /*header('location:accueil.php');*/
//}
//else{
    //echo("erreur lors de l'insertion".mysqli_error($link));
//}
//mysqli_close($link);//
        ?>
<html>
    <head>
        <title></title>
        <link rel="stylesheet" href="bootstrap-5.1.3-dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/login.css" type="text/css">
    </head>
    <body>
    
     <div class="container">
            <div class="box form-box">
                <header>BIENVENUE <img src="../PROJETS/ime.png" alt="ime" class="image"width="50%"/></header>
                
                <form login="form" method="POST" action="login.php" >
                    <div class="field input">
                       <label  for="username" >entrer votre nom:</label>
                        <input type ="text" placeholder="entrer votre nom" name="nom" id="username">
                    </div>
                    <div class="field input">
                        <label for="">entrer votre numero:</label>
                        <input type ="text" placeholder="entrer votre numero" name="numero" id="username">
                    </div>
                    <div class="field input">
                        <label  for="password">entrer le password:</label>
                        <input type ="password" placeholder="entrer le mot de passe" name="mot_passe" id="username" >
                    </div>    
                    <a href="accueil.php"class="btn btn-primary  custom-width">Mon bouton</a>
                </form>
            </div>
        </div>   
        
        </body>
        </html>
        