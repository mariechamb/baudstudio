<?php 

     //<!-- I INCLUDE THE PROJECTS MODEL HERE  -->
    include '../model/users.php'; 

    // Je récupère les données envoyées dans des variables
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Je vérifie que les champs ne soient pas vides
    if (!empty($username) && !empty($password)) {
        // var_dump("username et password is set");

          // J'appelle ma fonction qui vérifie si le username existe
          $username = verifyIfUserExist ($username);

          // Je vérifie si le username existe bien..
          if ($username) {
            $username = $username[0][1]; // Je le sors du tableau
            //var_dump($username);

              // .. alors je vais récupérer le mot de pass haché correspondant
              $hash = (verifyPassword ($username))[0];


              // Je vérifie si le mot de passe donné correspond bien avec le mot de passe attendu avec ma fonction dédiée
              if (password_verify($password, $hash)) { 
                $_SESSION['username'] = $username;
                
                // Je récupère le statut de l'utilisateur (0 pour non autorisé et 1 pour autorisé)
                if (verifystatus($username) == "1") {
                  // Si l'utilisateur est existant et autorisé, je démarre la session
                  session_start();
                  // et je le redirige vers le BO
                  header('Location: /controleur/bo-projects.php');
                } else {
                  // Si l'utilisateur n'est pas autorisé, je lui affiche un message d'erreur
                  $errMessage = "Vous ne faites pas partie des utilisateurs autorisés, déso :/";
                  header('Location: /controleur/login.php?errMessage='.$errMessage);
                 
                }
                

              } else {
                $errMessage = "Le mot de passe est invalide";
                header('Location: /controleur/login.php?errMessage='.$errMessage);
                exit;
              
                //$errMessage = "Le mot de passe est invalide";
                //echo $errMessage;
              }


          } else {
            // Si le nom utilisateur n'existe pas
            $errMessage = "Ce nom d'utilisateur n'existe pas";
            header('Location: /controleur/login.php?errMessage='.$errMessage);
            exit;
          }


    } else {
      // Si les champs username et password sont vides
      $errMessage = "Merci de remplir votre nom utilisateur et mot de passe";
      header('Location: /controleur/login.php?errMessage='.$errMessage);
    } 

    

  ?>