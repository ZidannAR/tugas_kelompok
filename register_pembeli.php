<?php
require('function.php');
if(isset($_POST['simpan'])){
  if(register_user($_POST) > 0){}
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Halaman Registrasi</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f9;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    .register-container {
      background: #fff;
      padding: 20px 30px;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      width: 400px;
    }
    .register-container h2 {
      text-align: center;
      margin-bottom: 20px;
    }
    .form-group {
      margin-bottom: 15px;
    }
    .form-group label {
      display: block;
      margin-bottom: 5px;
      font-weight: bold;
    }
    .form-group input, .form-group select {
      width: 100%;
      padding: 10px;
      font-size: 14px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }
    .form-group input:focus, .form-group select:focus {
      outline: none;
      border-color: #007bff;
    }
    .form-group .gender {
      display: flex;
      gap: 10px;
    }
    .form-group .gender label {
      font-weight: normal;
    }
    .btn-submit {
      width: 100%;
      padding: 10px;
      background-color: #007bff;
      color: white;
      border: none;
      border-radius: 5px;
      font-size: 16px;
      cursor: pointer;
    }
    .btn-submit:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body>
  <div class="register-container">
    <h2>Form Registrasi</h2>
    <form method="post" action="">
      <div class="form-group">
        <label for="fullname">Nama Lengkap</label>
        <input type="text" id="fullname" name="nama_lengkap" placeholder="Masukkan nama lengkap" required>
      </div>
      <div class="form-group">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" placeholder="Masukkan username" required>
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Masukkan password" required>
      </div>
      <div class="form-group">
        <label for="address">Alamat</label>
        <input type="text" id="address" name="alamat" placeholder="Masukkan alamat" required>
      </div>
      <div class="form-group">
        <label>Jenis Kelamin</label>
        <div class="gender">
          <label><input type="radio" name="jenis_kelamin" value="laki-laki" required> Laki-laki</label>
          <label><input type="radio" name="jenis_kelamin" value="perempuan"> Perempuan</label>
        </div>
      </div>
      <div class="form-group">
        <label for="phone">No. HP</label>
        <input type="tel" id="hp" name="hp" placeholder="Masukkan nomor HP" required>
      </div>
      <button type="submit" name="simpan" class="btn-submit">Daftar</button>
    </form>
  </div>
</body>
</html>
