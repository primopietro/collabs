<?php
class Collab {
	protected $songName;
	protected $artistName;
	protected $isMain;
	protected $tableName;
	function __construct() {
		$this->songName = "";
		$this->artistName = "";
		$this->isMain = true;
		$this->tableName = "collab";
	}
	function addToDatabase() {
		include_once '../database_connect.php';
		$boolean = 1;
		if ($this->isMain != true) {
			$boolean = 0;
		}
		
		$sql = "INSERT INTO `collab` (`songName`, `artistName`, `isMain`)
		 VALUES ('$this->songName', '	$this->artistName', '$boolean')";
		
		if (! $result = $conn->query ( $sql )) {
			echo "fail";
			exit ();
		} else {
			echo "success";
		}
	}
	function getObjectListFromDatabase() {
		include_once '../database_connect.php';
		$boolean = 1;
		if ($this->isMain != true) {
			$boolean = 2;
		}
		//???????????
		
		$sql = "INSERT INTO `collab` (`songName`, `artistName`, `isMain`)
		VALUES ('$this->songName', '	$this->artistName', '$boolean')";
		
		if (! $result = $conn->query ( $sql )) {
			echo "fail";
			exit ();
		} else {
			echo "success";
		}
	}
	function getDBObjectListFromSongName($name) {
		include_once '../database_connect.php';
		$name = htmlspecialchars ( $name );
		$aCollabList = array ();
		$sql = "SELECT * FROM `collab`.`collab` WHERE songName = '$name' AND isMain = 1 ";
		
		$result = $conn->query ( $sql );
		
		if ($result->num_rows > 0) {
			while ( $row = $result->fetch_assoc () ) {
				$aCollab = array ();
				$aCollab ['artistName'] = $row ["artistName"];
				$aCollabList [$row ["songName"]] = $aCollab;
			}
		}
		
		return $aCollabList;
	}
	function getDBObjectJSONFromSongName($name) {
		return json_encode ( $this->getDBObjectListFromSongName ( $name ) );
	}
	function getDBObjectListFromArtistNames($artists) {
		include_once '../database_connect.php';
		$aCollabList = array ();
		$sql = "SELECT songName ";
		$compter = 0;
		foreach ( $artists as &$artist ) {
			$sql .= " FROM collab as c$compter
			WHERE c$compter.artistName LIKE '%$artist%'";
			$compter ++;
			if ($compter < sizeOf ( $artists )) {
				$sql .= " UNION SELECT songName ";
			}
		}
		
		$sql .= " GROUP BY songName ORDER BY songName";
		// echo $sql;
		$result = $conn->query ( $sql );
		
		if ($result->num_rows > 0) {
			while ( $row = $result->fetch_assoc () ) {
				$aCollabLocal ["songName"] = $row ["songName"];
				$aCollabLocal ["mainArtist"] = $this->getFeaturedArtistFromSongName ( $row ["songName"] );
				$aCollabLocal ["secondaryArtistList"] = $this->getSecondaryArtistListFromSongName ( $row ["songName"] );
				
				$aCollabList [] = $aCollabLocal;
			}
		}
		return $aCollabList;
	}
	function getFeaturedArtistFromSongName($songName) {
		
		
		$sql = "SELECT artistName 
				FROM collab 
				WHERE songName = '$songName' AND isMain = 1 ";
		
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "collab";
		
		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		$result = $conn->query ( $sql );
		$artistName ="";
		if ($result->num_rows > 0) {
			while ( $row = $result->fetch_assoc () ) {
				$artistName = $row['artistName'];
			}
		}
		return $artistName;
	}
	function getSecondaryArtistListFromSongName($songName) {
		include_once '../database_connect.php';
		$sql = "SELECT DISTINCT artistName
		FROM collab
		WHERE songName = '$songName' AND isMain = 0 ";
		
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "collab";
		
		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		$result = $conn->query ( $sql );
		$artistNameList =array();
		if ($result->num_rows > 0) {
			while ( $row = $result->fetch_assoc () ) {
				$artistNameList[] =  " ". $row['artistName'] ;
			}
		}
		return $artistNameList;
	}
	
	function getDBObjectJSONFromArtistNames($artists) {
		echo json_encode ( $this->getDBObjectListFromArtistNames ( $artists ) );
	}
	
	function insertCollab($collabSong, $mainArtist){
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "collab";
		
		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
	
		$songName =   $collabSong["songName"];
		echo $songName . " " . $mainArtist . "<br>";
		$sql = "INSERT INTO `collab` (`songName`, `artistName`, `isMain`)
		VALUES ('".$songName."', ' ". $mainArtist. "', 1)";
		
		if (! $result = $conn->query ( $sql )) {
			//echo "fail";
			//exit ();
		} else {
			//echo "success";
		}
		
		$artistList =    $collabSong["artistList"];
		if (is_array($artistList) || is_object($artistList))
		{
			foreach ($artistList as $localArtist)
			{
				$sql = "INSERT INTO `collab` (`songName`, `artistName`, `isMain`)
				VALUES ('" . $songName. "', '" . $localArtist. "', 0)";
					
				if (! $result = $conn->query ( $sql )) {
					//echo "fail";
					//exit ();
				} else {
					//echo "success";
				}
			}
		}
		else{
			$sql = "INSERT INTO `collab` (`songName`, `artistName`, `isMain`)
				VALUES ('" . $songName. "', '" . $artistList. "', 0)";
			
			if (! $result = $conn->query ( $sql )) {
				//echo "fail";
				//exit ();
			} else {
				//echo "success";
			}
		}
		
		
	}
	
	function getArtistListFromDB() {
		$sql = "SELECT DISTINCT artistName FROM `collab`.`collab` ORDER BY artistName";
		include_once '../database_connect.php';
		$result = $conn->query ( $sql );
		$anArtistList = array ();
		if ($result->num_rows > 0) {
			while ( $row = $result->fetch_assoc () ) {
				$anArtistList [] = $row ["artistName"];
			}
		}
		return $anArtistList;
	}
	function getJsonDataArtistList() {
		return json_encode ( $this->getArtistListFromDB () );
	}
	//TODO :
	/*
	 --TOP ARTISTS 
	 SELECT      `artistName`
    FROM    collab
    GROUP BY `artistName`
    ORDER BY COUNT(*) DESC
    LIMIT    10;
	  --TOP SONGS 
	 SELECT      `songName`
    FROM    collab
    GROUP BY `songName`
    ORDER BY COUNT(*) DESC
    LIMIT    10;
	 */
	
	/**
	 * songName
	 *
	 * @return unkown
	 */
	public function getSongName() {
		return $this->songName;
	}
	
	/**
	 * songName
	 *
	 * @param unkown $songName        	
	 * @return Collab
	 */
	public function setSongName($songName) {
		$this->songName = $songName;
		return $this;
	}
	
	/**
	 * artistName
	 *
	 * @return unkown
	 */
	public function getArtistName() {
		return $this->artistName;
	}
	
	/**
	 * artistName
	 *
	 * @param unkown $artistName        	
	 * @return Collab
	 */
	public function setArtistName($artistName) {
		$this->artistName = $artistName;
		return $this;
	}
	
	/**
	 * isMain
	 *
	 * @return unkown
	 */
	public function getIsMain() {
		return $this->isMain;
	}
	
	/**
	 * isMain
	 *
	 * @param unkown $isMain        	
	 * @return Collab
	 */
	public function setIsMain($isMain) {
		$this->isMain = $isMain;
		return $this;
	}
}


