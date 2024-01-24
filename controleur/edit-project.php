

<!-- Je vais chercher mes projets -->
<?php include '../model/projects.php'; ?>
<!-- =========================== -->

<!-- Je récupère l'id du projet et j'appelle ma fonction pour récupérer les infos de mon portfolio correnspodant à l'id récupéré  -->
<?php $id_projet = $_GET["id"]; ?>

<!-- Si l'id récupéré est différent de 0, je récupère les infos du projet -->
<?php

if ($id_projet == 0) {
    

} else {
    $projet = getProjectInfo ($id_projet); 
}

?>

<!-- =========================== -->

<!-- INCLUDE THE HEAD HERE -->
<?php include('../vue/front/sections/head.phtml'); ?>
<!-- =========================== -->

<!-- INCLUDE THE HEADER HERE -->
<?php include('../vue/bo/bo-header.phtml'); ?>
<!-- =========================== -->

<!-- INCLUDE THE MAIN HERE -->
<?php include('../vue/bo/edit-project.phtml'); ?>
<!-- =========================== -->