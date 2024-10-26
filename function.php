<?php
require('koneksi.php');

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

    $nama = htmlspecialchars($data['nama_menu']);
    $jenis = htmlspecialchars($data['jenis_menu']);
    $stok = htmlspecialchars($data['stok']);
    $harga = htmlspecialchars($data['harga']);
    $gambar = upload();

    if (!$gambar) {
        return false;
    }
    
    // Corrected INSERT query
    $kirim=mysqli_query($koneksi, "INSERT INTO produk (nama_menu, jenis_menu, stok, harga, gambar) VALUES ('$nama', '$jenis', '$stok', '$harga', '$gambar')");
    if ($kirim){
       header("location: daftar_menu.php");
    }
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
?>
