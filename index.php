<?php

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

class Data extends Database{
	
	//Menampilkan semua
	public function semuaData(){
			$this->query('SELECT * FROM dataPegawai');
			return $this->tampilkan($this->eksekusi());
	
	}
	
	//Menampilkan dari umur termuda
	public function termuda(){
			$this->query('SELECT * FROM dataPegawai ORDER BY umur ASC');
			return $this->tampilkan($this->eksekusi());
	
	}
	
	//Menampilkan dari yang tua
	public function tertua(){
			$this->query('SELECT * FROM dataPegawai ORDER BY umur DESC');
			return $this->tampilkan($this->eksekusi());
	
	}
	
	//Menampilkan berdasarkan pencarian
	public function cari($cari){
			$this->query("SELECT * FROM dataPegawai WHERE=$cari");
			return $this->tampilkan($this->eksekusi());
	
	}
}




$dp = new Data;
switch($_GET['pilih']){
	case 'termuda':
		echo $dp->termuda();
			break;
	
	case 'tertua':
		echo $dp->tertua();
			break;
	
	default:
		if($_POST['cari']){
		
				echo $dp->cari($_POST['cari']);
		}else{
				echo $dp->semuaData();
		}
			break;			

}



?>

<br>
<a href="/?pilih=termuda" >Termuda</a>
<br>
<a href="/?pilih=tertua" >Tetua</a>

<form method="post" action="/">
<input placeholder="input" name="cari" >
<button type="submit">cari</button>
</from>
