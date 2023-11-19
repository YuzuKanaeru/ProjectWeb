<?php
include '../koneksi/koneksi.php';
session_start();

if (isset($_SESSION['nama_lengkap'])) {
    header("Location: dashboard.php");
    exit();
}

if (isset($_POST['submit'])) {
    $nis_nip = mysqli_real_escape_string($koneksi, $_POST['nis_nip']);
    $pass = $_POST['pass'];

    // Buat kueri SQL menggunakan prepared statement
    $sql = "SELECT * FROM tb_akun WHERE nis_nip = ? AND pass = ?";
    $stmt = mysqli_prepare($koneksi, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ss", $nis_nip, $pass);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($result->num_rows > 0) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['nis_nip'] = $row['nis_nip'];
            $_SESSION['nama_lengkap'] = $row['nama_lengkap'];
            $_SESSION['id_posisi'] = $row['id_posisi'];
            $_SESSION['status'] = $row['status'];
            $_SESSION['pass'] = $row['pass'];
            header("Location: dashboard.php");
            exit();
        } else {
            $login_salah = "NIS/NIP atau kata sandi Anda salah. Silakan coba lagi!";
        }

        mysqli_stmt_close($stmt);
    }
}
?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Login</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet"> 
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="../ASET/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="../ASET/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../ASET/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="../ASET/css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid position-relative bg-white  d-flex p-0">



        <!-- Sign In Start -->
        <div class="container-fluid">
            <div class="row h-100 bg-dark align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <div class="bg-secondary rounded p-4 p-sm-5 my-4 mx-3">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <a href="#" class="">
                                <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>Si-Vosis</h3>
                            </a>
                            <!-- <h3></h3> -->
                        </div>
                        <form action="" method="POST">
                        <div class="form-floating mb-3">
                            <input type="text" name="nis_nip" class="form-control" id="nis" placeholder="Masukkan nis atau nip">
                            <label for="floatingInput">Nis atau Nip</label>
                        </div>
                        <div class="form-floating mb-4">
                            <input type="password" name="pass" class="form-control" id="pass" placeholder="Masukkan Password">
                            <label for="floatingPassword">Password</label>
                        </div>
                        <?php if (isset($login_salah)):?>
                    <h6 class="text-info"><?php echo $login_salah ?></h6>
                  
                  <?php endif; ?>
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <!-- <div class="form-check">
                                <input type="checkbox" value="" checked class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Check me out</label>
                            </div> -->
                            <!-- <a href="#">Forgot Password</a> -->
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary py-3 w-100 mb-4">Login</button>
                        </form>
                        <p class="text-center mb-0">Belum mempunyai akun? <a href="regis.php">Register</a></p>
                    </div>
                    
                </div>
               
            </div>
        </div>
        <!-- Sign In End -->
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../ASET/lib/chart/chart.min.js"></script>
    <script src="../ASET/lib/easing/easing.min.js"></script>
    <script src="../ASET/lib/waypoints/waypoints.min.js"></script>
    <script src="../ASET/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="../ASET/lib/tempusdominus/js/moment.min.js"></script>
    <script src="../ASET/lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="../ASET/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="../ASET/js/main.js"></script>
</body>

</html>