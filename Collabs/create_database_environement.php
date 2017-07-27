<?php
/***********************************Connect to datase environement*****************************************/
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'collab';
$conn = new mysqli($dbhost, $dbuser, $dbpass);

// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

else{
	echo 'Connected successfully';
}
echo "<br>";
/******************************************Delete old environement***************************************/
$sql = 'DROP DATABASE ' . $dbname ;
if (!$result = $conn->query($sql)) {
	echo "<span style='color:red;'>Could not drop database " . $dbname . "</span>";
	
}
else{
	echo "<span style='color:green;'>Database " . $dbname . " deleted successfully</span>\n";
}
echo "<br>";
/****************************************Create new environement*************************************/

$sql = 'CREATE DATABASE ' . $dbname;
if (!$result = $conn->query($sql)) {
	// Oh no! The query failed.
	echo "<span style='color:red;'>Could not create database " . $dbname . "</span>";
	exit;
}
else{
	echo "<span style='color:green;'>Database " . $dbname . " created successfully</span>\n";
}
echo "<br>";
/*******************************************CONNECT TO DATABASE*************************************/
$conn->close();
$conn = null;
$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

// Check connection
if ($conn->connect_error) {
	echo "<span style='color:red;'>Connection failed" . $dbname . "</span>";
}

else{
	echo '<span color="green"> Connected successfully to ' .  $dbname . "</span>";
}
echo "<br>";

/***************************Database structuring (tables, primary keys, etc.)***********************/

$sql = 'CREATE TABLE `collab`.`collab` (
  `songName` varchar(255) NOT NULL,
  `artistName` varchar(255) NOT NULL,
  `isMain` boolean NOT NULL
) ENGINE=InnoDB ';
if (!$result = $conn->query($sql)) {
	// Oh no! The query failed.
	echo "<span style='color:red;'>Could not create table collab</span>" ;
	exit;
}
else{
	echo "<span style='color:green;'>Table collab created successfully</span>\n";
}
echo "<br>";


$sql = "INSERT INTO `collab` (`songName`, `artistName`, `isMain`)
 VALUES ('Giants', 'Childish Gambino', true), 
('Giants', 'Josh Osho', false),
('FakeSongTest', 'Childish Gambino', false), 
('FakeSongTest', 'Josh Osho', true),
('Giants', 'Kauai', false),
 ('Last Time', 'Gucci Mane', true),
 ('Last Time', 'Travis Scott', false),
 ('Baptized In Fire', 'Kid Kudi', true),
 ('Baptized In Fire', 'Travis Scott', false);
";
if (!$result = $conn->query($sql)) {
	// Oh no! The query failed.
	echo "<span style='color:red;'>Could not insert into table collab</span>" ;
	exit;
}
else{
	echo "<span style='color:green;'Insert successfull</span>\n";
}
echo "<br>";


/**********************************************Close db connection**********************************/
$conn->close();
?>