<?php

class User_model extends Database{


	public function getDaftar($user){
			$query = "INSERT INTO data_user SET username=:user, password=:pw";
			$this->query($query);
			$this->bind('user', $user['user']);
			$this->bind('pw', $user['pass']);
			$this->eksekusi();
			return header('location:/');
		}
		
		
	public function getMasuk($user){
			$query = "SELECT * FROM data_user WHERE username=:user";
			$this->query($query);
			$this->bind('user', $user['user']);
			
			foreach($this->ambilData() as $cek){
				$cekU = $cek['username'];
				$cekP = $cek['password'];
			}
			
			if($cekU == $user['user'] && $cekP == $user['pass']){
				$_SESSION['user'] = $user['user'];
				return header('location:/');
			}else{
				return 'kesalahan';
			}
			
		
		}
}