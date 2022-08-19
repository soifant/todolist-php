<div class="container">

<div class="row border border-dark shadow-sm rounded m-1 mb-5 fs-3">
<i class="fa fa-user-circle col-9 p-2"><?= $_SESSION['user']; ?></i>

<div class="col-2 pt-1 fs-4">
<div class="row">
<a href="#" class="text-decoration-none col-6" data-bs-toggle="modal" data-bs-target="#keluar">
<i class="fa fa-plus-square success">List</i>
</a>

</div>
</div>
<!---->
</div>

<div class="modal fade" id="keluar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambahkan list</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       <form method="post"	action="/?url=home/tambah">
       <div class="input-group">
       <input type="text" class="form-control" name="list" placeholder="Nama list" aria-label="Tambah data" aria-describedby="button-addon2">
       <button class="btn btn-outline-secondary btn-success black" type="submit" id="button-addon2">Tambah</button>
       
       </div>
       </form></div>
    </div>
  </div>
</div>


<div class="fs-4">
<i class="fa fa-list-alt">
Daftar list anda
</i>
</div>

<?php 
if(!empty($data['data'])){
foreach($data['data'] as $da){
?>
<div class="row bg-light p-1 m-1 border border-dark rounded">
  <div class="col-7 pt-1">
  <span class="fs-6 text-dark txt-r">
  <div class="dropdown">
  <a class="text-decoration-none black" data-bs-toggle="dropdown">
  <i class="fa fa-ellipsis-v">
  </i>
  </a><?= $da['list']; ?>
  <ul class="dropdown-menu">
  <li><a data-bs-toggle="modal" data-bs-target="#<?= $da['list']; ?>" class="dropdown-item" href="/">Edit</a></li>
  <li><a class="dropdown-item" href="?url=home/hapus/<?= $da['list']; ?>">Hapus</a></li>
   </ul>
  </div>
  
  <div class="modal fade" id="<?= $da['list']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">
  <div class="modal-header">
  <h5 class="modal-title" id="exampleModalLabel">Edit list</h5>
  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
  </div>
  <div class="modal-body">
  <form method="post"	action="/?url=home/edit">
  <div class="input-group">
  <input type="text" class="form-control" name="id" type="hidden" value="<?= $da['id']; ?>" aria-label="Edit data" aria-describedby="button-addon2">
  <input type="text" class="form-control" name="list" placeholder="Nama list" value="<?= $da['list']; ?>" aria-label="Edit data" aria-describedby="button-addon2">
  <button class="btn btn-outline-secondary btn-success black" type="submit" id="button-addon2">Edit</button>
  
  </div>
  </form></div>
  </div>
  </div>
  </div>
  
  
  </span>
  </div>
  <div class="col-5 txt-l">
  
  <?php if($da['status'] == 'menunggu'){ ?>
    <a class="text-decoration-none black" href="?url=home/selesaikan/<?= $da['list']; ?>">
    <i class="fa fa-square-o fs-2 p-1"></i>
      </a>
      <?php }else{ ?>
      <i class="fa fa-check-square-o pt-1 fs-2 success"></i>
      <?php }; ?>
    
    
    </div>
    </div>
    <?php } }else { ?>
 

 <div class="container">
 <div class="row p-5 fs-3">
 <center>Tidak ada artikel</center>
</div>
</div>

<?php }; ?>
</div>
</body>
</html>
