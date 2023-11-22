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

<div class="text-center">
    <img src="https://i.giphy.com/media/QmH8OnsBQvC4yn8BnX/giphy.webp" width="300" height="300">
</div>

<h1 class="text-center mb-5 text-white">DASHBOARD</h1>

<marquee><h1 class="gradient-text text-center mb-5 mt-5">ALOOOOOOOOOOO :)</h1></marquee>

<?php
// Koneksi database
$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'vosis';

// Membuat koneksi
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

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

<div class="row">
    <div class="col-sm-12 col-xl-6">
        <div class="bg-secondary rounded h-100 p-4">
            <h6 class="mb-4">Doughnut Chart</h6>
            <canvas id="doughnut-chart"></canvas>
        </div>
    </div>

    <!-- Card baru -->
    <div class="col-sm-12 col-xl-6">
        <div class="bg-secondary rounded h-100 p-4">
            <h6 class="mb-4">Jumlah Voting</h6>

            <?php
            if ($infoResult->num_rows > 0) {
                while ($infoRow = $infoResult->fetch_assoc()) {
                    echo "<p>";
                    echo "Nomor Kandidat: " . $infoRow['id_kandidat'] . "<br>";
                    echo "Ketua: " . $infoRow['nama_ketua'] . "<br>";
                    echo "Wakil Ketua: " . $infoRow['nama_wakil'] . "<br>";
                    echo "Jumlah Voting: " . $infoRow['jumlah_voting'] . "<br>";
                    echo "</p>";
                }
            } else {
                echo "Tidak ada data kandidat.";
            }
            ?>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="../aset/lib/chart/chart.min.js"></script>
<script src="../aset/js/main.js"></script>

<script>
    (function ($) {
        "use strict";

        // Doughnut Chart
        var ctx6 = $("#doughnut-chart").get(0).getContext("2d");
        var myChart6 = new Chart(ctx6, {
            type: "doughnut",
            data: {
                labels: <?php echo json_encode($dataLabels); ?>,
                datasets: [{
                    backgroundColor: [
                        "rgba(118, 22, 22, .7)",
                        "rgba(235, 22, 22, .6)",
                        "rgba(235, 22, 22, .5)",
                        "rgba(235, 22, 22, .4)",
                        "rgba(235, 22, 22, .3)"
                    ],
                    data: <?php echo json_encode($dataValues); ?>
                }]
            },
            options: {
                responsive: true
            }
        });
    })(jQuery);
</script>

<?php
$konten = ob_get_clean();

include '../ADMIN/body.php';
?>