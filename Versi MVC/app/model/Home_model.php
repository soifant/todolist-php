<?php

class Home_model extends Database{
	
	public function sesi(){
		return $_SESSION['user'];
	}
	
	public function getHome(){
		$query = "SELECT * FROM todolist WHERE user=:user";
		$this->query($query);
		$this->bind('user', $this->sesi());
		return $this->ambilData();
		
	}
	
	public function getHapus($list){
		$query = "DELETE FROM todolist WHERE list=:list and user=:user";
		$this->query($query);
		$this->bind('list', $list);
		$this->bind('user', $this->sesi());
		$this->eksekusi();
		return header('location:/');
	}
	
	public function getTambah($list){
		$query = "INSERT INTO todolist SET list=:list, status=:status, user=:user";
		$this->query($query);
		$this->bind('list', $list['list']);
		$this->bind('status', 'menunggu');
		$this->bind('user', $this->sesi());
		$this->eksekusi();
		return header('location:/');
	}
	
	public function getSelesai(){
		$query = "SELECT * FROM todolist WHERE status=:status and user=:user";
		$this->query($query);
		$this->bind('user', $this->sesi());
		$this->bind('status', 'selesai');
		return $this->ambilData();
		
	
	}
	
	public function getMenunggu(){
		$query = "SELECT * FROM todolist WHERE status=:status and user=:user";
		$this->query($query);
		$this->bind('user', $this->sesi());
		$this->bind('status', 'menunggu');
		return $this->ambilData();
		
	}
	
	public function getSelesaikan($list){
		$query = "UPDATE todolist SET status=:status WHERE list=:list and user=:user";
		$this->query($query);
		$this->bind('status', 'selesai');
		$this->bind('list', $list);
		$this->bind('user', $this->sesi());
		$this->eksekusi();
		return header('location:/');
		
	}
	
	public function getCari($list){
		$query = "SELECT * FROM todolist WHERE list=:list and user=:user";
		$this->query($query);
		$this->bind('list', $list['cari']);
		$this->bind('user', $this->sesi());
		return $this->ambilData();
		
	}
	
	
}

?>
