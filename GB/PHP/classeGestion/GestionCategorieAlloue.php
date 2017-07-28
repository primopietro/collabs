<?php
	/****************************************    
	Fichier : GestionCategorieAlloue.php    
	Auteur : Pietro Primo   
	Fonctionnalité : Permet la gestion des montant alloué pour les employées pour
					 une catégorie de dépenses (ajout et modification)
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
	22 avril 2017		Pietro Primo			Amélioration de certaines fonctionnalitées
	23 avril 2017		Boris Zoretic			Amélioration des fonctionnalitées et création des fonctions
	01 mai   2017		Pietro Primo			Ajout class get
	02 mai   2017		Pietro Primo			Modification classe getJson
 
	****************************************/ 
	if(!isSet($_SESSION)){
		session_start();
	}
	
	require_once("../controlleur/ConnectionBD.php");
	require_once("../classeMere/Categorie_depense_alloue.php");
	
	class GestionCategorieAlloue {
		private $listeCategorieAlloue;
		
		function __construct(){
			$this->listeCategorieAlloue = [];
		}
		
		/*
		* \pre: la liste à été construite avec succès
		* \post: la liste à été remplie grâce à la requête
		*/
		function init(){
			global $conn;
			$result = $conn->query("SELECT * FROM categorie_depense_alloue");
			
			if($result->num_rows > 0){
				while($row = $result->fetch_assoc()){
					$cda = new Categorie_depense_alloue();
					$cda->init($row['id_categorie_da'], $row['id_categorie_depense'], $row['id_employe_projet'], $row['montant_alloue']);
					
					$this->listeCategorieAlloue[$row['id_categorie_da']] = $cda;
					//$this->listeCategorieAlloue[$row['id_categorie_da']]->show();
				}
			}
		}
		
		/*
		* \pre: les valeurs pour la categorie et le montant sont remplises
		* \post: l'ajout est exécuter dans la base de données
		*/
		function addModificationCategorieAlloue(){
			if($_POST['montant'] != ""){
				global $conn;
				
				$categorie = htmlspecialchars($_POST['categorie']);
				$montant = htmlspecialchars($_POST['montant']);
				
				$result = $conn->query("SELECT id_categorie_depense 
										FROM categorie_depense
										WHERE nom ='" . $categorie . "'");
				$idCat = $result->fetch_assoc();
				$id_categorie_depense = $idCat["id_categorie_depense"];
				
				$id = $conn->query("SELECT id_employe_projet 
									FROM employe_projet 
									WHERE id_employe = " . $_GET['idEmploye'] . " 
									AND id_projet =" . $_GET['idProjet'] . " ");
				$idNew = $id->fetch_assoc();
				$id_employe_projet = $idNew["id_employe_projet"];
				

				$result = $conn->query("SELECT * FROM `categorie_depense_alloue` WHERE id_categorie_depense = $id_categorie_depense
				AND id_employe_projet = $id_employe_projet");
				$idcda =0;
				$oldMontant =0;
				if($result->num_rows > 0){
					while($row = $result->fetch_assoc()){
						$idcda = $row['id_categorie_da'];
						$oldMontant = $row['montant'];
					}
				}
				if($idcda == 0){
					$sql = "INSERT INTO categorie_depense_alloue (id_categorie_da, id_categorie_depense, id_employe_projet, montant_alloue) 
					values (NULL, '$id_categorie_depense', '$id_employe_projet', '$montant')";

					if ($conn->query($sql) === TRUE) {
						echo "New record created successfully";
					} else {
						echo "Error: " . $sql . "<br>" . $conn->error;
					}
					$conn->close();
					$_SESSION["c_a_emp"] = true;
				}
				else{
					
					$montantTotal = $oldMontant + $montant;
					$sql = "UPDATE `categorie_depense_alloue` 
					SET `montant_alloue` = '$montantTotal' 
					WHERE `categorie_depense_alloue`.`id_categorie_depense` = $id_categorie_depense
					AND  `categorie_depense_alloue`.`id_employe_projet` = $id_employe_projet";

					if ($conn->query($sql) === TRUE) {
						echo "New record created successfully";
					} else {
						echo "Error: " . $sql . "<br>" . $conn->error;
					}
					$conn->close();
					$_SESSION["c_a_emp"] = true;
				}
			}
		}
		
		/*
		* \pre: le paramètre est une catégorie alloué
		* \post: la catégorie alloué est ajoutée à la liste
		*/
		function addToArray($c){
			array_push($this->listeCategorieAlloue, $c);
		}
		
		function getListeCategorieJson(){			
			echo "<pre style='word-wrap: break-word; white-space: pre-wrap;'>";
			echo "{ \"listeCDA\": [";
			$compteur =0;
			foreach($this->listeCategorieAlloue as $key=>$value){
				echo "{";
							
				echo "\"id_categorie_da\" : \"" . $this->listeCategorieAlloue[$key]->getIdCategorieDa() . "\",";
				
			
				echo "\"id_categorie_depense\" : \"" . $this->listeCategorieAlloue[$key]->getId_categorie_depense() . "\",";
				
				
				echo "\"id_employe_projet\" : \"" . $this->listeCategorieAlloue[$key]->getId_employe_projet() . "\",";
				
			
				echo "\"montant_alloue\" : \"" . $this->listeCategorieAlloue[$key]->getMontant_alloue(). "\"";
				
				echo "}";

				$compteur++;
				if($compteur < sizeOf($this->listeCategorieAlloue)){
					echo ",";
				}
			}			
			echo "]} </pre>";
			
		}
	}
	
	$gestionCategorieAlloue = new GestionCategorieAlloue();
	$gestionCategorieAlloue->init();
	
	if(isSet($_POST["montant"])){
		$categorieAlloue = new Categorie_depense_alloue();
		$categorieAlloue->init(100, $_POST["Nom"], $_POST["Description"]);
		$gestionCategorieAlloue->addToArray($categorieAlloue);
		
		
		$gestionCategorieAlloue->addModificationCategorieAlloue();
	}
?>