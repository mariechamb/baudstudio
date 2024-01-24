<?php 

     //<!-- I INCLUDE THE PROJECTS MODEL HERE  -->
    include '../model/users.php'; 

    // Je récupère les données envoyées dans des variables
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Je vérifie que les champs ne soient pas vides
    if (!empty($username) && !empty($password)) {
        //var_dump("username et password is set");

        // Je vérifie que le username/mail ne soit pas déjà existant

          // J'appelle la fonction qui vérifie si le nom utilisateur existe déjà
          $username = verifyIfUserExist ($username);

            if (!$username) { // Si le nom dutilisateur n'existe pas
              $username = $_POST['username'];
              $password = password_hash($password, PASSWORD_DEFAULT);
              //var_dump($username, $password);

              //Entrer le nouvel utilisateur dans la BDD
              // j'appelle ma fonction 
              insertNewUser ($username, $password);
              $errMessage = "Votre inscription a bien était prise en compte, merci de patienter jusqu'à ce que l'administtrateur la valide :)";
              header('Location: /controleur/login.php?errMessage='.$errMessage);
              exit;
              
            } else { // Si le nom d'utilisateur existe déjà
              $errMessage = "L'email existe déjà";
              header('Location: /controleur/login.php?errMessage='.$errMessage);
              exit;
            }

    } else {
      // Si les champs nom d'utilisateur et mot de pass ne sont pas rentrés
      $errMessage = "Merci de remplir votre nom utilisateur et mot de passe";
      header('Location: /controleur/signup.php?errMessage='.$errMessage);
      exit;
    } 

    

  ?>