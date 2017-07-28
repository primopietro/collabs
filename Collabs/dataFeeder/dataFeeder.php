<?php
include_once '../model/collab.php';
$str = file_get_contents('basicArtistList.json');

$json = json_decode( preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $str), true );

$aCollab = new Collab();

foreach ($json as $key => $value) {
	
	foreach ($value as $key2 => $value2) {
		
		//print_r ($value2["songName"]);
		$aCollab->insertCollab($value2,trim($key));
	}
	
	
}
?>