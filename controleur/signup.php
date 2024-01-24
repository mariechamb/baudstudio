<?php

//<!-- I INCLUDE THE PROJECTS MODEL HERE  -->
include '../model/users.php'; 
//<!-- =========================== -->

// J'appelle ma fonction pour vérifier si le nom utilisateur existe dans la BDD

$allUsers = getAllUsers ();

// Si l'utilisateur existe, j'affiche un message proposant de se connecter

// Si l'utilisateur n'existe pas, j'enregistre en tant que potentiel nouvel utilisateur inactif par défaut

//<!-- I INCLUDE THE HEAD HERE  -->
include '../vue/front/sections/head.phtml'; 
//<!-- =========================== -->

//<!-- I INCLUDE THE HEADER HERE  -->
include '../vue/front/sections/header.phtml'; 
//<!-- =========================== -->

// <!-- I INCLUDE THE VIEW HERE  -->
include '../vue/bo/signup.phtml'; 
//<!-- =========================== -->

//<!-- I INCLUDE THE FOOTER HERE  -->
// include 'vue/footer.php'; 
//<!-- ========================== -->

?>