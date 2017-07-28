<?php
	session_start();
	require_once("controlleur/ConnectionBD.php");
	
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
	
	
	
	
	
?>