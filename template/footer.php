<!-- Awal Footer -->
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



<?php
if (isset($_GET['status'])) {
  // inisialisasikan $x dengan parameter status value successini ada pada parameter url
  $x = $_GET['status'];

  // inisialisasikan $i dengan value jumlah yang dimana Jumlah ini ada pada parameter url

  echo "
  <script>
      var x = $x;
      document.addEventListener('DOMContentLoaded', function() {
        if($x == 1){
            Swal.fire({
            title: 'Berhasil',
            text: 'Jumlah terbeli: ',
            icon: 'success'
          });
        }

          // Mengambil URL saat ini
          let url = new URL(window.location);

          // Menghapus semua parameter GET
          url.search = '';

          // Mengganti URL di address bar tanpa me-refresh halaman
          window.history.replaceState({}, document.title, url);
          
      }
    )
      </script>
    ";
}
?>


</body>

</html>