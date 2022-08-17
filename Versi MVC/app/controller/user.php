<?php

class user extends Controller{
	public function index($param){
	$this->view('template/header');
	switch($param){
		case 'masuk':
			$this->view('user/masuk');
				break;
			
		case 'daftar':
			$this->view('user/daftar');
				break;
				
		default:
			$this->view('user/masuk');
				break;
	}
	
	
	}
	
	public function daftar(){
		$this->model('User_model')->getDaftar($_POST);
	}
	
	public function masuk(){
		$this->model('User_model')->getMasuk($_POST);
	
		
	}
	
	public function keluar(){
		session_unset();
		session_destroy();
		header('location:/');
	}

}
?>
