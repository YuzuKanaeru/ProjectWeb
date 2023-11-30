<?php

session_start();
 
if (!isset($_SESSION['nama_lengkap'])) {
    header("Location: ../admin/login.php");
    exit(); // Terminate script execution after the redirect
}



require '../koneksi/koneksi.php';
$id = $_GET["id_posisi"];

$swa = query("SELECT * FROM tb_posisi WHERE id_posisi = $id")[0];

if (isset($_POST["submit"])) {
      if (ubahposisi($_POST) > 0) {
          echo "
          <script>
              alert('Data berhasil diubah');
              document.location.href = 'posisi.php';
          </script>
          ";
      } else {
          echo "
          <script>
              alert('Data gagal diubah');
              document.location.href = 'posisi.php';
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
    color: #fff;
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
			<h5 class="m-0 text-white">Edit Data Posisi</h5>
		</div>
        
     

		<div class="card-body bg-secondary">
			<div class="form text-white mt-3 row">
                
				<div class="form-group col-sm-6">
					<label for="formGroupExampleInput2">id_posisi</label>
					<input  type="text" class=" mt-1 mb-3 form-control" name="id_posisi" value="<?= $swa["id_posisi"] ?>" >
                </div>

				<div class="form-group col-sm-6">
					<label for="formGroupExampleInput">jenis_posisi</label>
					<input required type="text" class="mt-1 mb-3 form-control" name="jenis_posisi" value="<?= $swa["jenis_posisi"] ?>" >
                </div>

				<div class="dasd mt-2 mb-2">
					<br>
					<button type="submit" name="submit" class="btn dasd btn-success">Edit Data</button>
				</div>
			</form>
		</div>
	</div>
</div>


<div class="dasd">
<button type="submit" name="submit" class=" mb-5 mt-4 btn dasd btn-danger"><a class="text-white" href="posisi.php">Kembali</a> </button>
</div>

<br>
<br>
<br>




<?php
$konten= ob_get_clean();

include '../admin/body.php';

?>


