<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>delete emprunt</title>
</head>
<body>
<?php
    $id_emprunt="";
try{
    include("connexion.php");
    $id_emprunt=$_GET['id'];
    $sql="DELETE FROM emprunt where id_emprunt=:id";
    $sql=$db->prepare($sql);
    $sql->bindvalue(':id',$id_emprunt);
    $sql->execute();
    if($sql){
        header("location:liste_emprunts.php");
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




