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

</span>
</div>
<a href="/?pilih=selesai" >Selesai</a>
<br>
<a href="/?pilih=menunggu" >Menunggu</a>
<br>
<a href="/" >Semua</a>
<br>

<form method="post" action="/">
<input placeholder="input" name="cari" >
<button type="submit">cari</button>
</from>
<br>
<br>



<?php 
foreach($data as $da){

echo '
<div id="list">

<span>
'.$da['list'].'
</span>
<span class="tambah">
'.$da['status'].'
</span>

</div>';
}
?>
