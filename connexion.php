<?php
$pdo_options[PDO::ATTR_ERRMODE]=PDO::ERRMODE_EXCEPTION;
$db=new PDO('mysql:host=localhost;dbname=projet_stage','root','',$pdo_options);
$db->exec("SET NAMES 'utf8'");
/*define('DB_SERVER','localhost');
define('DB_USERNAME','root');
define('DB_PASSWORD','');
define('DB_NAME','projet_stage');
//connexion a la base de donnees//
$link=mysqli_connect(DB_SERVER,DB_USERNAME, ,DB_NAME);
//verifier la connexion//
if($link===false){
    die("ERROR:could not connect.".mysqli_connect_error());
}*/
?>
