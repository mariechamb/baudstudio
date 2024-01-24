<?php 

// ***************************************************
// Fonction qui me connecte automatiquement à ma BDD -- NON FONCTIONNEL
function connectToDatabase (){

    try {
        // Connexion à la BDD

        // En local
        //$pdo = new PDO('mysql:host=localhost:8889;dbname=mdsgn', "root", "root");

        // Sur mon VPS
        $pdo = new PDO('mysql:host=localhost:3306;dbname=baudstudio', "marie", "gago854RHH");
        return $pdo;
    }
    catch(exception $e) {
        die('Erreur '.$e->getMessage());
    }
}   
// ***************************************************
// ***************************************************

// ***************************************************
// Fonction qui récupère username et password des utlisateurs
function getAllUsers () {

    // Connexion à la BDD
    $pdo = connectToDatabase ();

    // Faire la requette
    $query = $pdo->prepare('
    SELECT * FROM users
    ORDER BY id_user DESC
    ');

    // Exécution de la requete 
    $query->execute();

    $allUsers = $query->fetchAll();
    return $allUsers;

}

// ***************************************************
// ***************************************************

// ***************************************************
// Fonction qui vérifie si il y a bien une ligne de la BDD qui correspond au nom d'utilisateur donné
function verifyIfUserExist ($username) {

    // Connexion à la BDD
    $pdo = connectToDatabase ();

    // Faire la requette
    $query = $pdo->prepare('
    SELECT * FROM users
    WHERE username =?
    ');

    // Exécution de la requete 
    $query->execute([$username]);

    $username = $query->fetchAll();
    return $username;


}

// ***************************************************
// ***************************************************


// ***************************************************
// Fonction qui récupère le hash de password qui correspond au nom d'utilisateur donné
function verifyPassword ($username) {

    // Connexion à la BDD
    $pdo = connectToDatabase ();

    // Faire la requette
    $query = $pdo->prepare('
    SELECT password FROM users
    WHERE username =?
    ');
    
    // Exécution de la requete 
    $query->execute([$username]);

    $hash = $query->fetch();
    return $hash;


}

// ***************************************************
// ***************************************************

// ***************************************************
// Fonction qui récupère le statut de l'utilisateur à partir du mail/login (0 pour non autorisé et 1 pour autorisé)
function getstatus($username) {

    // Connexion à la BDD
    $pdo = connectToDatabase ();

    // Faire la requette
    $query = $pdo->prepare('
    SELECT status FROM users
    WHERE username =?
    ');

    // Exécution de la requete 
    $query->execute([$username]);

    $status = $query->fetch();
    return $status[0];


}

// ***************************************************
// ***************************************************


// ***************************************************
// Fonction qui récupère le statut de l'utilisateur (0 pour non autorisé et 1 pour autorisé)
function verifystatus($username) {

    // Connexion à la BDD
    $pdo = connectToDatabase ();

    // Faire la requette
    $query = $pdo->prepare('
    SELECT status FROM users
    WHERE username =?
    ');

    // Exécution de la requete 
    $query->execute([$username]);

    $status = $query->fetch();
    return $status[0];


}

// ***************************************************
// ***************************************************


// ***************************************************
// Fonction qui insert un nouvel utilisateur en BDD
function insertNewUser ($username, $password) {

  // Connexion à la BDD
  $pdo = connectToDatabase ();

  // Faire la requette
    $query = $pdo->prepare("
    INSERT INTO users (username, password) 
    VALUES (:username, :password)
	");

    $query->bindParam(':username', $username);
    $query->bindParam(':password', $password);
  
    // Exécution de la requête
    $query->execute();

    // Enregistrement terminé, on redirige sur la page d'accueil
     echo 'enregistrement ok !';
     var_dump('enregistrement ok');
    //   echo '<a href="https://www.baudstudio.fr/">RETOUR</a>';
     //exit();	

}

// ***************************************************
// ***************************************************





?>