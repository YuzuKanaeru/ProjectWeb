<?php

session_start();
 
if (!isset($_SESSION['nama_lengkap'])) {
    header("Location: ../ADMIN/login.php");
    exit(); // Terminate script execution after the redirect
}



require '../KONEKSI/koneksi.php';
$id_wakil = $_GET["id_wakil"];

$swa = query("SELECT * FROM tb_wakilosis WHERE id_wakil = '$id_wakil'")[0];

if (isset($_POST["submit"])) {
      if (ubahketuaosis($_POST) > 0) {
          echo "
          <script>
              alert('Data berhasil diubah');
              document.location.href = 'wakilosis.php';
          </script>
          ";
      } else {
          echo "
          <script>
              alert('Data gagal diubah');
              document.location.href = 'wakilosis.php';
          </script>
          ";
      }
  }


?>



<?php
ob_start();
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
			<h5 class="m-0 text-white">Edit Data Wakil Osis</h5>
		</div>
        
     

		<div class="card-body bg-secondary">
			<div class="form mt-3 row">
                
				<div class="form-group col-sm-6">
					<label for="formGroupExampleInput2">id Wakil</label>
					<input  type="text" class=" mt-1 mb-3 form-control" name="id_wakil" value="<?= $swa["id_wakil"] ?>" id_wakil="id_wakil" readonly>
                </div>

                <div class="form-group col-sm-6">
					<label for="formGroupExampleInput">nis</label>
					<input required type="text" class="mt-1 mb-3 form-control"  name="nis" value="<?= $swa["nis"] ?>" nis="nis">
                </div>

                <div class="form-group col-sm-6">
					<label for="formGroupExampleInput">nama lengkap</label>
					<input required type="text" class="mt-1 mb-3 form-control"  name="nama_lengkap" value="<?= $swa["nama_lengkap"] ?>" nama_lengkap="nama_lengkap">
                </div>

                <div class="form-group col-sm-6">
    <label for="formGroupExampleInput2 text-dark">Jenis Kelamin</label>
    <select required name="jenis_kelamin" id="jenis_kelamin" class="form-select mt-1 mb-3" aria-label="Default select example">
        <option selected value="<?= $swa["jenis_kelamin"] ?>"><?= $swa["jenis_kelamin"] ?></option>
        <option value="Laki - Laki">Laki - Laki</option>
        <option value="Perempuan">Perempuan</option>
    </select>
</div>

<div class="form-group col-sm-6">
					<label for="formGroupExampleInput">kelas</label>
					<input required type="text" class="mt-1 mb-3 form-control"  name="kelas" value="<?= $swa["kelas"] ?>" kelas="kelas">
                </div>

                <div class="form-group col-sm-6">
					<label for="formGroupExampleInput">nomor hp</label>
					<input required type="text" class="mt-1 mb-3 form-control"  name="nomor_hp" value="<?= $swa["nomor_hp"] ?>" nomor_hp="nomor_hp">
                </div>


<!-- <div class="form-group col-sm-6">
                    <label for="formGroupExampleInput text-dark">nama posisi</label>
                        <select name="varietas" class="form-select mt-1 mb-3" name="vari_id" aria-label="Default select example">
                        <option required value="<?= $swa["id_posisi"] ?>"><?= $swa["id_posisi"] ?></option>
                        <?php
                        // Lakukan query untuk mendapatkan data varietas dari database
                        $vari_query = mysqli_query($koneksi, "SELECT id_posisi, jenis_posisi FROM tb_posisi"); //get tabel varietas

                        if ($vari_query) {
                            while ($getdataa = mysqli_fetch_assoc($vari_query)) {
                                echo "<option value='" . $getdataa["id_posisi"] . "'>" . $getdataa["jenis_posisi"] . "</option>";
                        }
                            } else {
                            echo "<option value=''>Data varietas tidak tersedia</option>";
                        }

                        ?>
                    </select>
                    </div> -->


<!-- <div class="form-group col-sm-6">
					<label for="formGroupExampleInput">id posisi</label>
					<input required type="text" class="mt-1 mb-3 form-control"  name="id_posisi" value="<?= $swa["id_posisi"] ?>" idposisi="id_posisi">
                </div> -->



				<div class="dasd mt-2 mb-2">
					<br>
					<button type="submit" name="submit" class="btn dasd btn-success">Edit Waki; Osis</button>
				</div>
			</form>
		</div>
	</div>
</div>


<div class="dasd">
<button type="submit" name="submit" class=" mb-5 mt-4 btn dasd btn-danger"><a class="text-white" href="ketuaosis.php">Kembali</a> </button>
</div>

<br>
<br>
<br>




<?php
$konten= ob_get_clean();

include '../ADMIN/body.php';

?>


