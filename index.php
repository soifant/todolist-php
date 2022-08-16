<?php
session_start();

	class Database{
	private $dbhost= "sql107.epizy.com",
	        $dbuser= "epiz_32134529",
	        $dbpass= "w9RBcEgTB4EY",
	        $dbname= "epiz_32134529_artikel",
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
			
				case is_int($value) :
					$type = PDO::PARAM_INT;
				break;
				
				case is_bool($value) :
					$type = PDO::PARAM_BOOL;
				break;
				
				default :
					$type = PDO::PARAM_STR;
		
		}
	}
	
	$this->stmt->bindValue($param, $value, $type);
	}
	
	
	public function eksekusi(){
	$this->stmt->execute();
	}
	
	public function fetch(){
	$this->eksekusi();
	return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	
	public function tampilkan(){
		$data = $this->fetch();
		require_once 'view.php';
	}
}
	

//Mengelola data
class Data extends Database{
	
	//Menampilkan semua
	public function semuaData($usr){
			$this->query("SELECT * FROM todolist WHERE user=:user");
			$this->bind('user', $usr);
			return $this->tampilkan($this->eksekusi());
	
	}
	
	//Menampilkan daftar selesai
	public function selesai($usr){
			$this->query("SELECT * FROM todolist WHERE status=:status and user=:user");
			$this->bind('status', 'selesai');
			$this->bind('user', $usr);
			return $this->tampilkan($this->eksekusi());
	
	}
	
	//Menampilkan daftar menunggu
	public function menunggu($usr){
			$this->query("SELECT * FROM todolist WHERE status=:status and user=:user");
			$this->bind('status', 'menunggu');
			$this->bind('user', $usr);
			return $this->tampilkan($this->eksekusi());
	
	}
	
	//Menampilkan berdasarkan pencarian
	public function cari($cari, $usr){
			$this->query("SELECT * FROM todolist WHERE list=:cari and user=:user");
			$this->bind('cari', $cari);
			$this->bind('user', $usr);
			return $this->tampilkan($this->eksekusi());
	
	}
	
	//Mengubah data status
	public function selesaikan($id, $usr){
			$this->query("UPDATE todolist SET status=:status WHERE list=:id and user=:user");
			$this->bind('status', 'selesai');
			$this->bind('id', $id);
			$this->bind('user', $usr);
			$this->eksekusi();
			return $this->semuaData($usr);
			
	}
	
	//Menambah daftar
	public function tambah($list, $usr){
			$this->query("INSERT INTO todolist SET list=:list, status=:status, user=:user");
			$this->bind('list', $list);
			$this->bind('status', 'menunggu');
			$this->bind('user', $usr);
			$this->eksekusi();
			return $this->semuaData($usr);
	}
	
	//Menghapus daftar
	public function hapus($list, $usr){
			$this->query("DELETE FROM todolist WHERE list=:list and user=:user");
			$this->bind('list', $list);
			$this->bind('user', $usr);
			$this->eksekusi();
			return $this->semuaData($usr);
			
	}
	
	//Login
	public function login($usr, $pas){
			$this->query("SELECT * FROM data_user WHERE username=:user");
			$this->bind('user', $usr);
			foreach($this->fetch() as $cek){
				$cekU = $cek['username'];
				$cekP = $cek['password'];
			
			}
			
			if($cekU == $usr && $cekP == $pas){
				$_SESSION['user'] = $usr;
				return $this->semuaData($usr);
			
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
			echo $dp->selesai($_SESSION['user']);
				break;
		
		case 'menunggu':
			echo $dp->menunggu($_SESSION['user']);
				break;
				
		case 'selesaikan':
				echo $dp->selesaikan($_GET['id'], $_SESSION['user']);
				break;
				
		case 'tambah':
				echo $dp->tambah($_POST['list'], $_SESSION['user']);
				break;
				
		case 'hapus':
				echo $dp->hapus($_GET['id'], $_SESSION['user']);
				break;
				
		case 'keluar':
				session_unset();
				session_destroy();
				header('location:/');
				break;
		
		default:
		
			if($_POST['cari']){
			
					echo $dp->cari($_POST['cari'], $_SESSION['user']);
			}else{
					echo $dp->semuaData($_SESSION['user']);
					
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
