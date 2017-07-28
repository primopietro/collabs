<?php
	/****************************************    
	Fichier : GestionEmploye.php    
	Auteur : Pietro Primo  
	Fonctionnalité : Permet la gestion des employées dans
					 l'entreprise (ajout, modification et changement d'état)
	Date : 17 avril 2017
 
	Vérification :    
	Date               	Nom                   	Approuvé    
	========================================================= 
	23 avril 2017		Pietro Primo			OUI
	23 avril 2017		Maxime Proulx			OUI
	23 avril 2017		Boris Zoretic			OUI
 
 
	Historique de modifications :    
	Date               	Nom                   	Description    
	========================================================= 
	17 avril 2017		Pietro Primo			Création de tous les fonctionnalitées
	21 avril 2017		Boris Zoretic			Amélioration des fonctionnalitées et création des fonctions
	26 avril 2017		Boris Zoretic			Modification minime en raison de l'ajout des regex
 
	****************************************/ 
	if(!isSet($_SESSION)){
		session_start();
	}	
	
	if(!isSet($_SESSION["modifier"])){
		$_SESSION["modifier"] = false;
	}
	require_once("../controlleur/ConnectionBD.php");
	require_once("../classeMere/employe.php");
	
	class GestionEmploye {
		private $listeEmploye;
		
		function __construct(){
			$this->listeEmploye = [];
		}
		
		/*
		* \pre: la liste à été construite avec succès
		* \post: la liste à été remplie grâce à la requête
		*/
		function init(){
			global $conn;
			$result = $conn->query("SELECT * FROM employe");
			
			if($result->num_rows > 0){
				while($row = $result->fetch_assoc()){
					$e = new Employe();
					$e->init($row['id_employe'], $row['nom'], $row['prenom'], $row['courriel'], $row['mot_passe']);
					$this->listeEmploye[$row['id_employe']] = $e;
				}
			}
		}
		
		/*
		* \pre: les valeurs nom, prénom, courriel et téléphone sont remplises
		* \post: l'ajout est éxécuté dans la base de données
		*/
		function addEmploye(){
			if(isSet($_POST['Nom']) && $_POST['Nom'] != "" && $_POST['Prenom'] != ""){
				$nom = htmlspecialchars($_POST['Nom']);
				$prenom = htmlspecialchars($_POST['Prenom']);
				$courriel = htmlspecialchars($_POST['Courriel']);
				$tel = htmlspecialchars($_POST['Telephone']);
				$mot_passe = "password";
				
				global $conn;
				
				$sql = "INSERT INTO employe (id_employe, nom, prenom, courriel, mot_passe, telephone) 
				values (NULL, '$nom', '$prenom', '$courriel', '$mot_passe' , '$tel')";

				if ($conn->query($sql) === TRUE) {
					echo "New record created successfully" . "<br>";
				} else {
					echo "Error: " . $sql . "<br>" . $conn->error;
				}
				
				
				$result = $conn->query("SELECT * FROM employe WHERE courriel = '" . $courriel . "'");
				if($result->num_rows > 0){
					while($row = $result->fetch_assoc()){
						$id_employe = $row['id_employe'];
					}
				}
				
				$sql = "INSERT INTO classification_employe (id_classification, id_employe, id_type_employe) 
				values (NULL, '" . $id_employe. "', '1')";

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
		* \pre: les valeurs nom, prénom, courriel, téléphone et mot de passe sont remplises
		* \post: la modification est éxécuté dans la base de données
		*/
		function modifierEmploye(){
			if($_POST['Nom'] != "" && $_POST['Prenom'] != "" && $_POST['Telephone'] != "" && $_POST['Courriel'] != "" && $_POST['MotPasse'] != ""){
				$patternCourriel = '/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,})|([0-9]{3}[.][0-9]{3}[.][0-9]{3}[.][0-9]{1,3}))$/';
				$patternTel = '/(^[0-9]{10}$)/';
				if(preg_match($patternTel, $_POST['Telephone']) && preg_match($patternCourriel, $_POST['Courriel'])){
					global $conn;
					
					$idEmployeSession = ((( $_SESSION["idModifieEmp"]) + 1) * 666 ) - 666;
			
					$nom = htmlspecialchars($_POST['Nom']);
					$prenom = htmlspecialchars($_POST['Prenom']);
					$courriel = htmlspecialchars($_POST['Courriel']);
					$tel = htmlspecialchars($_POST['Telephone']);
					$motPasse = htmlspecialchars($_POST['MotPasse']);
					
					if($nom == "" || $nom == " "){
						$nom = $_SESSION["m_e_nom"];
					}
					if($prenom == "" || $prenom == " "){
						$prenom = $_SESSION["m_e_prenom"];
					}
					if($courriel == "" || $courriel == " "){
						$courriel = $_SESSION["m_e_courriel"];
					}
					if($tel == "" || $tel == " "){
						$tel = $_SESSION["m_e_telephone"];
					}
					if($motPasse == "" || $motPasse == " "){
						$motPasse = $_SESSION["m_e_motPasse"];
					}
					
					$newE = new Employe();
					$newE->init($_SESSION["idModifieEmp"] ,$nom, $prenom, $courriel, $motPasse, $tel);
					$this->listeEmploye[$newE->getIdEmploye()] = $newE;
					$newE->show();
					
					$sql = "UPDATE `employe`
					SET 
					`nom` = '" . $nom . "', 
					`prenom` = '" . $prenom . "',
					`courriel` = '" . $courriel . "', 
					`mot_passe` = '" .$motPasse . "', 
					`telephone` = '" . $tel . "'
					WHERE `employe`.`id_employe` = '" . $_SESSION["idModifieEmp"] . "' ";
				 
					if ($conn->query($sql) === TRUE) {
						echo "New record updated successfully";
						if($_SESSION["id_employe"] == $_SESSION["idModifieEmp"]){
							$_SESSION["nom"] = $nom;			
							$_SESSION["prenom"] = $prenom;
						}
					} else {
						echo "Error: " . $sql . "<br>" . $conn->error;
					}
					$_SESSION["modifier"] = false;
					$conn->close();
					
					header("Location: /gb/php/site/employes.php");
				}
			}
		}
		
		/*
		* \pre: la valeur de l'état de l'employé est remplise
		* \post: la modification de l'état est éxecuter dans la base de données
		*/
		function toggleEtatEmploye(){
			global $conn;
			
			if($_SESSION["m_e_etat"] == 1){	
				$sql = "UPDATE `employe`
				SET `id_etat_employe` = '2'
				WHERE `employe`.`id_employe` = '" . $_SESSION["idModifieEmp"] . "' ";
			}
			else{
				$sql = "UPDATE `employe`
				SET `id_etat_employe` = '1'
				WHERE `employe`.`id_employe` = '" . $_SESSION["idModifieEmp"] . "' ";
			}
			
		 
			if ($conn->query($sql) === TRUE) {
				echo "New record updated successfully";

			} else {
				echo "Error: " . $sql . "<br>" . $conn->error;
			}
			$_SESSION["modifier"] = false;
			$conn->close();
			
			header("Location: /gb/php/site/employes.php");
		}
		
		/*
		* \pre: le paramètre est un employé
		* \post: l'employé est ajouté à la liste
		*/
		function addToArray($e){
			array_push($this->listeEmploye, $e);
		}
		
		/*
		* \pre: le array a bien été construit
		* \post: le array est retourné
		*/
		function getArray(){
			return $this->listeEmploye;
		}
	}
	
	$gestionEmploye = new GestionEmploye();
	$gestionEmploye->init();
	
	if($_SESSION["modifier"] === true && isSet($_POST['Nom'])){
		$gestionEmploye->modifierEmploye();
	} else if($_SESSION["modifier"] === true && isSet($_POST['btnEtat'])){
		$gestionEmploye->toggleEtatEmploye();
	} else if (isSet($_POST['Nom'])){
		$user = new Employe();
		$user->init(100, $_POST["Nom"], $_POST["Prenom"], $_POST["Courriel"], "password", $_POST["Telephone"]);
		$gestionEmploye->addToArray($user);
		
		
		$gestionEmploye->addEmploye();
	}
?>