<?php
require_once('function.php');
require_once('koneksi.php');

?>
<?php
session_start();
if (empty($_SESSION["pesanan"]) or !isset($_SESSION["pesanan"])) {
  echo "<script>alert('pesanan kosong silahkan pesan terlebih dahulu')</script>";
  echo "<script>location= 'daftar_menu_pembeli.php'</script>";
}
?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="index.css">
  <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">

  <title>Bakso Solo Baru</title>
</head>

<body>

  <!-- Jumbotron -->
  <div class="jumbotron jumbotron-fluid text-center">
    <div class="container">
      <h1 class="display-4"><span class="font-weight-bold">Konter Hp Smakzie</span></h1>
      <hr>
      <p class="lead font-weight-bold">Silahkan Pilih Hp Sesuai Keinginan <br>
        Happy Shopping</p>
    </div>
  </div>
  <!-- Akhir Jumbotron -->

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg  bg-dark">
    <div class="container">
      <a class="navbar-brand text-white" href="index.html"><strong>Toko</strong> Hp</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link mr-4" href="index_pembeli.php">HOME</a>
          </li>
          <li class="nav-item">
            <a class="nav-link mr-4" href="daftar_menu_pembeli.php">PRODUK</a>
          </li>
          <li class="nav-item">
            <a class="nav-link mr-4" href="pesanan_pembeli.php">PESANAN</a>
          </li>
          <li class="nav-item">
            <a class="nav-link mr-4" href="#">LOGOUT</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>


  <div class="container">
    <div class="judul-pesanan mt-5">

      <h3 class="text-center font-weight-bold">DATA PESANAN PELANGGAN</h3>

    </div>
    <table class="table table-bordered" id="example">
      <thead class="thead-light">

        <tr>
          <th scope="col">No</th>
          <th scope="col">Nama Pesanan</th>
          <th scope="col">Harga</th>
          <th scope="col">Jumlah</th>
          <th scope="col">Subharga</th>
          <th scope="col">Opsi</th>
        </tr>
      </thead>
      <tbody>
        <?php $no = 1; ?>
        <?php $totalbelanja = 0; ?>
        <?php foreach ($_SESSION["pesanan"] as $id_menu => $jumlah) : ?>

          <?php
          require_once("koneksi.php");
          $ambil = mysqli_query($koneksi, "SELECT * FROM produk WHERE id_menu='$id_menu'");
          $pecah = $ambil->fetch_assoc();
          $subharga = $pecah["harga"] * $jumlah;
          ?>

          <!-- Menu -->
          <tr>
            <td>
              <?= $no++; ?>
            </td>
            <td>
              <?= $pecah["nama_menu"]; ?>
            </td>
            <td>Rp. <?php echo number_format($pecah["harga"]);  ?>
            </td>
            <td>
              <?= $jumlah; ?>
            </td>
            <td>Rp.
              <?= number_format($subharga)  ?>
            </td>
            <?php $totalbelanja += $subharga; ?>
            <td>
              <a href="hapus_pesanan_pembeli.php?id_menu=<?php echo $id_menu ?>" class="badge badge-danger">Hapus</a>
            </td>
          </tr>
        <?php
        endforeach;
        ?>
      </tbody>
      <tfoot>
        <tr>
          <th colspan="6">Total Bayar : Rp. <?php echo number_format($totalbelanja) ?></th>
        </tr>
      </tfoot>
    </table><br>

    <form method="POST" action="">
      <a href="menu_pembeli.php" class="btn btn-primary btn-sm">Lihat Menu</a>
      <button class="btn btn-success btn-sm" name="konfirm">Konfirmasi Pesanan</button>
    </form>

    <?php
    if (isset($_POST["konfirm"])) {
      $tanggal_pemesanan = date("Y-m-d");

      $idMenu = $pecah['id_menu'];

      $insert = mysqli_query($koneksi, "INSERT INTO pemesanan (id_menu, tanggal_pemesanan, total_belanja) VALUES ($idMenu, '$tanggal_pemesanan','$totalbelanja')");

      $id_terbaru = $koneksi->insert_id;


      foreach ($_SESSION["pesanan"] as  $id_menu => $jumlah) {
        $insert = mysqli_query($koneksi, "INSERT INTO detail_pemesanan(id_pemesanan, id_menu, jumlah) 
          VALUES ('$id_terbaru', '$id_menu','$jumlah') ");
      }

      unset($_SESSION["pesanan"]);

      echo "<script>alert('pesanan anda telah di konfirmasi')</script>";
      echo "<script>location= daftar_menu_pembeli.php</script>";
    }
    ?>

    <hr class="footer">
    <div class="container">
      <div class="row footer-body">
        <div class="col-md-6">
          <div class="copyright">
            <strong>Copyright</strong> <i class="far fa-copyright"></i> Zidan</p>
          </div>
        </div>

        <div class="col-md-6 d-flex justify-content-end">
          <div class="icon-contact">
            <label class="font-weight-bold">Follow Us </label>
            <a href="#"><img src="images/icon/fb.png" class="mr-3 ml-4" data-toggle="tooltip" title="Facebook"></a>
            <a href="#"><img src="images/icon/ig.png" class="mr-3" data-toggle="tooltip" title="Instagram"></a>
            <a href="#"><img src="images/icon/twitter.png" class="" data-toggle="tooltip" title="Twitter"></a>
          </div>
        </div>
      </div>
    </div>
    <!-- Akhir Footer -->


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.js"></script>
</body>

</html>