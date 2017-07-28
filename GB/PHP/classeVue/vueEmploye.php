<?php
/**
    Fichier : vueCategorieDepense.php
    Auteur : Pietro Primo
    Fonctionnalité : Permet d'afficher la liste des categorie de dépense Alloue
    Date : 18 avril 2017
 
    Vérification :
    Date                   Nom                       Approuvé
    ========================================================= 
    23 avril 2017        Pietro Primo            OUI
    23 avril 2017        Maxime Proulx            OUI
    23 avril 2017        Boris Zoretic            OUI
 
 
    Historique de modifications :
    Date                   Nom                       Description
    ========================================================= 
	18 avril 2017       Pietro Primo   			 Création de toute les fonctionnalitées de la vue
	24 avril 2017       Pietro Primo   			 Modification affichage
	26 avril 2017		Maxime Proulx		     Affichage en tableau et ajout de recherche

    **/
	
	require_once("../controlleur/ConnectionBD.php");
	$result = $conn->query("SELECT * FROM employe ORDER BY id_etat_employe ");
		echo "<input class='width25' type='text' id='nom' onkeyup='rechercheNomEmploye()' placeholder='Chercher un nom'>";
		echo "<input class='width25' type='text' id='prenom' onkeyup='recherchePrenomEmploye()' placeholder='Chercher un prenom'>";
		echo "<input class='width25' type='text' id='tel' onkeyup='rechercheTelephoneEmploye()' placeholder='Chercher un téléphone'>";
		echo "<input class='width25' type='text' id='couriel' onkeyup='rechercheCourielEmploye()' placeholder='Chercher un couriel'><br><br>";
	if($result->num_rows > 0){	
		echo "<table id='employeTable'  class='col-xs-12  table table-hover table-responsive'>";
		echo "<tr>";
				echo "<th> Nom </th>";
				echo "<th> Prenom </th>";
				echo "<th> Téléphone </th>";
				echo "<th> Couriel </th>";
				echo "<th>  </th>";
			echo "</tr>";
		while($row = $result->fetch_assoc()){
			$id = ((($row["id_employe"]) + 1) * 666 ) - 666;
			if( $row["id_etat_employe"] == 1 ){				
				echo "<tr>";
			}
			else {
				echo "<tr class='annule'>";
			}
				echo  "<td>" . $row["nom"] . "</td>";
				echo  "<td>" . $row["prenom"] . "</td>";
				echo "<td>" . $row["telephone"] . "</td>";
				echo "<td>" . $row["courriel"] . "</td>";
				echo "<td> <a href='modifierEmploye.php?idEmploye="  . $id . "'>Modifier</td>";
			echo "</tr>";

		}
		echo "</table>";
	}
	
?>