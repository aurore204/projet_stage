<?php
session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    $id_equipement="";
try{
    include("connexion.php");
    $id_equipement=$_GET['id_equi'];
    $sql="DELETE FROM equipement where id_equipement=:id";
    $sql=$db->prepare($sql);
    $sql->bindvalue(':id',$id_equipement);
    $sql->execute();
    if($sql){
        header("location:liste_equipement");
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




