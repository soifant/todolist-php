<?php

class User_model extends Database{


	public function getDaftar($user){
			$query = "INSERT INTO data_user SET username=:user, password=:pw";
			$this->query($query);
			$this->bind('user', $user['user']);
			$this->bind('pw', md5($user['pass']));
			$this->eksekusi();
			return $this->rowCount();
	}
	
	
	public function getMasuk($user){
			$query = "SELECT * FROM data_user WHERE username=:user";
			$this->query($query);
			$this->bind('user', $user['user']);
			return $this->ambilData();
			
		}
}
?>
