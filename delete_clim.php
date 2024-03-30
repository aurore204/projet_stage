<?php
session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>delete climatiseur</title>
</head>
<body>
<?php
    $id_clim="";
try{
    include("connexion.php");
    $id_clim=$_GET['id'];
    $sql="DELETE FROM climatiseur where id_clim=:id";
    $sql=$db->prepare($sql);
    $sql->bindvalue(':id',$id_clim);
    $sql->execute();
    if($sql){
        header("location:liste_clim.php");
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




