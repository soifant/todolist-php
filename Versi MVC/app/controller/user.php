<?php

class user extends Controller{
	public function index($param){
	
	$this->view('template/header');
	
	switch($param){
			
		case 'daftar':
			$this->alert();
			$this->view('user/daftar');
				break;
				
		default:
			$this->alert();
			$this->view('user/masuk');
				break;
	}
	
	
	}
	
	
	
	public function daftar(){
		if(!empty($_POST['user']) || !empty($_POST['pass'])){
	
	
		$data['data'] = $this->model('User_model')->getMasuk($_POST);
		foreach($data['data'] as $cek){
		$cekU = $cek['username'];
		}
	
		if($cekU != $_POST['user']){
		if($this->model('User_model')->getDaftar($_POST) > 0){
			
			$_SESSION['alert'] = ['sukses', 'daftar'];
			return header('location:/?url=user');	
					
		}else{
		
			$_SESSION['alert'] = ['gagal', 'daftar'];
			return header('location:/?url=user');			
		}
		
		}else{
		
			$_SESSION['alert'] = ['gagal', 'daftar'];
			return header('location:/?url=user/index/daftar');			
			
		}
		}else{
			
			$_SESSION['alert'] = ['gagal', 'daftar'];
			return header('location:/?url=user/index/daftar');			
			
		}
	}
	
	
	
	public function masuk(){
		if(!empty($_POST['user']) || !empty($_POST['pass'])){
		
		
		$data['data'] = $this->model('User_model')->getMasuk($_POST);
		
		foreach($data['data'] as $cek){
			$cekU = $cek['username'];
			$cekP = $cek['password'];
		}
		
		if($cekU == $_POST['user'] && $cekP == $_POST['pass']){
			$_SESSION['user'] = $cekU;
			return header('location:/');
		}else{
			
			$_SESSION['alert'] = ['gagal', 'masuk'];
			return header('location:/?url=user');
		}
		
		}else{
		
			$_SESSION['alert'] = ['gagal', 'masuk'];
			return header('location:/?url=user');
		}
		
	}
	
	public function keluar(){
		unset($_SESSION['user']);
		$_SESSION['alert'] = ['sukses', 'keluar'];
		header('location:/');
	}

}
?>
