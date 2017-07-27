<?php
class Collab {
	protected $songName;
	protected $artistName;
	protected $isMain; 
	protected $tableName;
	function __construct() {
		$this->songName= "";
		$this->artistName= "";
		$this->isMain = true;
		$this->tableName = "collab";
	}
	function addToDatabase(){
		include_once '../database_connect.php';
		$boolean =1;
		if($this->isMain != true){
			$boolean =0;
		}
		
		$sql =
		"INSERT INTO `collab` (`songName`, `artistName`, `isMain`)
		 VALUES ('$this->songName', '	$this->artistName', '$boolean')";
	
		if (! $result = $conn->query ( $sql )) {
			echo "fail";
			exit ();
		} else {
			echo "success";
		}
		
	}
	
	function getObjectListFromDatabase(){
		include_once '../database_connect.php';
		$boolean =1;
		if($this->isMain != true){
			$boolean =2;
		}
		
		$sql =
		"INSERT INTO `collab` (`songName`, `artistName`, `isMain`)
		VALUES ('$this->songName', '	$this->artistName', '$boolean')";
		
		if (! $result = $conn->query ( $sql )) {
			echo "fail";
			exit ();
		} else {
			echo "success";
		}
		
	}

	function getDBObjectListFromSongName($name){
		include_once '../database_connect.php';
		$name = htmlspecialchars($name);
		$aCollabList = array();
		$sql ="SELECT * FROM `collab`.`collab` WHERE songName = '$name' AND isMain = 1 ";
		
		$result = $conn->query ( $sql );
		
		if ($result->num_rows > 0) {
			while ( $row = $result->fetch_assoc () ) {
				$aCollab = array();
				$aCollab['artistName'] = $row["artistName"];
				$aCollabList[$row["songName"]] = $aCollab;
			}
		}
		return $aCollabList;
	}
	
	function getDBObjectJSONFromSongName($name){
		
		return json_encode($this->getDBObjectListFromSongName($name));
	}
	
	function getDBObjectListFromArtistNames($artists){
		include_once '../database_connect.php';
		$aCollabList = array();
		$sql ="SELECT songName ";
		$compter = 0;
		foreach ($artists as &$artist) {
			$sql .=" FROM collab as c$compter
			WHERE c$compter.artistName LIKE '%$artist%'";
			$compter++;
			if($compter < sizeOf($artists)){
				$sql .=" UNION SELECT songName ";
			}
		}
		
		$sql .=" GROUP BY songName";
		//echo $sql;
		$result = $conn->query ( $sql );
		
		if ($result->num_rows > 0) {
			$fastechObjects = array ();
			while ( $row = $result->fetch_assoc () ) {			
				$aCollabList[] =  $row["songName"];
			}
		}
		return $aCollabList;
	}
	function getDBObjectJSONFromArtistNames($artists){
		echo json_encode($this->getDBObjectListFromArtistNames($artists));
	}
    /**
     * songName
     * @return unkown
     */
    public function getSongName(){
        return $this->songName;
    }

    /**
     * songName
     * @param unkown $songName
     * @return Collab
     */
    public function setSongName($songName){
        $this->songName = $songName;
        return $this;
    }

    /**
     * artistName
     * @return unkown
     */
    public function getArtistName(){
        return $this->artistName;
    }

    /**
     * artistName
     * @param unkown $artistName
     * @return Collab
     */
    public function setArtistName($artistName){
        $this->artistName = $artistName;
        return $this;
    }

    /**
     * isMain
     * @return unkown
     */
    public function getIsMain(){
        return $this->isMain;
    }

    /**
     * isMain
     * @param unkown $isMain
     * @return Collab
     */
    public function setIsMain($isMain){
        $this->isMain = $isMain;
        return $this;
    }

}

$aCollab = new Collab();
echo $aCollab->getDBObjectJSONFromArtistNames(["Childish Gambino","Kauai","Josh"]);

