<?php
if(isset( $_GET['safe_key'])){
	$key = $_GET['safe_key'];
	
	if($key == "420key666"){
		include_once '../model/collab.php';
		$aCollab = new Collab();
		
		$artistList = json_decode(file_get_contents('php://input'), TRUE);
		if(sizeof($artistList)>1){
			echo $aCollab->getDBObjectJSONFromArtistNames($artistList);
		}
	
	}
}
