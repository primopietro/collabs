<?php
	/****************************************    
	Fichier : GestionEmployeProjet.php    
	Auteur : Pietro Primo  
	Fonctionnalité : Permet la gestion des employées dans
					 un projet spécifique (ajout, modification et suppression)
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
	19 avril 2017		Pietro Primo			Création de tous les fonctionnalitées
	20 avril 2017		Boris Zoretic			Amélioration des fonctionnalitées et création des fonctions
	27 avril 2017		Boris Zoretic			Modification minime en raison de l'ajout des vérification de formulaire
 
	****************************************/ 
	if(!isSet($_SESSION)){
		session_start();
	}
	
	require_once("../controlleur/ConnectionBD.php");
	require_once("../classeMere/employe_projet.php");
	
	class GestionEmployeProjet {
		private $listeEmployeProjet;
		
		function __construct(){
			$this->listeEmployeProjet = [];
		}
		
		/*
		* \pre: la liste à été construite avec succès
		* \post: la liste à été remplie grâce à la requête
		*/
		function init(){
			global $conn;
			$result = $conn->query("SELECT * FROM employe_projet");
			
			if($result->num_rows > 0){
				while($row = $result->fetch_assoc()){
					$ep = new EmployeProjet();
					$ep->init($row['id_employe_projet'], $row['id_employe'], $row['id_projet'], $row['total_alloue']);
					
					$this->listeEmployeProjet[$row['id_employe_projet']] = $ep;
					//$this->listeEmployeProjet[$row['id_employe_projet']]->show();
				}
			}
		}
		
		/*
		* \pre: les valeurs d'id, d'employé et de projet, et de montant sont remplises
		* \post: l'ajout est éxécuté dans la base de données
		*/
		function addEmployeProjet(){
			global $conn;
			
			$idEmp = htmlspecialchars($_POST['ajouterEP']);	
			$idProjet = htmlspecialchars($_POST['idProjet']);	
			$montant = htmlspecialchars($_POST['Montant']);	
			
			$result = $conn->query("SELECT * FROM employe_projet WHERE id_projet = $idProjet AND id_employe = $idEmp");

			if($result->num_rows == 0){
				$sql = "INSERT INTO `employe_projet` (`id_employe_projet`, `id_employe`, `id_projet`, `total_alloue`)
				VALUES (NULL, '$idEmp', '$idProjet', '$montant')";

				if ($conn->query($sql) === TRUE) {
					echo "New record created successfully";
				} else {
					echo "Error: " . $sql . "<br>" . $conn->error;
				}
			}	
			((($_GET["idProjet"]) + 666) / 666 ) - 1;

			$conn->close();
			$idProjet = (($idProjet +1 )*666)-666;
			
			header("Location: /gb/php/site/projet.php?idProjet=$idProjet");
		}
		
		/*
		* \pre: les valeurs d'id, d'employé et de projet, et de montant sont remplises
		* \post: la modification est éxécuté dans la base de données
		*/
		function modifierBudgetEmployeProjet(){
			global $conn;
			
			$montant = htmlspecialchars($_POST['montant_employeProjet']);
			$idProjet = htmlspecialchars($_POST['idProjet']);
			$idEmploye = htmlspecialchars($_POST['idEmploye']);
			
			if($montant >=0){
				$newEP = new EmployeProjet();
				$newEP->init($_SESSION["idProjetPersonne"] ,$idEmploye, $idProjet, $montant);
				$this->listeProjet[$newEP->getIdEmployeProjet()] = $newEP;
				//$newEP->show();
			
				$sql = "UPDATE `employe_projet` 
						SET `total_alloue` = $montant 
						WHERE id_employe = $idEmploye AND id_projet = $idProjet ";
			
				if ($conn->query($sql) === TRUE) {
					echo "New record updated successfully";
				} else {
					echo "Error: " . $sql . "<br>" . $conn->error;
				}
			}
			
			header("Location: /gb/php/site/projetPersonne.php?idEmploye=$idEmploye&idProjet=$idProjet");
			
			
			$conn->close();
		}
		
		/*
		* \pre: les valeurs d'id d'employé et de projet sont remplises
		* \post: la suppression est éxécuté dans la base de données
		*/
		function deleteEmployeProjet(){
			global $conn;
			
			$sql = "DELETE FROM `employe_projet`
			WHERE `employe_projet`.`id_employe` = ". $_GET["idEmploye"] . "
			AND  `employe_projet`.`id_projet` = ". $_GET["idProjet"] . "";
			
			if ($conn->query($sql) === TRUE) {
				echo "New record updated successfully";
			} else {
				echo "Error: " . $sql . "<br>" . $conn->error;
			}
			
			$idProjet = ((( $_SESSION["idProjet"]) + 1) * 666 ) - 666;
			header("Location: /gb/php/site/projet.php?idProjet=$idProjet");
		}
		
		/*
		* \pre: le paramètre est un employe_projet
		* \post: l'employe_projet est ajouté à la liste
		*/
		function addToArray($ep){
			array_push($this->listeEmployeProjet, $ep);
		}
	}
	
	$gestionEmployeProjet = new GestionEmployeProjet();
	$gestionEmployeProjet->init();
	
	if(isSet($_POST['Montant'])){
		$employeProjet = new EmployeProjet();
		$employeProjet->init(100, $_POST['ajouterEP'], $_POST['idProjet'], $_POST['Montant']);
		
		$gestionEmployeProjet->addToArray($employeProjet);
		$gestionEmployeProjet->addEmployeProjet();
	} else if(isSet($_POST['montant_employeProjet'])){
		$gestionEmployeProjet->modifierBudgetEmployeProjet();
	} else if(isSet($_GET["idEmploye"]) && isSet($_GET["idProjet"])){
		$gestionEmployeProjet->deleteEmployeProjet();
	}
		
?>