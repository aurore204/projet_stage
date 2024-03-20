<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    $ID_type_emprunteur="";
try{
    include("connexion.php");
    $ID_type_emprunteur=$_GET['ID'];
    $sql="DELETE FROM type_emprunteur where ID_type_emprunteur=:ID";
    $sql=$db->prepare($sql);
    $sql->bindvalue(':ID',$ID_type_emprunteur);
    $sql->execute();
    if($sql){
        header("location:listetype_emprt");
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




