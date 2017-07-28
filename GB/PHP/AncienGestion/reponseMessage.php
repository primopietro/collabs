<?php
	session_start();
	require_once("controlleur/ConnectionBD.php");
	
	$id=$_REQUEST['id_message'];
	$etat = $_REQUEST['etat'];
	$reponse = $_REQUEST['Reponse'];
	
	//set la dat au bon timezone
	date_default_timezone_set('America/Montreal');
	$date =date('Y/m/d H:i:s ');
	echo"$id"."<br>";
	echo"$date";
	
	//requete sql qui modifi la date de reponse et le statut de la notification
	$sql = "UPDATE message SET id_etat_message='$etat', moment_reponse='$date', reponse = '$reponse' WHERE id_message='$id'";
	//affiche une confirmation ou une erreur par rapport a la requete sql
	 if ($conn->query($sql) === TRUE) {
		 echo "New record created successfully";
	 } else {
		 echo "Error: " . $sql . "<br>" . $conn->error;
	 }
	$conn->close();
	header("Location: /gb/php/site/notifications.php");
	
?>