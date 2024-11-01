<?php
require_once "function.php";
if(isset($_GET['id_menu'])){
       $id = $_GET['id_menu'];
       if(hapus_menu($id) > 0){
              echo "<script>alert('data berhasil dihapus')</script>";
              echo "<script>window.location.href='daftar_menu.php'</script>";
       } else{
              echo "<script>alert('data gagal dihapus)'</script>";
       }
}


?>