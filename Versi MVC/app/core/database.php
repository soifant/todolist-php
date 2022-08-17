<?php

class Database{
	private $dbhost= "host",
			$dbuser= "user",
			$dbpass= "pass",
			$dbname= "name",
			$db,
			$stmt;
	
			
	public function __construct(){
		$dsn = "mysql:host=".$this->dbhost.";dbname=".$this->dbname."";
		$option = [PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION];
		
		try{
			$this->db = new PDO($dsn, $this->dbuser, $this->dbpass, $option);
		}catch(PDOException $e){
			die($e->getMessage());
		}
	}
	
	
	public function query($query){
		$this->stmt = $this->db->prepare($query);
	}
	
	
	public function bind($param, $value, $type = null){
		if(is_null($type)){
			switch(true){
				case is_int($value):
					$type = PDO::PARAM_INT;
					break;
					
				case is_bool($value):
					$type = PDO::PARAM_BOOL;
					break;
					
				default:
					$type = PDO::PARAM_STR;
					break;
			
			}
		
		}
		
		$this->stmt->bindValue($param, $value, $type);
	}
	
	
	public function eksekusi(){
		$this->stmt->execute();
	}
	
	public function ambilData(){
		$this->eksekusi();
		return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	
	public function rowCount(){
		return $this->stmt->rowCount();
	}


}

?>
