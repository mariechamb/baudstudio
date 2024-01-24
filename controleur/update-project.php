<?php 


//<!-- J'include mon model -->
include '../model/projects.php'; 
//<!-- =========================== -->

	// Je regarde si l'utilisateur souhaite modifier ou supprimer le projet

	// Je vérifie qu'une requête POST a bien été lancée
	if ($_SERVER["REQUEST_METHOD"] === "POST") {


		//************************************************************************************//
		//************************************************************************************//
		
		// Si l'utilisateur a cliqué sur MODIFIER

		if (isset($_POST["modifier"])) {

				// Je récupère mes données :
				$id = $_POST['id_projet'];
				$nom = $_POST['nom'];
				$budget = $_POST['budget'];
				$description1 = $_POST['description1'];
				$description2 = $_POST['description2'];
				$client = $_POST['client'];
				$realisation = $_POST['realisation'];
				$date_livraison = $_POST['date_livraison'];
				$prestation = $_POST['prestation'];
				$technos = $_POST['technos']; 
				$img1 = $_POST['img1']; 
				$img2 = $_POST['img2']; 
				$img3 = $_POST['img3']; 
				$maquette1 = $_POST['maquette1']; 
				$maquette2 = $_POST['maquette2'];
				$maquette3 = $_POST['maquette3'];
				$pourcentage = $_POST['pourcentage'];


				// Gestion des checkboxs :

				if($_POST['design']){
			$checkbox_design = "design";
				} else {
					$checkbox_design = "";
				};

				if($_POST['vitrine']){
				$checkbox_vitrine = "vitrine";
				} else {
					$checkbox_vitrine = "";
				};

				if($_POST['ecommerce']){
				$checkbox_ecommerce = "ecommerce";
				} else {
					$checkbox_ecommerce = "";
				};


				$categorie = $checkbox_design . " " . $checkbox_vitrine . " " . $checkbox_ecommerce;


				// J'envoie les infos dans ma fonction pour mettre à jour le projet puis je redirige vers la liste des projets via la fonction
				updateProject ($id, $nom, $categorie, $description1, $description2, $client, $realisation, $date_livraison, $prestation, $technos, $img1, $img2, $img3, $maquette1, $maquette2, $maquette3, $pourcentage, $budget);
		
			
			
			//************************************************************************************//
			//************************************************************************************//

				// Si l'utilisateur à cliquer sur SUPPRIMER

			} elseif (isset($_POST["supprimer"])) {

			// Je récupère l'ID du projet que je souhaite supprimer 
			$id = $_POST['id_projet'];
			//echo "<script>console.log($id $id);</script>";
			echo("yep, was deleted");


			// J'appelle ma fonction pour supprimer le projet en faisant passer l'id du projet à supprimer
			softDeleteProject ($id);
		

			} else  {
				echo("PROBLEME");
				echo($id);


		}


	}

	?>