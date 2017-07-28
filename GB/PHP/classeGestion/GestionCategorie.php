<?php
	/****************************************    
	Fichier : GestionCategorie.php    
	Auteur : Maxime Proulx   
	Fonctionnalité : Permet la gestion des catégories de dépenses (ajout)    
	Date : 18 avril 2017
 
	Vérification :    
	Date               	Nom                   	Approuvé    
	========================================================= 
	23 avril 2017		Pietro Primo			OUI
	23 avril 2017		Maxime Proulx			OUI
	23 avril 2017		Boris Zoretic			OUI
 
 
	Historique de modifications :    
	Date               	Nom                   	Description    
	========================================================= 
	18 avril 2017	 	Maxime Proulx			Création de base (tous marche, aucune fonction)
	23 avril 2017		Boris Zoretic			Amélioration des fonctionnalitées et création des fonctions
 
	****************************************/ 
	if(!isSet($_SESSION)){
		session_start();
	}
	
	require_once("../controlleur/ConnectionBD.php");
	require_once("../classeMere/Categorie_depense.php");
	
	class GestionCategorie {
		private $listeCategorie;
		
		function __construct(){
			$this->listeCategorie = [];
		}
		
		/*
		* \pre: la liste à été construite avec succès
		* \post: la liste à été remplie grâce à la requête
		*/
		function init(){
			global $conn;
			$result = $conn->query("SELECT * FROM categorie_depense");
			
			if($result->num_rows > 0){
				while($row = $result->fetch_assoc()){
					$c = new Categorie_depense();
					$c->init($row['id_categorie_depense'], $row['nom'], $row['description']);
					
					$this->listeCategorie[$row['id_categorie_depense']] = $c;
					//$this->listeCategorie[$row['id_categorie_depense']]->show();
				}
			}
		}
		
		/*
		* \pre: les valeurs pour le nom et la description sont remplises
		* \post: l'ajout est éxécuter dans la base de données
		*/
		function addCategorie(){
			if($_POST['Nom'] != "" && $_POST['Description'] != ""){
				global $conn;
				
				$nom = htmlspecialchars($_POST['Nom']);
				$desc = htmlspecialchars($_POST['Description']);
				
				$sql = "INSERT INTO categorie_depense (id_categorie_depense, nom, description) 
				values (NULL, '$nom', '$desc')";

				if ($conn->query($sql) === TRUE) {
					echo "New record created successfully";
				} else {
					echo "Error: " . $sql . "<br>" . $conn->error;
				}
				$conn->close();
				
				header("Location: /gb/php/site/projetPersonne.php?idEmploye=" . $_SESSION['pp_id_employe'] . "&idProjet=" . $_SESSION['pp_id_projet']);
			}
		}
		
		/*
		* \pre: le paramètre est une catégorie
		* \post: la catégorie est ajoutée à la liste
		*/
		function addToArray($c){
			array_push($this->listeCategorie, $c);
		}
	}
	
	$gestionCategorie = new GestionCategorie();
	$gestionCategorie->init();
	
	if(isSet($_POST["Nom"])){
		$categorie = new Categorie_depense();
		$categorie->init(100, $_POST["Nom"], $_POST["Description"]);
		$gestionCategorie->addToArray($categorie);
		
		
		$gestionCategorie->addCategorie();
	}
?>