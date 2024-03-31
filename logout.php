<?php
session_start();
// Destruction de toutes les données de la session
session_unset();
// Destruction de la session
session_destroy();
// Redirection vers la page de connexion
header('Location: login.php');
exit;
?>
