<?php
	/****************************************    
	Fichier : getProjet.php    
	Auteur : Pietro Primo	   
	Fonctionnalité : Permet obtenir une liste avec tous les depenses 
	Date : 01 mai 2017
 
	Vérification :    
	Date               	Nom                   	Approuvé    
	========================================================= 
	02 mai 2017			Pietro Primo			OUI
 
 
	Historique de modifications :    
	Date               	Nom                   	Description    
	========================================================= 
 
	****************************************/ 

	require_once("../controlleur/ConnectionBD.php");

	function getJson($id_employe, $id_projet){
		
		//Get montant total alloue pour le projet
		$categoriesDepensesProj = array();
		global $conn;
		$result = $conn->query("SELECT SUM(cda.montant_alloue) as sommeMontant
									FROM categorie_depense_alloue cda
									JOIN employe_projet ep ON ep.id_employe_projet = cda.id_employe_projet
									JOIN projet p ON p.id_projet = ep.id_projet
									WHERE p.id_projet = " . $id_projet . "");
		echo "{ \"projet\": [{";
		if($result->num_rows > 0){
			while($row = $result->fetch_assoc()){
				echo " \"montantAlloue\" :  " . "\"" .  $row["sommeMontant"] . "\",";
			}
		}
		
		//Get montant total utilise pour le projet
		$result = $conn->query("SELECT SUM(d.montant) as sommeDepense
									FROM depense d 
									JOIN employe_projet ep ON ep.id_employe_projet = d.id_employe_projet
									JOIN projet p ON ep.id_projet = p.id_projet
									WHERE p.id_projet = " . $id_projet . " ");

		if($result->num_rows > 0){
			while($row = $result->fetch_assoc()){
				echo " \"sommeDepense\" :  " . "\"" .  $row["sommeDepense"] . "\",";
			}
		}
		
		//Get montant total alloue pour le projet
		$result = $conn->query("SELECT cd.nom as nomCategorie, SUM(cda.montant_alloue) as montantAlloue
								FROM categorie_depense_alloue cda 
								JOIN categorie_depense cd ON cd.id_categorie_depense = cda.id_categorie_depense
								JOIN employe_projet ep on ep.id_employe_projet = cda.id_employe_projet
								WHERE ep.id_projet = " . $id_projet . " 
								GROUP BY cd.nom");

		$cmptCategorie = 0;
		
		if($result->num_rows > 0){
			while($row = $result->fetch_assoc()){
				$categoriesDepensesProj[$row["nomCategorie"]] = $row["montantAlloue"];
			
				
			}
		}
		
		
		
		//Get montant total utilise pour le projet
		$result = $conn->query("SELECT cd.nom as nomDepense, SUM(d.montant) as sommeDepense
								FROM depense d 
								JOIN categorie_depense_alloue cda ON d.id_categorie_da = cda.id_categorie_da
								JOIN categorie_depense cd ON cd.id_categorie_depense = cda.id_categorie_depense
								JOIN employe_projet ep ON cda.id_employe_projet = ep.id_employe_projet
								WHERE ep.id_projet = " . $id_projet . "
								GROUP BY nomDepense");
		
	
		if($result->num_rows > 0){
			while($row = $result->fetch_assoc()){
				if(isSet($categoriesDepensesProj[$row["nomDepense"]])){
					if($categoriesDepensesProj[$row["nomDepense"]] !=0 ||$categoriesDepensesProj[$row["nomDepense"]] != null || !isSet($categoriesDepensesProj[$row["nomDepense"]])){
						$resultat = (($row["sommeDepense"]  / $categoriesDepensesProj[$row["nomDepense"]]) * 100 );
				
						$categoriesDepensesProj[$row["nomDepense"]] =   substr($resultat,0,4). "%";
				
					}
					
				}
				else if(!isSet($categoriesDepensesProj[$row["nomDepense"]])){
						$categoriesDepensesProj[$row["nomDepense"]] =  "0%";
				}
				
			}
		}
		echo  " \"categoriesDepensesProjet\" : {";
		$compteur=0;
		//print each key and value as Json
		foreach ($categoriesDepensesProj as $key => $value) {
			if(substr("$value", -1) == "%"){
				echo "\"$key\" : \" :  $value\"" ;
			}
			else{
				echo "\"$key\" : \"   0%\"" ;
			}
			if($compteur < sizeOf($categoriesDepensesProj) -1){
				echo ",";
			}
			$compteur++;
		}
		echo "},";
		
		//Get montant total alloue et utilise pour un employe
		$result = $conn->query("SELECT SUM( cda.montant_alloue) as montantAlloue
								FROM categorie_depense_alloue cda
								JOIN employe_projet ep on cda.id_employe_projet = ep.id_employe_projet
								JOIN categorie_depense cd ON cda.id_categorie_depense = cd.id_categorie_depense
								WHERE ep.id_employe =  " . $id_employe . "  AND ep.id_projet = " . $id_projet ." ");

		if($result->num_rows > 0){
			while($row = $result->fetch_assoc()){
			echo " \"employeAlloue\" :  " . "\"" .  $row["montantAlloue"] . "\",";		
						
			}
		}
		
		
		
		//Get montant total alloue et utilise pour un employe
		$result = $conn->query("SELECT SUM(ep.total_alloue) as total_alloue, SUM(d.montant) as totalDepense
								FROM employe_projet ep
								JOIN projet p ON p.id_projet = ep.id_projet
								JOIN depense d ON d.id_employe_projet = ep.id_employe_projet
								WHERE ep.id_employe = " . $id_employe . " AND p.id_projet =  " . $id_projet ."");

		if($result->num_rows > 0){
			while($row = $result->fetch_assoc()){
				echo " \"employeDepense\" :  " . "\"" .  $row["totalDepense"] . "\",";				
			}
		}
		
		
		
		
		
		
		//Get montant total utilise pour le projet
		$result = $conn->query("SELECT cd.nom as nomDepense , SUM(d.montant) as sommeDepenses
								FROM depense d
								JOIN employe_projet ep ON d.id_employe_projet = ep.id_employe_projet
								JOIN categorie_depense_alloue cda ON cda.id_categorie_da = d.id_categorie_da
								JOIN categorie_depense cd ON cd.id_categorie_depense = cda.id_categorie_depense
								WHERE ep.id_employe =  " . $id_employe . "  AND ep.id_projet = " . $id_projet ." 
								GROUP BY cd.nom");

		$cmptCategorie = 0;
		echo " \"categoriesDepensesEmploye\" :  {";
		if($result->num_rows > 0){
			while($row = $result->fetch_assoc()){
				echo " \"" . $row["nomDepense"]   . "\" :  " . "\" : " .  $row["sommeDepenses"] . "$\"";
				//echo  " \"" . $row["nomCategorie"] ." \"  :   \"" . $row["sommeCategorie"] . " \" ";
				if( $cmptCategorie <($result->num_rows -1)){
					echo ",";
				}
				$cmptCategorie++;
			}
		}
		
		echo "}}]}";
				
		
		
		
	}

	getJson($_GET["id_employe"], $_GET["id_projet"]);

?>