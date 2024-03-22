<html>
    <head>
        <title>se connecter</title>
        <link rel="stylesheet" href="bootstrap-5.1.3-dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/login.css" type="text/css">
    </head>
<?php session_start(); 
include("connexion.php");
// Vérification des informations d'identification de l'utilisateur
/*if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupération du mot de passe et du rôle soumis par le formulaire de connexion
    $password = $_POST['password'];
    $role = $_POST['role'];

    // Vérification du mot de passe et du rôle (exemple simplifié)
    // Vous devez implémenter votre propre logique de vérification des informations d'identification
    if ($password === 'mot_de_passe' && $role === 'admin') {
        // Démarrage de la session
        session_start();

        // Enregistrement des données de session
        $_SESSION['role'] = $role;

        // Redirection vers la page appropriée en fonction du rôle
        
    }*/

  
$id="";
$nom="";
$numero="";
$mot_passe="";
//insertion dans la base de donnees//
if(isset($_POST['envoyer'])){
    if(isset($_POST['nom']) AND isset($_POST['numero']) AND isset($_POST['mot_passe'])){
            $id="";
            $nom=$_POST['nom'];
            $numero=$_POST['numero'];
            $mot_passe=$_POST['mot_passe'];
            if ($mot_passe === 'admin' && $nom=='kouosseu') {
                header('Location: accueil.php');
                exit;
            } elseif ($mot_passe === 'utilisateur' && $nom=='ndjapa') {
                header('Location: utilisateur_session.php');
                exit;
            }
        } else {
            // Les informations d'identification sont incorrectes, vous pouvez afficher un message d'erreur ou effectuer une autre action appropriée
            echo 'Identifiants invalides.';
        }

                }

//if($motpasse=$_resul){
    /*header('location:accueil.php');*/
//}
//else{
    //echo("erreur lors de l'insertion".mysqli_error($link));
//}
//mysqli_close($link);//
        ?>

    <body>
        <?php
    $id="";
    $nom="";
    $numero="";
    $mot_passe="";
    //insertion dans la base de donnees//
 ?>
     <div class="container">
            <div class="box form-box">
                <header>BIENVENUE </h4><img src="../PROJETS/ime.png" alt="ime" class="image"width="50%"/></header>
                
                <form login="form" method="POST" action="login.php" >
                    <div class="field input">
                       <label  for="username" >entrer votre nom:</label>
                        <input type ="text" placeholder="entrer votre nom" name="nom" id="username" required>
                    </div>
                    <div class="field input">
                        <label for="">entrer votre numero:</label>
                        <input type ="text" placeholder="entrer votre numero" name="numero" id="username" required>
                    </div>
                    <div class="field input">
                        <label  for="password">entrer le password:</label>
                        <input type ="password" placeholder="entrer le mot de passe" name="mot_passe" id="username" required >
                    </div>    
                    <input type="submit" class="btn btn-danger  custom-width" name="envoyer" value="se connecter" id="enre">
                </form>
            </div>
        </div>   
        
        </body>
        </html>
        