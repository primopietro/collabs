<?php
	/****************************************    
	Fichier : GestionProjet.php    
	Auteur : Boris Zoretic  
	Fonctionnalité : Permet la gestion des projets dans
					 l'entreprise (ajout et modification)
	Date : 19 avril 2017
 
	Vérification :    
	Date               	Nom                   	Approuvé    
	========================================================= 
	23 avril 2017		Pietro Primo			OUI
	23 avril 2017		Maxime Proulx			OUI
	23 avril 2017		Boris Zoretic			OUI
 
 
	Historique de modifications :    
	Date               	Nom                   	Description    
	========================================================= 
	19 avril 2017		Boris Zoretic			Création de tous les fonctionnalitées
	23 avril 2017		Boris Zoretic			Amélioration des fonctionnalitées et création des fonctions
	27 avril 2017		Boris Zoretic			Modification minime en raison de l'ajout des vérifications de formulaire
 
	****************************************/ 
	if(!isSet($_SESSION)){
		session_start();
	}
	if(!isSet($_SESSION["modifier"])){
		$_SESSION["modifier"] = false;
	}
	require_once("../controlleur/ConnectionBD.php");
	require_once("../classeMere/projet.php");
	
	class GestionProjet {
		private $listeProjet;
		
		function __construct(){
			$this->listeProjet = [];
		}
		
		/*
		* \pre: la liste à été construite avec succès
		* \post: la liste à été remplie grâce à la requête
		*/
		function init(){
			global $conn;
			$result = $conn->query("SELECT * FROM projet");
			
			if($result->num_rows > 0){
				while($row = $result->fetch_assoc()){
					$p = new Projet();
					$p->init($row['id_projet'], 1, $row['nom'], $row['date_debut'], $row['date_fin'], $row['montant_alloue'], $row['montant_utilise']);
					
					$this->listeProjet[$row['id_projet']] = $p;
					//$this->listeProjet[$row['id_projet']]->show();
				}
			}
		}
		
		/*
		* \pre: les valeurs de nom, de date de début, de date de fin et de budget sont remplises
		* \post: l'ajout est éxécuté dans la base de données
		*/
		function addProjet(){
			if(isSet($_POST['Nom'])){
				global $conn;
				$nom = htmlspecialchars($_POST['Nom']);
				$dateDebut = htmlspecialchars($_POST['DateDebut']);
				$dateFin = htmlspecialchars($_POST['DateFin']);
				$budget = htmlspecialchars($_POST['Budget']);
				
				
				$sql = "INSERT INTO projet (id_projet, id_etat_projet, nom, date_debut, date_fin, montant_alloue, montant_utilise) 
				values (NULL, '1', '$nom', '$dateDebut', '$dateFin' , '$budget', '0')";

				if ($conn->query($sql) === TRUE) {
					echo "New record created successfully";
				} else {
					echo "Error: " . $sql . "<br>" . $conn->error;
				}

				$conn->close();
				$_SESSION["c_a_emp"] = true;
			}
		}
		
		/*
		* \pre: les valeurs de nom, de date de début, de date de fin et de budget sont remplises
		* \post: la modification est éxécuté dans la base de données
		*/
		function modifierProjet(){
			if($_POST['Nom'] != "" && $_POST['DateDebut'] != "" && $_POST['DateFin'] != "" && $_POST['Budget'] != ""){
				global $conn;
				
				$idModifierProjet = ((( $_SESSION["idProjet"]) + 1) * 666 ) - 666;
		
				$nom = htmlspecialchars($_POST['Nom']);
				$date_debut = htmlspecialchars($_POST['DateDebut']);
				$date_fin = htmlspecialchars($_POST['DateFin']);
				$montant = htmlspecialchars($_POST['Budget']);
				
				if($nom == "" || $nom == " "){
					$nom = $_SESSION["p_nom"];
				}
				if($date_debut == "" || $date_debut == " "){
					$prenom = $_SESSION["p_date_debut"];
				}
				if($date_fin == "" || $date_fin == " "){
					$courriel = $_SESSION["p_date_fin"];
				}
				if($montant == "" || $montant == " "){
					$tel = $_SESSION["p_montant_alloue"];
				}
				
				$newP = new Projet();
				$newP->init($_SESSION["idProjet"], 1,$nom, $date_debut, $date_fin, $montant, 0);
				$this->listeProjet[$newP->getIdProjet()] = $newP;
				//$newP->show();
				
				$sql = "UPDATE `projet`
				SET 
				`nom` = '" . $nom . "', 
				`date_debut` = '" . $date_debut . "',
				`date_fin` = '" . $date_fin . "', 
				`montant_alloue` = '" .$montant . "'
				WHERE `id_projet` = '" . $_SESSION["idProjet"] . "' ";
			 
				if ($conn->query($sql) === TRUE) {
					echo "New record updated successfully";
				} else {
					echo "Error: " . $sql . "<br>" . $conn->error;
				}
				
				$_SESSION["modifier"] = false;
				$conn->close();
				header("Location: /gb/php/site/projets.php");
			
			
			}
		}
		
		/*
		* \pre: le paramètre est un projet
		* \post: le projet est ajouté à la liste
		*/
		function addToArray($p){
			array_push($this->listeProjet, $p);
		}
	}
	
	$gestionProjet = new GestionProjet();
	$gestionProjet->init();
	
	if($_SESSION["modifier"] === true && isSet($_POST['Nom'])){
		$gestionProjet->modifierProjet();
	} else if (isSet($_POST['Nom'])){
		$projet = new Projet();
		$projet->init(100, 1, $_POST["Nom"], $_POST["DateDebut"], $_POST["DateFin"], $_POST["Budget"], 0);
		$gestionProjet->addToArray($projet);
		
		
		$gestionProjet->addProjet();
	}
?>