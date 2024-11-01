<?php require_once('function.php');
include_once('./template/header.php');
 ?>

 <?php
 $data = null;

 if (isset($_GET['id_menu'])) {
     $id = $_GET['id_menu'];
 
//      $query = "SELECT * FROM produk WHERE id_menu = $id_menu";
//      $result = mysqli_query($koneksi, $query);
//      $data = mysqli_fetch_assoc($result);

      $data=query("SELECT * FROM produk WHERE id_menu = $id")[0];

 }

 if (isset($_POST['submit'])){
    if(edit_menu($_POST) > 0){
      echo "<script>window.location.href='daftar_menu.php'</script>";
    }else{
      echo 'data gagal';
    }
 }
   
      
  ?>
<div class="container">
    <h3 class="text-center mt-3 mb-5">SILAHKAN EDIT MENU</h3>
    <div class="card p-5 mb-5">
      <form method="POST" action="edit_menu.php" enctype="multipart/form-data">
        <div class="form-group">
          <label for="menu1">Nama Menu</label>
          <input type="hidden" name="id_menu" value="<?= $id ?>">
          <input type="hidden" name="gambarLama" value="<?= $data['gambar'] ?>">
          <input type="text" class="form-control" id="menu1" name="nama_menu" value="<?= $data['nama_menu'] ?>">

        </div>
        <div class="form-group">
         </div>
        <div class="form-group">
          <label for="stok1">Stok</label>
          <input type="text" class="form-control" id="stok1" name="stok" value="<?= $data['stok'] ?>">
        </div>
        <div class="form-group">
          <label for="harga1">Harga Menu</label>
          <input type="text" class="form-control" id="harga1" name="harga" value="<?= $data['harga'] ?>">
        </div>
        <div class="form-group">
          <label for="gambar">Foto Menu</label>
          <img src="./upload/<?= $data['gambar'] ?>" alt="">
          <input type="file" class="form-control-file border" id="gambar" name="gambar" value="<?= $data['gambar'] ?>">
        </div><br>
        <button type="submit" class="btn btn-primary" name="submit">simpan</button>
        <a href="daftar_menu.php" type="reset" class="btn btn-danger" name="reset">kembali</a>
  </div>
  </div>
<?php include_once('./template/footer.php'); ?>