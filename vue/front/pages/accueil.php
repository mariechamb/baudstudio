<?php

//<!-- I INCLUDE THE PROJECTS MODEL HERE  -->
include './model/projects.php'; 
//<!-- =========================== -->

//<!-- J'appelle ma fonction pour récupérer les infos de mon portfolio  -->
$portfolioProjets = getPortfolioProjectsInfo ();
//<!-- =========================== -->

//<!-- I INCLUDE THE HEAD HERE  -->
include './vue/front/sections/head.phtml'; 
//<!-- =========================== -->

//<!-- I INCLUDE THE HEADER HERE  -->
include './vue/front/sections/header.phtml'; 
//<!-- =========================== -->

// <!-- I INCLUDE THE VIEW HERE  -->
include './vue/front/sections/landing.phtml'; 
//<!-- =========================== -->

//<!-- I INCLUDE THE FOOTER HERE  -->
include './vue/front/sections/footer.phtml'; 
//<!-- ========================== -->

?>