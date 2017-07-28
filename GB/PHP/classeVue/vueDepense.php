<?php
/**
    Fichier : vueDepense.php
    Auteur : Maxime Proulx
    Fonctionnalité : Permet de lister et trier la liste de toutes les dépense
    Date : 20 avril 2017
 
    Vérification :
    Date                   Nom                    Approuvé
    ========================================================= 
    23 avril 2017        Pietro Primo             OUI
    23 avril 2017        Maxime Proulx            OUI
    23 avril 2017        Boris Zoretic            OUI
 
 
    Historique de modifications :
    Date                   Nom                   Description
    ========================================================= 
    20 avril 2017        Maxime Proulx           Création de toute les fonctionnalitées de la vue
	20 avril 2017        Pietro Primo            Création de toute les fonctionnalitées de la vue
	20 avril 2017        Boris Zoretic           Ajustement de certaine fonctionnalitées
	24 avril 2017		 Pietro Primo		   	 Changement d'affichage
    **/
	
	session_start();
	require_once("../controlleur/ConnectionBD.php");
	if(!isSet($_SESSION["tri"])){
		$_SESSION["tri"] = "date";
	}
	$result = $conn->query("SELECT * FROM viewDepense ORDER BY " .  $_SESSION["tri"] . " ");

	if($result->num_rows > 0){
	
		echo "<table  class='table table-hover'>";
		echo "<tr>";	
		if($_SESSION["tri"] == "date"){
			echo "<th class='bold greenText'> Date </th>";
		}
		else{			
			echo "<th> Date </th>";
		}
		echo "<th> Prenom </th>";
		echo "<th> Nom </th>";	
		
		if($_SESSION["tri"] == "nomProjet"){
			echo "<th class='bold greenText'> Projet </th>";
		}
		else{			
		echo "<th> Projet </th>";
		}
		
		echo "<th> Categorie </th>";
		
		if($_SESSION["tri"] == "montant"){
			echo "<th class='bold greenText'> Montant </th>";
		}
		else{			
			echo "<th> Montant </th>";	
		}
		
		echo "</tr>";	
		
		while($row = $result->fetch_assoc()){	
			echo "<tr>";	
			echo "<td>" . $row["date"] . "</td>";
			echo "<td>" . $row["prenom"] . "</td>";
			echo "<td>" . $row["nom"] . "</td>";	
			echo "<td>" . $row["nomProjet"] . "</td>";
			echo "<td>" . $row["categorieDepense"] . "</td>";
			echo "<td>" . $row["montant"] . "$" ."</td>";;		
			echo "</tr>";	
		}
		echo "</table>";	
	}
?>