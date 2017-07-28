<?php
	session_start();
	require_once("controlleur/ConnectionBD.php");
	
	$idEmp = htmlspecialchars($_POST['ajouterEP']);	
	$idProjet = htmlspecialchars($_POST['idProjet']);	
	if(isSet($_POST['montant'])){
		$montant = htmlspecialchars($_POST['montant']);	
	}
	else{
		$montant = 0;	
	}
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
?>