<?php

class home extends controller{

	
	public function index(){
		$data['data'] = $this->model('Home_model')->getHome();
		$this->view('template/header');
		$this->alert();
		
		if($_SESSION['user']){
		
		$this->view('home/home', $data);
		}else{
		
		$this->view('user/masuk');
		}
	}
	
	public function hapus($list = 'kosong'){
		if($list != 'kosong'){
	
		if($this->model('Home_model')->getHapus($list) > 0){
		$_SESSION['alert'] = ['sukses', 'hapus'];
		
		return header('location:/');
		}else{
		
		$_SESSION['alert'] = ['gagal', 'hapus'];
		return header('location:/');
		}
		
		}else{
		
		$_SESSION['alert'] = ['gagal', 'hapus'];
		return header('location:/');
		}
		
	}
	
	public function tambah(){
		if(!empty($_POST['list'])){
		
		if($this->model('Home_model')->getTambah($_POST) > 0){
		$_SESSION['alert'] = ['sukses', 'tambah'];
		
		return header('location:/');
		}else{
		
		$_SESSION['alert'] = ['gagal', 'tambah'];
		return header('location:/');
		}
		
	}else{
		
		$_SESSION['alert'] = ['gagal', 'tambah'];
		return header('location:/');
	
	}
	}
	
	public function selesai(){
		$data['data'] = $this->model('Home_model')->getSelesai();
		$this->view('template/header');
		$this->view('home/home', $data);
	}
	
	public function menunggu(){
		$data['data'] = $this->model('Home_model')->getMenunggu();
		$this->view('template/header');
		$this->view('home/home', $data);
	}
	
	public function selesaikan($list = 'kosong'){
		if($list != 'kosong'){
		
		if($this->model('Home_model')->getSelesaikan($list) > 0){
		$_SESSION['alert'] = ['sukses', 'menyelesaikan'];
		
		return header('location:/');
		}else{
		
		$_SESSION['alert'] = ['gagal', 'menyelesaikan'];
		return header('location:/');
		}
		}else{
		
		$_SESSION['alert'] = ['gagal', 'menyelesaikan'];
		return header('location:/');
		}
	
	}
	
	public function cari(){
		$data['data'] = $this->model('Home_model')->getCari($_POST);
		$this->view('template/header');
		$this->view('home/home', $data);
	}
	
	public function edit(){
		if(!empty($_POST['list'])){
		
			if($this->model('Home_model')->getEdit($_POST) > 0){
				$_SESSION['alert'] = ['sukses', 'edit'];
			
				return header('location:/');
			}else{
			
				$_SESSION['alert'] = ['gagal', 'edit'];
				return header('location:/');
			}
		
		}else{
		
			$_SESSION['alert'] = ['gagal', 'edit'];
			return header('location:/');
		
		}
	}
	
}
?>
