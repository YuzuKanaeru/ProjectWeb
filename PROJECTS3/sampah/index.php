<?php
require '../KONEKSI/koneksi.php';
	$query=query("SELECT * FROM pengguna");
	// if ( isset($_POST["cari"]) ) {
	// 	$query = cari ($_POST["keyword"]);
	// }
//testKBSkjsb
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Belajar</title>
    <style>

    </style>
  </head>
  <body style="background-color: rgb(52, 53, 54);">
      <marquee behavior="scroll" direction="left" class="text-white">SI SELA BADMINTON :V</marquee>

    <h1 class="mt-5 text-white fw-bold text-center">TABEL PENGGUNA</h1>
        <div class="text-white fw-bold text-center" >
        <h6 id="tanggal-jam"></h6>
    </div>

<div class="container">
  
 
    <!-- <a class="btn mt-5 btn-primary text-white fw-bold" href="tambah.php">Tambah</a> -->
    <!-- <a class="btn mt-5 btn-primary text-white fw-bold" href="/home.html">Cek DB</a> -->
    <br> <br>
    <table class=" table table-bordered">
        <thead class="bg-dark text-white">
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Nama</th>
            <th scope="col">Alamat</th>
            <th scope="col">Nohp</th>
            <th scope="col">Jenis Kelamin</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>

        <!-- Buat Row +1 id -->
        <!-- <?php $a=1; ?> 
        <?php  $a++; ?> -->
<?php foreach ($query as $getdata ) :?>
        <tbody class="text-white">
          <tr>
            <td><?= $getdata["id_pengguna"]; ?></td>
            <td><?= $getdata["nama_pengguna"]; ?></td>
            <td><?= $getdata["alamat"]; ?></td>
            <td><?= $getdata["no_tlp"]; ?></td>
            <td><?= $getdata["jenis_kelamin"]; ?></td>
            <td>
            <!-- <a class="btn btn-success text-white fw-bold" href="edit.php? id=<?=$getdata["id"];?>">Edit</a>
            <a class="btn btn-danger text-white fw-bold" href="hapus.php? id=<?=$getdata["id"];?>" onclick="return confirm ('yakin ingin menghapus?');">hapus</a> -->
            <a class="btn btn-info text-white fw-bold" href="#" >Info</a>
            </td>
          </tr>
        </tbody>
       
<?php endforeach; ?>
      </table>

</div>
<footer style="  position: fixed;
  left: 0;
  bottom: 0;
  width: 100%;
  background-color: #56B0F6;
  padding:10px;
  color: white;
  text-align: center;">
		<h5>SISELA BADMINTON</h5>
	</footer>
	
	    <!-- <script>
        // Fungsi untuk menampilkan tanggal dan jam saat ini
        function tampilkanTanggalDanJam() {
            const sekarang = new Date();
            const tanggal = sekarang.toLocaleDateString();
            const jam = sekarang.toLocaleTimeString();
            const waktuSekarang = `Tanggal: ${tanggal}, Jam: ${jam}`;
            document.getElementById('tanggal-jam').textContent = waktuSekarang;
        }

        // Panggil fungsi untuk menampilkan tanggal dan jam saat halaman dimuat
        tampilkanTanggalDanJam();

        // Refresh tampilan setiap detik (opsional)
        setInterval(tampilkanTanggalDanJam, 1000);
    </script> -->
    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>