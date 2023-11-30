<?php
// ref koneksi/koneksi
include '../koneksi/koneksi.php';
session_start();
 
if (!isset($_SESSION['nama_lengkap'])) {
    header("Location: login.php");
    exit();
}

if (isset($_POST['nis_nip'])) {
  $user = $_POST['nama_lengkap'];
  $email = $_POST['jenis_kelamin'];
  $pass = $_POST['id_posisi']; 
  $cpass = $_POST['status'];
  $kodelv = $_POST['pass'];

  if ($pass == $cpass) {
      $sql = "SELECT * FROM akun WHERE nis_nip='$nis_nip'";
      $result = mysqli_query($koneksi, $sql);

      if (!$result->num_rows > 0) {
          // Hapus nilai 'tgl' dari pernyataan INSERT karena tgl sudah diatur dalam form HTML
          $sql = "INSERT INTO `akun` (`nis_nip`, `nama_lengkap`, `jenis_kelamin`, `id_posisi`, `status`,`pass`) VALUES
                   ('$user', '', '$pass', '$email', '','$kodelv', '$tgl')";
          $result = mysqli_query($koneksi, $sql);

          if ($result) {
            header("Location: login.php");
            exit();
          } else {
              echo "<script>alert('Woops! Terjadi kesalahan.')</script>";
          }
      } else {
          echo "<script>alert('Woops! Email Sudah Terdaftar.')</script>";
      }
  } else {
      echo "<script>alert('Password Tidak Sesuai')</script>";
  }
}


?>



<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Register</title>
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<meta content name="keywords">
<meta content name="description">

<link href="img/favicon.ico" rel="icon">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet">

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

<link href="../aset/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
<link href="../aset/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

<link href="../aset/css/bootstrap.min.css" rel="stylesheet">

<link href="../aset/css/style.css" rel="stylesheet">
</head>
<body>
<div class="container-fluid position-relative d-flex p-0">

<!-- <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
<div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
<span class="sr-only">Loading...</span>
</div>

</div> -->


<div class="container-fluid">
<div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
<div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
<div class="bg-secondary rounded p-4 p-sm-5 my-4 mx-3">
<div class="d-flex align-items-center justify-content-between mb-3">
<a href="#" class>
<h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>Si - Sela</h3>
</a>
<h3>Sign Up</h3>
</div>

<form action="" method="POST">
<div class="form-floating mb-3">
<input type="text" name="user" class="form-control" id="user" placeholder="jhondoe" required>
<label for="">Username</label>
</div>


<div class="form-floating mb-3">
<input type="email" name="email" class="form-control" id="email" placeholder="name@example.com" required>
<label for="">Email address</label>
</div>


<div class="form-floating mb-4">
<input type="password" name="pass" class="form-control" id="pass" placeholder="Password" required>
<label for="">Password</label>
</div>

<div class="form-floating mb-4">
<input type="password" name="cpass" class="form-control" id="cpass" placeholder="Konfirmasi Password" required>
<label for="">Konfirmasi Password</label>
</div>

<input type="number" name="kodelv" value="2" hidden id="kode_lv">

<input type="date" name="tgl" id="tgl" value="<?php echo date('Y-m-d'); ?>" hidden>


<div class="d-flex align-items-center justify-content-between mb-4">
<div class="form-check">
<input type="checkbox" class="form-check-input" id="exampleCheck1">
<label class="form-check-label" for="exampleCheck1">Check me out</label>
</div>
<a href>Forgot Password</a>
</div>

<button type="submit" name="submit" class="btn btn-primary py-3 w-100 mb-4">Sign Up</button>
</form>
<p class="text-center mb-0">Already have an Account? <a href="login.php">Sign In</a></p>
</div>
</div>
</div>
</div>

</div>

</form>

<script src="https://code.jquery.com/jquery-3.4.1.min.js" type="224a743898cd39c0fb817f05-text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" type="224a743898cd39c0fb817f05-text/javascript"></script>
<script src="../aset/lib/chart/chart.min.js" type="224a743898cd39c0fb817f05-text/javascript"></script>
<script src="../aset/lib/easing/easing.min.js" type="224a743898cd39c0fb817f05-text/javascript"></script>
<script src="../aset/lib/waypoints/waypoints.min.js" type="224a743898cd39c0fb817f05-text/javascript"></script>
<script src="../aset/lib/owlcarousel/owl.carousel.min.js" type="224a743898cd39c0fb817f05-text/javascript"></script>
<script src="../aset/lib/tempusdominus/js/moment.min.js" type="224a743898cd39c0fb817f05-text/javascript"></script>
<script src="../aset/lib/tempusdominus/js/moment-timezone.min.js" type="224a743898cd39c0fb817f05-text/javascript"></script>
<script src="../aset/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js" type="224a743898cd39c0fb817f05-text/javascript"></script>

<!-- <script src="../ASET/js/main.js" type="224a743898cd39c0fb817f05-text/javascript"></script> -->

</html>