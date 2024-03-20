<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>delete_utilisateur</title>
</head>
<body>
<?php
    $id_user="";
try{
    include("connexion.php");
    $id_user=$_GET['id'];
    $sql="DELETE FROM user where id_user=:id";
    $sql=$db->prepare($sql);
    $sql->bindvalue(':id',$id_user);
    $sql->execute();
    if($sql){
        header("location:liste_user.php");
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




