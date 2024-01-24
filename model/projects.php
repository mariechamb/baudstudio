<?php 

// ***************************************************
// Fonction qui me connecte automatiquement à ma BDD 
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
// Fonction qui récupère le nom et infos de mes projets pour la page d'accueil client : les 6 derniers projets 

function getPortfolioProjectsInfo () {

    // Connexion à la BDD
    $pdo = connectToDatabase ();

    // Requête
    $query = $pdo->prepare('
    SELECT * FROM projets
    WHERE soft_delete = 0
    ORDER BY id_projet DESC
    LIMIT 6
    ');


    // Exécution de la requête 
    $query->execute();

    $portfolioProjets = $query->fetchAll();
    return $portfolioProjets;

}

// ***************************************************
// ***************************************************

// ***************************************************
// Fonction qui récupère le nom et infos de tous mes projets pour mon BO, trié par date de livraison

function getProjectsInfo () {

    // Connexion à la BDD
    $pdo = connectToDatabase ();

    // Requête
    $query = $pdo->prepare('
    SELECT * FROM projets
    WHERE soft_delete = 0
    ORDER BY date_livraison DESC
    ');


    // Exécution de la requête 
    $query->execute();

    $projets = $query->fetchAll();
    return $projets;

}

// ***************************************************
// ***************************************************



// ***************************************************
// Fonction qui récupère le nom et infos de mes projets en fonction de l'id demandé

function getProjectInfo ($id_projet) {

    // Connexion à la BDD
    $pdo = connectToDatabase ();

    // Requête
    $query = $pdo->prepare('
    SELECT * FROM projets
    WHERE id_projet =?
    ');
    

    // Exécution de la requête 
    $query->execute([$id_projet]);

    $projet = $query->fetch();
    return $projet;


}

// ***************************************************
// ***************************************************


// ***************************************************
// Fonction qui insère un nouveau projet dans ma base de données

function insertNewProject ($nom, $categorie, $description1, $description2, $client, $realisation, $date_livraison, $prestation, $technos, $img1, $img2, $img3, $maquette1, $maquette2, $maquette3, $pourcentage, $budget) {

    // Connexion à la BDD
    $pdo = connectToDatabase ();

    // Requête
	$query = $pdo->prepare("
	INSERT INTO projets (nom, categorie, description1, description2, client, realisation, date_livraison, prestation, technos, img1, img2, img3, maquette1, maquette2, maquette3, pourcentage, budget) 
    VALUES (:nom, :categorie, :description1, :description2, :client, :realisation, :date_livraison, :prestation, :technos, :img1, :img2, :img3, :maquette1, :maquette2, :maquette3, :pourcentage, :budget)
	");

    $query->bindParam(':nom', $nom);
    $query->bindParam(':categorie', $categorie);
    $query->bindParam(':description1', $description1);
    $query->bindParam(':description2', $description2);
    $query->bindParam(':client', $client);
    $query->bindParam(':realisation', $realisation); 
    $query->bindParam(':date_livraison', $date_livraison);
    $query->bindParam(':prestation', $prestation);
	$query->bindParam(':technos', $technos);
	$query->bindParam(':img1', $img1);
	$query->bindParam(':img2', $img2);
	$query->bindParam(':img3', $img3);
	$query->bindParam(':img3', $img3);
	$query->bindParam(':maquette1', $maquette1);
	$query->bindParam(':maquette2', $maquette2);
    $query->bindParam(':maquette3', $maquette3);
    $query->bindParam(':pourcentage', $pourcentage);
    //$query->bindParam(':budget', $budget);
	$query->bindParam(':budget', $budget, PDO::PARAM_INT); // parametre INTeger

    // Exécution de la requête
	$query->execute();

    // Enregistrement terminé, on redirige sur la page d'accueil du BO
    header("Location: https://www.baudstudio.fr/controleur/bo-projects.php");
    exit();	

}

// ***************************************************
// ***************************************************

// ***************************************************
// Fonction qui met à jour les infos d'un projet dans ma base de données

function updateProject ($id, $nom, $categorie, $description1, $description2, $client, $realisation, $date_livraison, $prestation, $technos, $img1, $img2, $img3, $maquette1, $maquette2, $maquette3, $pourcentage, $budget) {

    // Connexion à la BDD
    $pdo = connectToDatabase ();

    // Requête
	$query = $pdo->prepare("
	UPDATE projets 
    SET nom =:nom, categorie =:categorie, description1 =:description1, description2 =:description2, client =:client, realisation =:realisation, date_livraison =:date_livraison, prestation =:prestation, technos =:technos, img1 =:img1, img2 =:img2, img3 =:img3,  maquette1 =:maquette1, maquette2 =:maquette2, maquette3 =:maquette3, pourcentage =:pourcentage, budget =:budget
	WHERE id_projet =:id_projet
    ");

    $query->bindParam(':id_projet', $id);
    $query->bindParam(':nom', $nom);
    $query->bindParam(':categorie', $categorie);
    $query->bindParam(':description1', $description1);
    $query->bindParam(':description2', $description2);
    $query->bindParam(':client', $client);
    $query->bindParam(':realisation', $realisation); 
    $query->bindParam(':date_livraison', $date_livraison);
    $query->bindParam(':prestation', $prestation);
	$query->bindParam(':technos', $technos);
	$query->bindParam(':img1', $img1);
	$query->bindParam(':img2', $img2);
	$query->bindParam(':img3', $img3);
	$query->bindParam(':img3', $img3);
	$query->bindParam(':maquette1', $maquette1);
	$query->bindParam(':maquette2', $maquette2);
    $query->bindParam(':maquette3', $maquette3);
    $query->bindParam(':pourcentage', $pourcentage);
    //$query->bindParam(':budget', $budget);
	$query->bindParam(':budget', $budget, PDO::PARAM_INT); // parametre INTeger

    // Exécution de la requête
	$query->execute();

    // Enregistrement terminé, on redirige sur la page d'accueil
    header("Location: https://www.baudstudio.fr/controleur/bo-projects.php");
    exit();	

}

// ***************************************************
// ***************************************************

// ***************************************************
// Fonction qui supprime un projet 
    
function softDeleteProject($id) {

    // Connexion à la BDD
    $pdo = connectToDatabase ();

    // Requête
	$query = $pdo->prepare("
	UPDATE projets 
    SET soft_delete =1
	WHERE id_projet =$id
    ");

    //$query->bindParam(':soft_delete', $id);
	//$query->bindParam(':budget', $budget, PDO::PARAM_INT); // parametre INTeger

    // Exécution de la requête
	$query->execute();

    // Enregistrement terminé, on redirige sur la page d'accueil
    header("Location: https://www.baudstudio.fr/controleur/bo-projects.php");
    exit();	
   
  
}
    

// ***************************************************
// ***************************************************






?>