<?php   
session_start(); //Pour s'assurer qu'il y a une session
session_destroy(); //detruire la session
header("location:/index.php"); //rediriger vers "index.php" après déconnexion
exit();
?>