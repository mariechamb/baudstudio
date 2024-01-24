
<!-- Je vais chercher mes projets -->
<?php include '../model/projects.php'; ?>
<!-- =========================== -->

<!-- J'appelle ma fonction pour récupérer les infos de mon portfolio  -->
<?php $projets = getProjectsInfo (); ?>
<!-- =========================== -->

<!-- INCLUDE THE HEAD HERE -->
<?php include('../vue/front/sections/head.phtml'); ?>
<!-- =========================== -->

<!-- INCLUDE THE HEADER HERE -->
<?php include('../vue/bo/bo-header.phtml'); ?>
<!-- =========================== -->

<!-- INCLUDE THE MAIN HERE -->
<?php include('../vue/bo/bo-projects.phtml'); ?>
<!-- =========================== -->