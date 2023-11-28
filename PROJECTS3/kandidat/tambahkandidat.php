<?php
ob_start();
?>


<?php
session_start();
 
if (!isset($_SESSION['nama_lengkap'])) {
    header("Location: ../ADMIN/login.php");
    exit(); // Terminate script execution after the redirect
}

require '../KONEKSI/koneksi.php';

$query = "SELECT id_kandidat FROM tb_kandidat ORDER BY id_kandidat DESC LIMIT 1";
$result = mysqli_query($koneksi, $query);

if ($result) {
    $row = mysqli_fetch_assoc($result);

    if ($row && isset($row['id_kandidat'])) {
        $lastCode = $row['id_kandidat'];

        $lastNumber = (int)substr($lastCode, -2);

        // Tambahkan 1 ke nomor urut dan format dengan nol di depan jika kurang dari 10 atau 100
        $newCode = str_pad($lastNumber + 1, 2, '0', STR_PAD_LEFT);
    } else {
        // Kode PPK awal jika tidak ada data
        $newCode = "01";
    }
} else {
    // Handle jika query tidak berhasil

    $newCode = "01";
}

// ambil data 
if( isset($_POST["submit"]) ) {
		
  // hubungkan metod dan jika data > 0 / maka terisi succes paham!!
  if (tambahkandidat ($_POST) > 0 ) {
    echo "
    <script>
        alert('data berhasil ditambahkan');
        document.location.href = 'kandidat.php';
    </script>
    ";
  }else {
    echo "
      <script>
        alert('data gagal ditambahkan');
        document.location.href = 'tambahkandidat.php';
      </script>
    ";
  }		
}


?>



<style>
  .form-control{
    border-radius:7px;
  }
  .ff{
    float:left;
  }
  .btn{
    border-radius:5px;

  }
  .dasd{
    float:right;
  }
  .card{
    border:none;
    border-radius:15px;
  }


  </style>

<form action="" method="POST" enctype="multipart/form-data">
	<div class=" card bg-secondary rounded mt-3 mb-3">
		<div class="card-header py-3 bg-light">
			<h5 class="m-0 text-white">Tambah Data Kandidat</h5>
		</div>
        
		<div class="card-body bg-secondary">
			<div class="form mt-3 row">
                
				<!-- <div class="form-group col-sm-6">
					<label for="formGroupExampleInput2">ID Pengguna</label>
					<input  type="text" class=" mt-1 mb-3 form-control" name="id_pengguna" placeholder="Masukkan Pengguna" id="id_pengguna" readonly>
                </div> -->

				<div class="form-group ">
					<label for="formGroupExampleInput">Id Kandidat</label>
					<input readonly type="text" class="mt-1 mb-3 form-control bg-dark" name="id_kandidat" value="<?php echo $newCode; ?>"  >
                </div>

                <div class="form-group col-sm-6">
					<label for="formGroupExampleInput">Id Ketua</label>
          <select required name="id_ketua" class="form-select form-control mt-1 mb-3 bg-dark" aria-label="Default select example">
                                  <?php
                                  $pere_query = mysqli_query($koneksi, "SELECT id_ketua, nama_ketua FROM tb_ketuaosis"); // Ganti 'nama_pengguna' dengan nama kolom yang sesuai
                                  
                                  if ($pere_query) {
                                      while ($getdataa = mysqli_fetch_assoc($pere_query)) {
                                          echo "<option value='" . $getdataa["id_ketua"] . "'>" . $getdataa["nama_ketua"] . "</option>";
                                      }
                                  } else {
                                      echo "<option value=''>Data lahan tidak tersedia</option>";
                                  }
                                  ?>
                                </select>
                </div>

                <div class="form-group col-sm-6">
					<label for="formGroupExampleInput">Id Wakil</label>
					<select required name="id_wakil" class="form-select form-control mt-1 mb-3 bg-dark" aria-label="Default select example">
                                  <?php
                                  $pere_query = mysqli_query($koneksi, "SELECT id_wakil, nama_wakil FROM tb_wakilosis"); // Ganti 'nama_pengguna' dengan nama kolom yang sesuai
                                  
                                  if ($pere_query) {
                                      while ($getdataa = mysqli_fetch_assoc($pere_query)) {
                                          echo "<option value='" . $getdataa["id_wakil"] . "'>" . $getdataa["nama_wakil"] . "</option>";
                                      }
                                  } else {
                                      echo "<option value=''>Data lahan tidak tersedia</option>";
                                  }
                                  ?>
                                </select>
                </div>

                <div class="form-group col-sm-6">
					<label for="formGroupExampleInput">Visi</label>
					<!-- <input required type="text" class="mt-1 mb-3 form-control"  > -->
          <textarea class="form-control" name="visi" placeholder="Masukkan visi baru" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>

                <div class="form-group col-sm-6">
					<label for="formGroupExampleInput">Misi</label>
					<textarea class="form-control" name="misi" placeholder="Masukkan Misi baru" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>

                <div class="form-group">
					<label for="formGroupExampleInput">Foto Kandidat</label>
					<input type="file" class="mt-1 mb-3 bg-dark form-control" name="gambar" placeholder="Pilih Gambar Kandidat"  >
                </div>

				<div class="dasd mt-2 mb-2">
					<br>
					<button type="submit" name="submit" class="btn dasd btn-success">Tambah Data</button>
				</div>
			</form>
		</div>
	</div>
</div>


<div class="dasd">
<button type="submit" name="submit" class=" mb-5 mt-4 btn dasd btn-danger"><a class="text-white" href="kandidat.php">Kembali</a> </button>
</div>

<br>
<br>
<br>





<?php
$konten= ob_get_clean();

include '../ADMIN/body.php';

?>