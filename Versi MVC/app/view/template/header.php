<!DOCTYPE html>
<html>
<head>
<meta content='width=device-width, initial-scale=1' name='viewport'/>
<title>Aplikasi web sederhana ToDolist PHP</title>
<link rel="stylesheet" href="http://iamcode.42web.io/public/css/style.css" type="text/css">
</head>
<body>

<div id="header">
<span class="nama">
<b>
Todolist
</b>
</span>

<a href="#" onclick="tambah()">
<span class="tambah">
Tambah
</span></a>

</div>

<?php echo "<br>Halo ". $_SESSION['user']; ?>

<br>
<br>
