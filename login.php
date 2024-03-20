<?php session_start(); 
// Vérification des informations d'identification de l'utilisateur
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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
        if ($role === 'admin') {
            header('Location: admin_session.php');
            exit;
        } elseif ($role === 'utilisateur') {
            header('Location: utilisateur_session.php');
            exit;
        }
    } else {
        // Les informations d'identification sont incorrectes, vous pouvez afficher un message d'erreur ou effectuer une autre action appropriée
        echo 'Identifiants invalides.';
    }
}
?>?>
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
                <header>BIENVENUE </h4><img src="../PROJETS/ime.png" alt="ime" class="image"width="50%"/></header>
                
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
                    <a href="accueil.php"class="btn btn-danger  custom-width" id="enre">se connecter</a>
                </form>
            </div>
        </div>   
        
        </body>
        </html>
        