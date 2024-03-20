<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>delete_type_equi</title>
</head>
<body>
<?php
    $id_type_equi="";
try{
    include("connexion.php");
    $id_type_equi=$_GET['id'];
    $sql="DELETE FROM type_equipement where ID_type_equi=:id";
    $sql=$db->prepare($sql);
    $sql->bindvalue(':id',$id_type_equi);
    $sql->execute();
    if($sql){
        header("location:liste_type_equi");
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




