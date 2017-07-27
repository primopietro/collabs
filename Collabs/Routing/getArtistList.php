<?php
if(isset( $_GET['safe_key'])){
	$key = $_GET['safe_key'];
	
	if($key == "420key666"){
		include_once '../model/collab.php';
		$aCollab = new Collab();
		echo $aCollab->getJsonDataArtistList();
	}
}
