<?php
session_start();

$id_menu = $_GET["id_menu"];

unset($_SESSION["pesanan"][$id_menu]);

echo "<script>alert('produk telah dihapus di pesanan anda')</script>";

echo "<script>location= 'daftar_menu_pembeli.php'</script>";
 ?>