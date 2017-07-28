<?php
	session_start();
	require_once("controlleur/ConnectionBD.php");
	
	$nom = htmlspecialchars($_POST['Nom']);
	$prenom = htmlspecialchars($_POST['Prenom']);
	$courriel = htmlspecialchars($_POST['Courriel']);
	$tel = htmlspecialchars($_POST['Telephone']);
	$mot_passe = "password";
	
	$sql = "INSERT INTO employe (id_employe, nom, prenom, courriel, mot_passe, telephone) 
	values (NULL, '$nom', '$prenom', '$courriel', '$mot_passe' , '$tel')";

	if ($conn->query($sql) === TRUE) {
		echo "New record created successfully";
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
?>