<?php
session_start();
include("connexion.php");

if (isset($_POST['envoyer'])) {
    if (isset($_POST['nom']) && isset($_POST['numero']) && isset($_POST['mot_passe'])) {
        $nom = $_POST['nom'];
        $numero = $_POST['numero'];
        $mot_passe = $_POST['mot_passe'];

        if ($mot_passe === 'admin' && $nom == 'kouosseu') {
            // Stockage des informations d'identification dans la session
            $_SESSION['role'] = 'admin';
            $_SESSION['nom'] = $nom;
            header('Location: accueil.php');
            exit;
        } elseif ($mot_passe === 'user' && $nom == 'ndjapa') {
            // Stockage des informations d'identification dans la session
            $_SESSION['role'] = 'user';
            $_SESSION['nom'] = $nom;
            header('Location: accueil.php');
            exit;
        } else {
            // Identifiants invalides
            $_SESSION['message'] = 'Identifiants invalides.';
        }
    } else {
        // Tous les champs ne sont pas remplis
        $_SESSION['message'] = 'Veuillez remplir tous les champs.';
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>se connecter</title>
    <link rel="stylesheet" href="bootstrap-5.1.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/login.css" type="text/css">
</head>

<body>
    <div class="container">
        <div class="box form-box">
            <header>BIENVENUE</header>
            <?php if (isset($_SESSION['message'])) : ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $_SESSION['message']; ?>
                </div>
                <?php unset($_SESSION['message']); ?>
            <?php endif; ?>
            <form login="form" method="POST" action="login.php">
                <div class="field input">
                    <label for="username">Entrer votre nom:</label>
                    <input type="text" placeholder="Entrer votre nom" name="nom" id="username" required>
                </div>
                <div class="field input">
                    <label for="">Entrer votre numero:</label>
                    <input type="text" placeholder="Entrer votre numero" name="numero" id="username" required>
                </div>
                <div class="field input">
                    <label for="password">Entrer le mot de passe:</label>
                    <input type="password" placeholder="Entrer le mot de passe" name="mot_passe" id="username" required>
                </div>
                <input type="submit" class="btn btn-danger custom-width" name="envoyer" value="Se connecter" id="enre">
            </form>
        </div>
    </div>
</body>

</html>
