<?php
require ('koneksi.php');

function query($query)
{
       global $koneksi;
       $result = mysqli_query($koneksi,$query);
       $rows = [];
       while ($row = mysqli_fetch_assoc($result)){
              $rows[] = $row; 
       }
       return $rows;
}

function tambah_menu($data)
{
    global $koneksi;

    // Ambil dan sanitasi input
    $nama = htmlspecialchars($data['nama_menu']);
    $jenis = htmlspecialchars($data['jenis_menu']);
    $stok = htmlspecialchars($data['stok']);
    $harga = htmlspecialchars($data['harga']);
    
    // Pastikan jumlah kolom dan nilai cocok
    // Misalkan tabel produk memiliki kolom: id_menu (auto-increment), nama_menu, jenis_menu, stok, harga
       mysqli_query($koneksi, "INSERT INTO produk (nama_menu, jenis_menu, stok, harga) VALUES ('$nama', '$jenis', '$stok', '$harga')");
    
}

function upload()
{

}
 ?>