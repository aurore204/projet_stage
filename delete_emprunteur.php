<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>delete emprunteur</title>
</head>
<body>
<?php
    $matricule_emprunteur="";
try{
    include("connexion.php");
    $matricule_emprunteur=$_GET['matricule'];
    $sql="DELETE FROM emprunteur where matricule_emprunteur=:matricule";
    $sql=$db->prepare($sql);
    $sql->bindvalue(':matricule',$matricule_emprunteur);
    $sql->execute();
    if($sql){
        header("location:liste_filiere.php");
    }else{
        echo"Failed to delete";
    } $sql->closecursor();
}
    catch(Exeption $e){
        die('Erreur:'.$e->getMessage());
    }

?>
</body>
</html>




