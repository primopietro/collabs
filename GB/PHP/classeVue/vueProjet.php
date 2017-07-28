<?php
/**
    Fichier : vueProjet.php
    Auteur : Boris Zoretic
    Fonctionnalité : Permet d'afficher la page d'un projet avec la modifications des données
    Date : 19 avril 2017
 
    Vérification :
    Date                   Nom                    Approuvé
    ========================================================= 
    23 avril 2017        Pietro Primo             OUI
    23 avril 2017        Maxime Proulx            OUI
    23 avril 2017        Boris Zoretic            OUI
 
 
    Historique de modifications :
    Date                   Nom                   Description
    ========================================================= 
    19 avril 2017       Boris Zoretic            Création de tous les fonctionnalitées avec les fonctions
	26 avril 2017		Maxime Proulx		     Affichage en tableau et ajout de recherche
	28 avril 2017		Pietro Primo		     Ajout AngularJS
	30 avril 2017		Boris Zoretic		     Suppression de tous les "styles" (remplacé pour des classes)
 
    **/
	
	require_once("../controlleur/ConnectionBD.php");
	$id_projet = ((($_GET["idProjet"]) + 666) / 666 ) - 1;
	$etat = 1;
	$result = $conn->query("SELECT id_etat_projet FROM projet WHERE id_projet = $id_projet");
	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
		$etat = $row['id_etat_projet'];
		}
	}
	$result = $conn->query("SELECT * FROM employe_projet ep JOIN employe e ON e.id_employe = ep.id_employe WHERE ep.id_projet= " . $id_projet . "");
	

	if($result->num_rows > 0){
		echo "<input class='width20' type='text' id='nom' onkeyup='rechercheNomEmpPro()' placeholder='Chercher un nom'>";
		echo "<input class='width20' type='text' id='prenom' onkeyup='recherchePrenomEmpPro()' placeholder='Chercher un prenom'>";
		echo "<input class='width20' type='text' id='tel' onkeyup='rechercheTelephoneEmpPro()' placeholder='Chercher un téléphone'>";
		echo "<input class='width20' type='text' id='couriel' onkeyup='rechercheCourielEmpPro()' placeholder='Chercher un couriel'>";
		echo "<input class='width20' type='text' id='montant' onkeyup='rechercheMontantEmpPro()' placeholder='Chercher un montant alloue'><br><br>";
		echo "<table id='employeProjetTable'  class='col-xs-12  table table-hover table-responsive'>";
		echo "<tr>";
		echo "<th> Nom </th>";
		echo "<th> Prenom </th>";
		echo "<th> Téléphone </th>";
		echo "<th> Couriel </th>";
		echo "<th> Montant Alloué </th>";
		echo "<th>  </th>";
		echo "</tr>";
		while($row = $result->fetch_assoc()){
			$id = ((($row["id_employe"]) + 1) * 666 ) - 666;
				echo "<tr>";
				echo  "<td>" . $row["nom"] . "</td>";
				echo  "<td>" . $row["prenom"] . "</td>";
				echo "<td>" . $row["telephone"] . "</td>";
				echo "<td>" . $row["courriel"] . "</td>";
				echo "<td>" . $row["total_alloue"] . "</td>";
				 if($etat == 1){
					echo "<td> <a href='projetPersonne.php?idProjet=" . $id_projet . "&idEmploye=" . $row['id_employe'] . "'>Modifier</a></td>";
				 }
			echo "</tr>";

		}
		echo "</table>";

	}
?>
<div class="paddingTop20 paddingBot20">
	<?php
		if($etat == 1){
			echo "<h1  data-toggle='collapse' data-target='#addEmpProj' aria-expanded='true'  class='textCenter'>Ajouter une personne au projet<span class='info'>
					<i class='fa fa-question-circle' aria-hidden='true'></i>
						<span>Utilisé les champs disponnible pour ajouter une personne au projet</span>
				</span> </h1>";
			$result = $conn->query("SELECT * FROM employe WHERE id_etat_employe = 1");
		
			if($result->num_rows > 0){
				echo "<iframe id='frameAjoutPersonne' name='frameAjoutPersonne' class='formFrame'></iframe>";
				echo "<form id='addEmpProj' class='createEmploye collapse in' action='../classeGestion/GestionEmployeProjet.php' method='post' target='frameAjoutPersonne'>";
				echo "<label for='ajouterEP'>Employé:</label><br>";
				echo "<select class='myinput fullWidth' name='ajouterEP'>";
				while($row = $result->fetch_assoc()){
					echo " <option value='" . $row["id_employe"] . "'>" .  $row["nom"] . ", ".  $row["prenom"]. "</option>";
				}
				echo "/<select ><br><br>";
				
				echo "<label for='Montant'>Montant alloué ($):</label><br>";
				echo "<label id='erreurMontant' class='erreur'>Veuillez saisir un budget pour l'employé dans le projet</label>";
				echo "<input class='myinput' type='number' name='Montant' placeholder='ex: 1000'></input>";
				
				echo "<input class='none' name='idProjet' value='" . $id_projet . "'></input>";
				
				echo "<label id='succesMontant' class='succes'>L'enregistrement à été éffectué avec succès</label><br>";
				echo "<button name='ajout' class='btn btn-success' onclick='validerMontant(this.form.Montant);'>Ajouter</button>";
				echo "</form>";
			}
			else{
				echo "Pas d'employes dans le systeme. <a href='employes.php'>cliquez ici pour en ajouter un!</a>";
			}
		}	
	?>						  
</div>