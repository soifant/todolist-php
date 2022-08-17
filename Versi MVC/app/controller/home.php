<?php

class home extends controller{

	public function index(){
		$data['data'] = $this->model('Home_model')->getHome();
		if($_SESSION['user']){
		
		$this->view('home/home', $data);
		}else{
		
		$this->view('user/masuk');
		}
	}
	
	public function hapus($list){
		$this->model('Home_model')->getHapus($list);
	}
	
	public function tambah(){
		$this->model('Home_model')->getTambah($_POST);
	
	}
	
	public function selesai(){
		$data['data'] = $this->model('Home_model')->getSelesai();
		$this->view('home/home', $data);
	}
	
	public function menunggu(){
		$data['data'] = $this->model('Home_model')->getMenunggu();
		$this->view('home/home', $data);
	}
	
	public function selesaikan($list){
		$this->model('Home_model')->getSelesaikan($list);
	
	}
	
	public function cari(){
		$data['data'] = $this->model('Home_model')->getCari($_POST);
		$this->view('home/home', $data);
	}
}

?>
