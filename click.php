<?php
require_once("function.php");

if (isset($_GET['id_menu'])) {
       $idMenu = $_GET['id_menu'];


    


       // Check if the id_menu already exists in detail_pemesanan
       $queryCheck = "SELECT id_menu FROM detail_pemesanan WHERE id_menu = $idMenu";
       $resultCheck = mysqli_query($koneksi, $queryCheck);

       if (mysqli_num_rows($resultCheck) == 0) { // If id_menu does not exist, proceed with insertion
              $add = "INSERT INTO detail_pemesanan (id_menu) VALUES ($idMenu)";
              mysqli_query($koneksi, $add);

              $addResult = mysqli_affected_rows($koneksi);

              if ($addResult < 1) {
                     echo '<script>
                setTimeout(() => {
                    alert("Gagal dibeli, Ada kesalahan.");
                    window.location.href = "daftar_menu_pembeli.php";
                }, 3000);
              </script>';
              }
       } else {
              echo '<script>
            alert("Gagal dibeli, Menu sudah ada di detail pemesanan.");
            window.location.href = "daftar_menu_pembeli.php";
          </script>';
       }

       // mengambil data baru yang ada di detail_pemesanan
       $pemesanan = query("SELECT * FROM detail_pemesanan")[0];


       // mengambil "jumlah" terbesar
       $maxJumlah = "SELECT max(jumlah) as max_jumlah FROM detail_pemesanan WHERE id_menu = $idMenu";
       $sql = mysqli_query($koneksi, $maxJumlah);
       $result = mysqli_fetch_assoc($sql);

       // Ambil jumlah terbesar
       $jumlah = intval($result['max_jumlah']);

       // Tambahkan jumlah (increment)
       $jumlah++;

       // query menambahkan jumlah yang baru
       $tambahJumlah = "UPDATE detail_pemesanan SET jumlah = $jumlah WHERE id_menu = $idMenu";
       mysqli_query($koneksi, $tambahJumlah);

       $terpengaruh = mysqli_affected_rows($koneksi);




       // terpengaruh lebih dari 0 yang dimana misalkan 1 akan menginformasikan bahwa query yang dijalankan tadi berhasil
       if ($terpengaruh > 0) {
              // redirect, parameter ?status=success nanti akan di tangkap lagi oleh sweetalert()
              header("location: daftar_menu_pembeli.php?status=1&jumlah=$jumlah");
              exit();
       } else {
              echo '<script>
                     setTimeout(() => {
                            alert("Gagal dibeli, Ada kesalahan!.");
                     }, 3000)
                     
                     window.location.href = "daftar_menu_pembeli.php";
                     </script>
                     
                     ';
       }
}
