<?php
session_start();

if (!isset($_SESSION['nama_lengkap'])) {
    header("Location: login.php");
    exit(); // Hentikan eksekusi skrip setelah pengalihan
}

ob_start(); // Mulai output buffering
?>

<style>
    .gradient-text {
        font-size: 32px;
        text-align: center;
        background-image: linear-gradient(to left, #ff0000, #00ff00, #0000ff);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
        animation: gradientTransition 5s linear infinite;
    }

    @keyframes gradientTransition {
        0% {
            background-position: 100%;
        }

        100% {
            background-position: 0%;
        }
    }
</style>

<img src="../aset/img/dashboardweb.png" class="card-img-top" alt="..." style="width: 100%; height: auto;"><br><br>

<?php
// Koneksi database
$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'vosis';

// Membuat koneksi
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Inisialisasi variabel jumlahSudahMemilih dan jumlahBelumMemilih
$jumlahSudahMemilih = 0;
$jumlahBelumMemilih = 0;

// Query SQL untuk mendapatkan jumlah yang sudah memilih
$querySudahMemilih = "SELECT COUNT(*) AS jumlah_memilih FROM tb_akun WHERE status = 'Sudah Voting'";
$resultSudahMemilih = $db->query($querySudahMemilih);

if ($resultSudahMemilih->num_rows > 0) {
    $rowSudahMemilih = $resultSudahMemilih->fetch_assoc();
    $jumlahSudahMemilih = $rowSudahMemilih['jumlah_memilih'];
}

// Query SQL untuk mendapatkan jumlah yang belum memilih
$queryBelumMemilih = "SELECT COUNT(*) AS jumlah_belum_memilih FROM tb_akun WHERE status != 'Sudah Voting'";
$resultBelumMemilih = $db->query($queryBelumMemilih);

if ($resultBelumMemilih->num_rows > 0) {
    $rowBelumMemilih = $resultBelumMemilih->fetch_assoc();
    $jumlahBelumMemilih = $rowBelumMemilih['jumlah_belum_memilih'];
}

// Query SQL untuk mendapatkan informasi jumlah voting
$query = "SELECT tb_kandidat.id_kandidat, COUNT(tb_voting.id_kandidat) AS jumlah_voting 
          FROM tb_voting 
          JOIN tb_akun ON tb_voting.nis_nip = tb_akun.nis_nip 
          JOIN tb_kandidat ON tb_voting.id_kandidat = tb_kandidat.id_kandidat 
          GROUP BY tb_kandidat.id_kandidat";
$result = $db->query($query);

// Membuat array untuk menyimpan data dari query SQL
$dataLabels = [];
$dataValues = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $dataLabels[] = $row['id_kandidat'];
        $dataValues[] = $row['jumlah_voting'];
    }
}

// Query SQL untuk mendapatkan informasi nama ketua, nama wakil ketua, dan jumlah voting
$infoQuery = "SELECT tb_kandidat.id_kandidat, tb_ketuaosis.nama_ketua, tb_wakilosis.nama_wakil, COUNT(tb_voting.id_kandidat) AS jumlah_voting
                FROM tb_ketuaosis
                JOIN tb_kandidat ON tb_ketuaosis.id_ketua = tb_kandidat.id_ketua
                LEFT JOIN tb_wakilosis ON tb_kandidat.id_wakil = tb_wakilosis.id_wakil
                LEFT JOIN tb_voting ON tb_kandidat.id_kandidat = tb_voting.id_kandidat
                GROUP BY tb_kandidat.id_kandidat, tb_ketuaosis.nama_ketua, tb_wakilosis.nama_wakil;";

$infoResult = $db->query($infoQuery);
?>

<!-- Div utama yang membungkus kedua card -->
<div class="row">
    <!-- Card Sudah Memilih -->
<div class="col-sm-12 col-xl-6">
    <div class="bg-secondary rounded h-100 p-4" data-toggle="modal" data-target="#modalMemilih">
        <h6 class="mb-4">Sudah Memilih</h6>
        <p>Jumlah Akun yang Sudah Memilih: <?php echo $jumlahSudahMemilih; ?></p>
        <a href="sudahvoting.php" type="button" class="btn btn-info fw-bold text-white mb-4">Lihat Detail</a>
    </div>
</div>

<!-- Card Belum Memilih -->
<div class="col-sm-12 col-xl-6">
    <div class="bg-secondary rounded h-100 p-4" data-toggle="modal" data-target="#modalBelumMemilih">
        <h6 class="mb-4">Belum Memilih</h6>
        <p>Jumlah Akun yang Belum Memilih: <?php echo $jumlahBelumMemilih; ?></p>
        <a href="belumvoting.php" type="button" class="btn btn-info fw-bold text-white mb-4">Lihat Detail</a>
    </div>
</div>
</div>

<?php
$konten = ob_get_clean();

include '../ADMIN/body.php';
?>
