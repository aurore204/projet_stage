<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>delete filiere</title>
</head>
<body>
<?php
    $code_fil="";
try{
    include("connexion.php");
    $code_fil=$_GET['code'];
    $sql="DELETE FROM filiere where code_fil=:code";
    $sql=$db->prepare($sql);
    $sql->bindvalue(':code',$code_fil);
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




