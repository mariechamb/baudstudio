<?php

//<!-- I INCLUDE THE PROJECTS MODEL HERE  -->
include '../model/users.php'; 
//<!-- =========================== -->

// J'appelle ma fonction pour vérifier si le nom utilisateur existe dans la BDD
$allUsers = getAllUsers ();
//<!-- =========================== -->

//<!-- I INCLUDE THE HEAD HERE  -->
include '../vue/front/sections/head.phtml'; 
//<!-- =========================== -->

//<!-- I INCLUDE THE HEADER HERE  -->
include '../vue/front/sections/header.phtml'; 
//<!-- =========================== -->

// <!-- I INCLUDE THE VIEW HERE  -->
include '../vue/bo/login.phtml'; 
//<!-- =========================== -->


?>