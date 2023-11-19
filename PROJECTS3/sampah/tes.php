<!-- 

<?php

require '../KONEKSI/koneksi.php';

$id = $_GET["id"];

$swa = query("SELECT * FROM pengguna WHERE id_pengguna = $id")[0];

if (isset($_POST["submit"])) {

    if (ubah($_POST) > 0) {
        echo "
        <script>
            alert('Data berhasil diubah');
            document.location.href = 'pengguna.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Data gagal diubah');
            document.location.href = 'index.php';
        </script>
        ";
    }
}

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body class="bg-dark">


    <h1 class="text-white text-center mt-5 bg-5">EDIT DATA <?= $swa["nama_pengguna"] ?></h1>

    <div class="container">
        <form class="" action="" method="post">
            <div class="row">


            <div class="mb-3 col-6">
    <label for="exampleFormControlInput1" class="text-white form-label">ID Pengguna</label>
    <input type="text" readonly class="form-control" name="id_pengguna" value="<?= $swa["id_pengguna"] ?>" id="id_pengguna" placeholder="Masukkan ID Pengguna">
</div>

<div class="mb-3 col-6">
    <label for="exampleFormControlInput1" class="text-white form-label">Nama Pengguna</label>
    <input type="text" class="form-control" name="nama_pengguna" value="<?= $swa["nama_pengguna"] ?>" id="nama_pengguna" placeholder="Masukkan Nama Pengguna">
</div>

<div class="mb-3 col-6">
    <label for="exampleFormControlInput1" class="text-white form-label">Alamat</label>
    <input type="text" class="form-control" name="alamat" value="<?= $swa["alamat"] ?>" id="alamat" placeholder="Masukkan Alamat">
</div>

<div class="mb-3 col-6">
    <label for="exampleFormControlInput1" class="text-white form-label">No. Telp</label>
    <input type="text" class="form-control" name="no_tlp" value="<?= $swa["no_tlp"] ?>" id="no_tlp" placeholder="Masukkan No. Telp">
</div>

<div class="mb-3 col-6">
    <label for="exampleFormControlInput1" class="text-white form-label">Jenis Kelamin</label>
    <select name="jenis_kelamin" id="jenis_kelamin" class="form-select" aria-label="Jenis Kelamin">
        <option selected><?= $swa["jenis_kelamin"] ?></option>
        <option value="Laki-laki">Laki-laki</option>
        <option value="Perempuan">Perempuan</option>
    </select>
</div>


                <!-- Rest of your form inputs -->

            </div>

            <br><br>
            <div class="">
                <button type="submit" name="submit" class=" text-white btn btn-success">Simpan</button>
                <a style="float:right;" class="btn btnpp float-left btn-danger text-white" href="index.php">Kembali</a>
            </div>

    </div>



    </form>

    <footer style="  position: fixed;
  left: 0;
  bottom: 0;
  width: 100%;
  background-color: #56B0F6;
  padding:10px;
  color: white;
  text-align: center;">
        <!-- <h5>Yuwan.Era</h5> -->
    </footer>

    <script>
        // Fungsi untuk mengisi nilai input tanggal dengan tanggal dan waktu saat ini
        function isiNilaiTanggalOtomatis() {
            const inputTanggal = document.getElementById('tanggal');
            const sekarang = new Date();
            const tahun = sekarang.getFullYear();
            const bulan = String(sekarang.getMonth() + 1).padStart(2, '0'); // Tambah 1 karena Januari dimulai dari 0
            const tanggal = String(sekarang.getDate()).padStart(2, '0');
            const jam = String(sekarang.getHours()).padStart(2, '0');
            const menit = String(sekarang.getMinutes()).padStart(2, '0');
            const tanggalWaktu = `${tahun}-${bulan}-${tanggal}T${jam}:${menit}`;
            inputTanggal.value = tanggalWaktu;
        }

        // Panggil fungsi untuk mengisi nilai tanggal secara otomatis saat halaman dimuat
        isiNilaiTanggalOtomatis();
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>
 -->