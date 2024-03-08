<div class="nav">
<?php
    include'navigation.php';
?>
            </div>


<?php
// Fonction de connexion à la base de données

function connectDB() {
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=nom_de_votre_base_de_donnees', 'utilisateur', 'mot_de_passe');
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $bdd;
    } catch(PDOException $e) {
        die('Erreur : ' . $e->getMessage());
    }
}

// Fonction pour récupérer les données à modifier
function getDonneesAModifier($id) {
    $bdd = connectDB();
    $query = "SELECT * FROM nom_de_votre_table WHERE id = :id";
    $stmt = $bdd->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    if($stmt->rowCount() > 0) {
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } else {
        return false;
    }
}

// Fonction pour modifier les données
function modifierDonnees($id, $nouveau_champ1, $nouveau_champ2) {
    $bdd = connectDB();
    $query = "UPDATE nom_de_votre_table SET champ1 = :champ1, champ2 = :champ2 WHERE id = :id";
    $stmt = $bdd->prepare($query);
    $stmt->bindParam(':champ1', $nouveau_champ1);
    $stmt->bindParam(':champ2', $nouveau_champ2);
    $stmt->bindParam(':id', $id);

    return $stmt->execute();
}

// Vérifier si l'ID est défini dans l'URL
if(isset($_GET['id']) && !empty($_GET['id'])) {
    $donnees = getDonneesAModifier($_GET['id']);

    if($donnees !== false) {
        // Remplir les champs du formulaire avec les données récupérées
        $id = $donnees['id'];
        $champ1 = $donnees['champ1'];
        $champ2 = $donnees['champ2'];

        // Vérifier si le formulaire a été soumis pour la modification
        if(isset($_POST['modifier'])) {
            $nouveau_champ1 = $_POST['champ1'];
            $nouveau_champ2 = $_POST['champ2'];

            if(modifierDonnees($id, $nouveau_champ1, $nouveau_champ2)) {
                echo "Les données ont été modifiées avec succès.";
            } else {
                echo "Erreur lors de la modification des données.";
            }
        }
    } else {
        echo "Aucune ligne trouvée";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de modification</title>
    <!-- Inclure les fichiers CSS Font Awesome et Bootstrap -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Formulaire de modification</h2>
        <form action="" method="POST">
            <!-- Champ caché pour passer l'ID -->
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <!-- Champs du formulaire remplis avec les données récupérées -->
            <div class="form-group">
                <label for="champ1">Champ 1 :</label>
                <input type="text" class="form-control" id="champ1" name="champ1" value="<?php echo $champ1; ?>">
            </div>
            <div class="form-group">
                <label for="champ2">Champ 2 :</label>
                <input type="text" class="form-control" id="champ2" name="champ2" value="<?php echo $champ2; ?>">
            </div>
            <!-- Ajoutez les autres champs selon votre structure de base de données -->
            <button type="submit" class="btn btn-primary" name="modifier">Modifier</button>
        </form>
    </div>
</body>
</html>
