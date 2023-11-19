<?php 
 
if (!isset($_SESSION['nama_lengkap'])) {
    header("Location: login.php");
    exit(); // Terminate script execution after the redirect
}

?>

<?php

$koneksii = new mysqli("localhost", "root", "", "vosis");

// Periksa koneksi
if ($koneksii->connect_error) {
    die("Koneksi gagal: " . $koneksii->connect_error);
}

$id_posisi = $_SESSION['id_posisi'];

// Konversi $id_posisi menjadi string
$id_posisi = (string) $id_posisi;

$sqll = "SELECT jenis_posisi FROM tb_posisi WHERE id_posisi = '$id_posisi'";
$result = mysqli_query($koneksii, $sqll);

if (!$result) {
    die("Query error: " . mysqli_error($koneksii));
}

if ($result->num_rows > 0) {
    $row = mysqli_fetch_assoc($result);
    $jenis_posisi = $row['jenis_posisi'];
} else {
    // Tindakan yang perlu diambil jika tidak ada hasil yang ditemukan
    $jenis_posisi = "Posisi tidak ditemukan";
}


?>

<style>
    .ssr{
        color:#FF007F;
    }
</style>

<div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-secondary navbar-dark">
                <a href="index.html" class="navbar-brand mx-4 mb-3">
                    <h3 class="ssr"><i class="fa fa-user-edit me-2"></i>SI-VOSIS</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h4 class="mb-0">
                            <?php echo $_SESSION['nama_lengkap']; ?>

                        </h4>
                        
                        <span class="ssr">
                        <?php echo $jenis_posisi; ?>
                        
                        </span>
                    </div>
                </div>
                
                <div class="navbar-nav w-100">
                    
                    <hr>
                    <a href="../ADMIN/dashboard.php" class="nav-item nav-link<?= (basename($_SERVER['PHP_SELF']) == 'dashboard.php') ? ' active' : ''; ?>"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>

<hr>
<br>

<!-- Ini menggunakan PHP untuk memeriksa apakah halaman yang sedang aktif adalah 
"pengguna.php" dengan basename($_SERVER['PHP_SELF']) dan jika benar, maka menambahkan kelas "active". -->

                    <a href="../Akun/akun.php" class="nav-item nav-link<?= (basename($_SERVER['PHP_SELF']) == 'akun.php') ? ' active' : ''; ?>"><i class="fa fa-user me-2"></i>Akun</a>
                    <a href="../posisi/posisi.php" class="nav-item nav-link<?= (basename($_SERVER['PHP_SELF']) == 'posisi.php') ? ' active' : ''; ?>"><i class="fa fa-user me-2"></i>Posisi</a>
                    <a href="../ketuaosis/ketuaosis.php" class="nav-item nav-link<?= (basename($_SERVER['PHP_SELF']) == 'ketuaosis.php') ? ' active' : ''; ?>"><i class="fa fa-user me-2"></i>Ketua Osis</a>
                    <a href="../wakilosis/wakilosis.php" class="nav-item nav-link<?= (basename($_SERVER['PHP_SELF']) == 'wakilosis.php') ? ' active' : ''; ?>"><i class="fa fa-user me-2"></i>Wakil Osis</a>
                    <a href="../kandidat/kandidat.php" class="nav-item nav-link<?= (basename($_SERVER['PHP_SELF']) == 'kandidat.php') ? ' active' : ''; ?>"><i class="fa fa-user me-2"></i>Kandidat</a>
                    <a href="../voting/voting.php" class="nav-item nav-link<?= (basename($_SERVER['PHP_SELF']) == 'voting.php') ? ' active' : ''; ?>"><i class="fa fa-keyboard me-2"></i>Voting</a>
                    <!-- <a href="../USER/pengguna.php" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Tables</a>
                    <a href="chart.html" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Charts</a> -->

                    
<hr>
<br>

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Elements</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="button.html" class="dropdown-item">Buttons</a>
                            <a href="typography.html" class="dropdown-item">Typography</a>
                            <a href="element.html" class="dropdown-item">Other Elements</a>
                        </div>
                    </div>




                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>Pages</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="signin.html" class="dropdown-item">Sign In</a>
                            <a href="signup.html" class="dropdown-item">Sign Up</a>
                            <a href="404.html" class="dropdown-item">404 Error</a>
                            <a href="blank.html" class="dropdown-item">Blank Page</a>
                        </div>


                    </div>
                </div>

            </nav>
        </div>