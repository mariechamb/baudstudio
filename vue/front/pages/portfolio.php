<?php

//<!-- Je vais chercher mes projets -->
include '../../../model/projects.php'; 
//<!-- =========================== -->

//<!-- J'appelle ma fonction pour récupérer les infos de mon portfolio  -->
$projets = getProjectsInfo ();
//<!-- =========================== -->

//<!-- I INCLUDE THE HEAD HERE  -->
include '../sections/head.phtml'; 
//<!-- =========================== -->

//<!-- I INCLUDE THE HEADER HERE  -->
include '../sections/header.phtml'; 
//<!-- =========================== -->

//Affichage de la vue
include '../sections/portfolio.phtml'; 

//<!-- I INCLUDE THE FOOTER HERE  -->
include '../sections/footer.phtml'; 
//<!-- ========================== -->

?>