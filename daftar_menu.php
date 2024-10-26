<?php
require 'function.php';
?>

<?php include('./template/header.php'); ?>
  <div class="container">
        <a href="tambah_menu.php" class="btn btn-success mt-3">TAMBAH DAFTAR MENU</a>
        <div class="row">


    <?php
    $no = 1;
    $menu = query("SELECT * FROM produk");
    foreach ($menu as $asoy) : 
     ?>
  <!-- Menu -->
          <div class="col-md-3">
            <div class="card border-dark">
              <img src="./upload/<?= $asoy['gambar'] ?>" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title font-weight-bold" ><?= $asoy['nama_menu'] ?> </h5>
               <label class="card-text harga"><strong>Rp.</strong><?=number_format($asoy['harga'])  ?></label><br>
                <a href="#" class="btn btn-primary btn-sm">EDIT</a>
                <a href="#" class="btn btn-danger btn-sm">HAPUS</a>
              </div>
            </div>
          </div>
          <?php endforeach ?>

          
  <!-- Akhir Menu -->

  <!-- Awal Footer -->
  <?php include('./template/footer.php'); ?>