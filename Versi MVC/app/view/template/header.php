<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<style type="text/css">

.txt-l{text-align:right;}
.txt-r{text-align:left;}

/*Warna*/
.black{
	color:#000;
}
.success{
	color:green;
}
.danger{
	color:red;
}

</style>
</head>
<body>

<nav class="navbar navbar-expand-sm navbar-dark bg-dark mb-5">
  <div class="container-fluid">
    <a class="navbar-brand" href="javascript:void(0)">TodoList</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="mynavbar">
      <ul class="navbar-nav me-auto">
      
        <li class="nav-item">
          <a class="nav-link" href="/?url=home/selesai">Selesai</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/?url=home/menunggu">Menunggu</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/">Semua</a>
        </li>
        <li class="nav-item">
       <a class="nav-link" href="/?url=user/keluar">Keluar</a>
        </li>
      </ul>
      <form action="/?url=home/cari" method="post" class="input-group">
        <input class="form-control me-2" type="text" name="cari" placeholder="Search">
        <button class="btn btn-primary" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
