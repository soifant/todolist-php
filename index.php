<?php
session_start();

class Database{
	//property
	private $dbhost= "sql107.epizy.com",
			$dbuser= "epiz_32134529",
			$dbpass= "w9RBcEgTB4EY",
			$dbname= "epiz_32134529_artikel",
			$db,
			$stmt;
	
	//Method
	public function __construct(){
			$this->db = new mysqli($this->dbhost, $this->dbuser, $this->dbpass, $this->dbname);
	
	}
	
	//Menyimpan query
	public function query($query){
			$this->stmt = $query;
	
	}
	
	//Melakukan koneksi
	public function eksekusi(){
			return mysqli_query($this->db, $this->stmt);
	
	}
	
	//Menampilkan data
	public function tampilkan($data = []){
			require_once 'view.php';
	}
	

}


//Mengelola data

class Data extends Database{
	
	//Menampilkan semua
	public function semuaData(){
			$this->query('SELECT * FROM todolist');
			return $this->tampilkan($this->eksekusi());
	
	}
	
	//Menampilkan daftar selesai
	public function selesai(){
			$this->query("SELECT * FROM todolist WHERE status='selesai'");
			return $this->tampilkan($this->eksekusi());
	
	}
	
	//Menampilkan daftar menunggu
	public function menunggu(){
			$this->query("SELECT * FROM todolist WHERE status='menunggu'");
			return $this->tampilkan($this->eksekusi());
	
	}
	
	//Menampilkan berdasarkan pencarian
	public function cari($cari){
			$this->query("SELECT * FROM todolist WHERE list='$cari'");
			return $this->tampilkan($this->eksekusi());
	
	}
	
	//Mengubah data status
	public function selesaikan($id){
			$this->query("UPDATE todolist SET status='selesai' WHERE list='$id'");
			$this->eksekusi();
			return $this->semuaData();
			
	}
	
	//Menambah daftar
	public function tambah($list){
			$this->query("INSERT INTO todolist SET list='$list', status='menunggu'");
			$this->eksekusi();
			return $this->semuaData();
	}
	
	//Menghapus daftar
	public function hapus($list){
			$this->query("DELETE FROM todolist WHERE list='$list'");
			$this->eksekusi();
			return $this->semuaData();
			
	}
	
	//Login
	public function login($usr, $pas){
			$this->query("SELECT * FROM data_user WHERE username='$usr'");
			
			foreach($this->eksekusi() as $cek){
				$cekU = $cek['username'];
				$cekP = $cek['password'];
			
			}
			
			if($cekU == $usr && $cekP == $pas){
				$_SESSION['user'] = $usr;
				return $this->semuaData();
			
			}else{
				echo 'kesalahan';	
			}
	}
	
	
	//Daftar
	public function daftar($usr, $pas){
			$this->query("INSERT INTO data_user SET username='$usr', password='$pas'");
			$this->eksekusi();
			return header('location:/');
	}
}




$dp = new Data;

if($_SESSION['user']){

	switch($_GET['pilih']){
		case 'selesai':
			echo $dp->selesai();
				break;
		
		case 'menunggu':
			echo $dp->menunggu();
				break;
				
		case 'selesaikan':
				echo $dp->selesaikan($_GET['id']);
				break;
				
		case 'tambah':
				echo $dp->tambah($_POST['list']);
				break;
				
		case 'hapus':
				echo $dp->hapus($_GET['id']);
				break;
				
		case 'keluar':
				session_unset();
				session_destroy();
				header('location:/');
				break;
		
		default:
		
			if($_POST['cari']){
			
					echo $dp->cari($_POST['cari']);
			}else{
					echo $dp->semuaData();
					
			}
					break;			
	
	}

}else{

	switch($_GET['pilih']){
	
		case 'login':
		echo $dp->login($_POST['user'], $_POST['pass']);
		break;
		
		case 'daftar':
		echo $dp->daftar($_POST['user'], $_POST['pass']);
		break;
		
		default:
		require_once 'login.php';
		break;
		
		}

}



?>

