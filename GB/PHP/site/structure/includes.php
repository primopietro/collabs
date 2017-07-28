<?php
if(!isSet($_SESSION["LOG"]) && basename($_SERVER['PHP_SELF']) != "index.php"){
	header("Location: /gb/php/site/index.php");
}
echo "<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>";
echo "<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js'></script>";
echo "<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>";
?>