 <?php

/**
 * 
 */
 class db
 {
 	private $host = "localhost";
 	private $user = "root"; // your user = root
 	private $pswd = ""; // ""
 	private $dbName = "yemi_lyrics";

 	function __construct()
 	{
 		# code... ;
 	}


 	function connect() {
 		$con_str = "mysql:host=$this->host;dbname=$this->dbName";
 		
 		try {
 			$conn = new PDO($con_str, $this->user, $this->pswd);
 			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 		} catch(PDOException $ex) {
 			echo "Error: ".$ex->getMessage();
 		}

 		return $conn;
 	}


 	
 } 