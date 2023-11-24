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

<!-- <div class="text-center">
    <img src="https://i.giphy.com/media/QmH8OnsBQvC4yn8BnX/giphy.webp" width="300" height="300">
</div> -->

<!-- <h1 class="text-center mb-5 text-white">DASHBOARD</h1> -->

<!-- <marquee><h1 class="gradient-text text-center mb-5 mt-5">ALOOOOOOOOOOO :)</h1></marquee> -->
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
    <!-- Card baru -->
    <div class="col-sm-12 col-xl-6">
        <div class="bg-secondary rounded h-100 p-4" data-toggle="modal" data-target="#modalMemilih">
            <h6 class="mb-4">Sudah Memilih</h6>
            <p>Jumlah Akun yang Sudah Memilih: <?php echo $jumlahSudahMemilih; ?></p>
            <!-- Ganti "isi tabel disini" sesuai dengan data yang ingin ditampilkan -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalMemilihTable">
                Tampilkan Tabel
            </button>
        </div>
    </div>

    <!-- Card baru -->
    <div class="col-sm-12 col-xl-6">
        <div class="bg-secondary rounded h-100 p-4" data-toggle="modal" data-target="#modalBelumMemilih">
            <h6 class="mb-4">Belum Memilih</h6>
            <p>Jumlah Akun yang Belum Memilih: <?php echo $jumlahBelumMemilih; ?></p>
            <!-- Ganti "isi tabel disini" sesuai dengan data yang ingin ditampilkan -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalBelumMemilihTable">
                Tampilkan Tabel
            </button>
        </div>
    </div>
</div>

<!-- Modal untuk Sudah Memilih -->
<div class="modal fade" id="modalMemilihTable" tabindex="-1" role="dialog" aria-labelledby="modalMemilihTableLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalMemilihTableLabel">Tabel Sudah Memilih</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Ganti "isi tabel disini" sesuai dengan data yang ingin ditampilkan -->
                <table class="table">
                    <!-- Isi tabel sesuai dengan data yang ingin ditampilkan -->
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal untuk Belum Memilih -->
<div class="modal fade" id="modalBelumMemilihTable" tabindex="-1" role="dialog" aria-labelledby="modalBelumMemilihTableLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalBelumMemilihTableLabel">Tabel Belum Memilih</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Ganti "isi tabel disini" sesuai dengan data yang ingin ditampilkan -->
                <table class="table">
                    <!-- Isi tabel sesuai dengan data yang ingin ditampilkan -->
                </table>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="../aset/js/main.js"></script>

<?php
$konten = ob_get_clean();

include '../ADMIN/body.php';
?>
