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
       $namafile = $_FILES['gambar']['name'];
       $ukuranfile = $_FILES['gambar']['size'];
       $error = $_FILES['gambar']['error'];
       $tmpName = $_FILES['gambar']['tmp_name'];

       if($error === 4){
              echo "<script> alert('pilih gambar terlebih dahulu')</script>";
              return false;
       }

       $ekstensiGambarValid = ['jpg','jpeg','png','gif'];
       $ekstensiGambar = explode('.',$namafile);
       $ekstensiGambar = strtolower( end($ekstensiGambar));

       if (!in_array($ekstensiGambar,$ekstensiGambarValid)){
              
       }
}
 ?>