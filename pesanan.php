<?php
include('./template/header.php');
require_once('koneksi.php');
require_once('function.php');

$no = 1; // Counter untuk nomor pesanan
$totalbelanja = 0; // Inisialisasi total belanja

// Ambil semua data pesanan
$data = query("
  SELECT m.id_menu, m.nama_menu, m.harga, dp.jumlah, p.tanggal_pemesanan 
  FROM produk m 
  JOIN detail_pemesanan dp ON m.id_menu = dp.id_menu 
  JOIN pemesanan p ON dp.id_pemesanan = p.id_pemesanan
");

?>

<!-- Menu -->
<div class="container">
  <div class="judul-pesanan mt-5">
    <h3 class="text-center font-weight-bold">DATA PESANAN</h3>
  </div>
  <table class="table table-bordered" id="example">
    <thead class="thead-light">
      <tr>
        <th scope="col">No</th>
        <th scope="col">ID Menu</th>
        <th scope="col">Nama Pesanan</th>
        <th scope="col">Harga Satuan</th>
        <th scope="col">Jumlah</th>
        <th scope="col">Subtotal</th>
        <th scope="col">Tanggal</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php if ($data): ?>
        <?php foreach ($data as $menu): 
          $subharga = $menu['harga'] * $menu['jumlah']; // Hitung subtotal
          $totalbelanja += $subharga; // Tambahkan ke total belanja
        ?>
          <tr>
            <td><?= $no++; ?></td>
            <td><?= $menu['id_menu']; ?></td>
            <td><?= $menu['nama_menu']; ?></td>
            <td>Rp. <?= number_format($menu['harga'], 0, ',', '.'); ?></td>
            <td><?= $menu['jumlah']; ?></td>
            <td>Rp. <?= number_format($subharga, 0, ',', '.'); ?></td>
            <td><?= $menu['tanggal_pemesanan']; ?></td>
            <td>
              <a href="hapus.php?id=<?= $menu['id_menu']; ?>" class="badge badge-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus Data</a>
            </td>
          </tr>
        <?php endforeach; ?>
        <tr>
          <td colspan="5" class="text-right font-weight-bold">Total Bayar:</td>
          <td>Rp. <?= number_format($totalbelanja, 0, ',', '.'); ?></td>
          <td colspan="2"></td>
        </tr>
      <?php else: ?>
        <tr>
          <td colspan="8" class="text-center">Produk tidak ditemukan.</td>
        </tr>
      <?php endif; ?>
    </tbody>
  </table>
</div>
<!-- Akhir Menu -->

<?php include('./template/footer.php'); ?>
