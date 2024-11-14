<?php
require_once('koneksi.php');

function query($query)
{
       global $koneksi;
       $result = mysqli_query($koneksi, $query);
       $rows = [];
       while ($row = mysqli_fetch_assoc($result)) {
              $rows[] = $row;
       }
       return $rows;
}

function tambah_menu($data)
{
       global $koneksi;

       $kode = htmlspecialchars($data['id_menu']);
       $nama = htmlspecialchars($data['nama_menu']);
       $jenis = htmlspecialchars($data['jenis_menu']);
       $stok = htmlspecialchars($data['stok']);
       $harga = htmlspecialchars($data['harga']);
       $gambar = upload();

       if (!$gambar) {
              return false;
       }

       // Corrected INSERT query
       $kirim = mysqli_query($koneksi, "INSERT INTO produk (nama_menu, jenis_menu, stok, harga, gambar) VALUES ('$nama', '$jenis', '$stok', '$harga', '$gambar')");
       if ($kirim) {
              header("location: daftar_menu.php");
       }
       return mysqli_affected_rows($koneksi);
}

function upload()
{
       $namafile = $_FILES['gambar']['name'];
       $ukuranfile = $_FILES['gambar']['size'];
       $error = $_FILES['gambar']['error'];
       $tmpName = $_FILES['gambar']['tmp_name'];

       if ($error === 4) {
              echo "<script>alert('pilih gambar terlebih dahulu')</script>";
              return false;
       }

       $ekstensiGambarValid = ['jpg', 'jpeg', 'png', 'gif'];
       $ekstensiGambar = explode('.', $namafile);
       $ekstensiGambar = strtolower(end($ekstensiGambar));

       if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
              echo "<script>alert('file yang diupload harus gambar')</script>";
              return false;
       }

       if ($ukuranfile > 1000000) {
              echo "<script>alert('file kebesaran bosku')</script>";
              return false;
       }

       $namafileBaru = uniqid() . '.' . $ekstensiGambar;

       if (!move_uploaded_file($tmpName, "./upload/" . $namafileBaru)) {
              echo "<script>alert('gagal mengupload gambar')</script>";
              return false;
       }

       return $namafileBaru;
}
function edit_menu($data)
{
       global $koneksi;

       $id = ($data['id_menu']);
       $nama = htmlspecialchars($data['nama_menu']);
       $stok = ($data['stok']);
       $harga = ($data['harga']);

       $gambarLama = htmlspecialchars($data['gambarLama']);
       if ($_FILES['gambar']['error'] === 4) {
              $gambar = $gambarLama;
       } else {
              $gambar = upload();
       }
       mysqli_query($koneksi, "UPDATE produk SET 
       nama_menu = '$nama',
       stok = $stok ,
       harga= $harga,
       gambar = '$gambar'

       WHERE id_menu= $id ");


       return mysqli_affected_rows($koneksi);
}

function hapus_menu($id)
{
       global $koneksi;

       $query = "DELETE FROM produk WHERE id_menu = $id";

       mysqli_query($koneksi, $query);
       return mysqli_affected_rows($koneksi);


}
function register_admin($data)
{
       global $koneksi;

       $kode = htmlspecialchars($data['id_user']);
       $nama_lengkap = htmlspecialchars($data['nama_lengkap']);
       $jenis_kelamin = htmlspecialchars($data['jenis_kelamin']);
       $tanggal_lahir = date($data['tanggal_lahir']);
       $alamat = htmlspecialchars($data['alamat']);
       $no_hp = htmlspecialchars($data['hp']);
       $username = htmlspecialchars($data['username']);
       $password = htmlspecialchars($data['password']);


       // Corrected INSERT query
       $kirim = mysqli_query($koneksi, "INSERT INTO  admin  VALUES ('$nama_lengkap', '$jenis_kelamin', '$alamat', '$no_hp', '$tanggal_lahir','$username','$password')");
       if ($kirim) {
              header("location: login_admin.php");
       }
}