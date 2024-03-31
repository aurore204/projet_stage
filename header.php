<?php

// Vérifie si l'utilisateur est connecté et récupère son nom
if (isset($_SESSION['nom'])) {
    $nom = $_SESSION['nom'];
} else {
    $nom = ""; // Définir un nom par défaut si aucun utilisateur n'est connecté
}
?>
<?php
include("connexion.php");
?>
<html>
<head >
    <meta name="viewport" content="width-device-width, initial-scale=1.0">
    <link rel= "stylesheet" href="css/header.css" type="text/css">
    <link rel="stylesheet" href="fontawesome-free-6.4.2-web\css\all.min.css">
    <link rel="stylesheet" href="bootstrap-5.1.3-dist/css/bootstrap.min.css.map">
    <title>Page d'accueil avec dashboard</title>
</head>
<body>
<header class="header">
        <div class="header--wrapper">
            <div class="header--titlle">
                <img src="../PROJETS/ime.png" alt="ime" class="image" width="50px"/>
                <h2>welcome IME</h2>
            </div>
            <div class="user--info">
                <div class="search--box">
                    <i class="fas fa-search" style="font-size:20px"></i>
                    <input type="text" placeholder="rechercher"/>
                </div>  
                <!-- Afficher le nom de l'utilisateur -->
                <i class="fa fa-user" style="font-size:20px"></i><?php echo $nom; ?>
            </div>
        </div>
</header>
</body>
</html>
