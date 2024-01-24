<?php

// Je récupère l'id du projet demandé
$id_projet = $_GET['id'];

//$racineURL = "../assets/img/portfolio/";

//<!-- I INCLUDE THE PROJECTS MODEL HERE  -->
include '../../../model/projects.php'; 
//<!-- =========================== -->

//<!-- J'appelle ma fonction pour récupérer les infos de mon portfolio  -->
$projet = getProjectInfo ($id_projet);
//<!-- =========================== -->

//<!-- I INCLUDE THE HEAD HERE  -->
include '../sections/head.phtml'; 
//<!-- =========================== -->

//<!-- I INCLUDE THE HEADER HERE  -->
include '../sections/header.phtml'; 
//<!-- =========================== -->

//Affichage de la vue
include '../sections/portfolio_detail.phtml'; 

//<!-- I INCLUDE THE FOOTER HERE  -->
include '../sections/footer.phtml'; 
//<!-- ========================== -->

?>
    