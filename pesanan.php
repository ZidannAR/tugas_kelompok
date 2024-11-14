<?php include('./template/header.php');
require_once('function.php');

if(isset($_GET['id_menu'])){
  $id = $_GET['id_menu'];
  $data = query("SELECT * FROM produk WHERE id_menu = $id")[0];

  
}
 ?>
 

  <!-- Menu -->
    <div class="container">
      <div class="judul-pesanan mt-5\">
       
        <h3 class="text-center font-weight-bold">DATA PESANAN</h3>
        
      </div>
      <table class="table table-bordered" id="example">
        <thead class="thead-light">
          <tr>
            <th scope="col">ID</th>
            <th scope="col">No. Meja</th>
            <th scope="col">Nama Pesanan</th>
            <th scope="col">Jumlah</th>
            <th scope="col">Tanggal</th>
            <th scope="col">Status</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>01</td>
            <td><?= $data ['nama_menu']?></td>
            <td>2</td>
            <td>2020-01-03</td>
            <td>Belum Bayar</td>
            <td>
              <a href="#" class="badge badge-danger">Hapus Data</a>
            </td>
          </tr>
          <tr>
            <th scope="row">2</th>
            <td>10</td>
            <td>Nasi Goreng</td>
            <td>2</td>
            <td>2020-04-20</td>
            <td>Belum Bayar</td>
            <td>
              <a href="#" class="badge badge-danger">Hapus Data</a>
            </td>
          </tr>
          <tr>
            <th scope="row">3</th>
            <td>06</td>
            <td>Jus Mangga</td>
            <td>6</td>
            <td>2020-02-15</td>
            <td>Belum Bayar</td>
            <td>
              <a href="#" class="badge badge-danger">Hapus Data</a>
            </td>
          </tr>
          <tr>
            <th scope="row">4</th>
            <td>02</td>
            <td>Teh Obeng</td>
            <td>3</td>
            <td>2020-02-24</td>
            <td>Belum Bayar</td>
            <td>
              <a href="#" class="badge badge-danger">Hapus Data</a>
            </td>
          </tr>
          <tr>
            <th scope="row">5</th>
            <td>07</td>
            <td>Nasi Goreng</td>
            <td>2</td>
            <td>2020-05-15</td>
            <td>Belum Bayar</td>
            <td>
              <a href="#" class="badge badge-danger">Hapus Data</a>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  <!-- Akhir Menu -->
  <?php include('./template/footer.php'); ?>