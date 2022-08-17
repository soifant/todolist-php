<!DOCTYPE html>
<html>
<head>
<meta content='width=device-width, initial-scale=1' name='viewport'/>
<title>Aplikasi web sederhana ToDolist PHP</title>
<style type="text/css">
#header{
	border:1px solid #000;
	padding:10px;
	background:black;
	color:white;
	margin-bottom:10px;
}

.tambah{
	float:right;
}

#list{
	border:1px solid gray;
	padding:5px;
}
</style>
</head>
<body>

<div id="header">
<span class="nama">
Todolist
</span>

<a href="#" onclick="tambah()">
<span class="tambah">
Tambah
</span></a>

</div>

<?php echo "<br>Halo ". $_SESSION['user']; ?>

<br>
<br>
<div id="tambah" style="display:none;">
<form action="/?url=home/tambah" method="post" >
<input name="list" placeholder="List name" required="required">
<button type="submit">Tambah</button>
</form>
</div>

<a href="/?url=home/selesai">Selesai</a>
<br>
<a href="/?url=home/menunggu" >Menunggu</a>
<br>
<a href="/" >Semua</a>
<br>
<a href="/?url=user/keluar" >Keluar</a>
<br>


<form method="post" action="/?url=home/cari">
<input placeholder="input" name="cari" >
<button type="submit">cari</button>
</form>
<br>
<br>

<?php 
foreach($data['data'] as $da){

echo '
<div id="list">

<span>
'.$da['list'].'
</span>
<span class="tambah">
';

if($da['status'] == 'menunggu'){
	echo '<a href="/?url=home/selesaikan/'.$da['list'].'"> Selesaikan</a>';
}else{
	echo $da['status'];
}

echo '
<a href="/?url=home/hapus/'.$da['list'].'"> Hapus</a>

</span>

</div>';
}
?>

<script type="text/javascript">
function tambah(){
	document.getElementById('tambah').style.display = 'block';
}
</script>
</body>
</html>
