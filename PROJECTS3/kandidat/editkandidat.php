<?php

session_start();
 
if (!isset($_SESSION['nama_lengkap'])) {
    header("Location: ../ADMIN/login.php");
    exit(); // Terminate script execution after the redirect
}

require '../KONEKSI/koneksi.php';
$id_kandidat = $_GET["id_kandidat"];

$swa = query("SELECT * FROM tb_kandidat WHERE id_kandidat = '$id_kandidat'")[0];

if (isset($_POST["submit"])) {
      if (ubahkandidat($_POST) > 0) {
          echo "
          <script>
              alert('Data berhasil diubah');
              document.location.href = '.php';
          </script>
          ";
      } else {
          echo "
          <script>
              alert('Data gagal diubah');
              document.location.href = 'kandidat.php';
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
			<h5 class="m-0 text-white">Edit Data Kandidat</h5>
		</div>
        
     

		<div class="card-body bg-secondary">
			<div class="form mt-3 row">
                
				<div class="form-group col-sm-6">
					<label for="formGroupExampleInput2">id kandidat</label>
					<input  type="text" class=" mt-1 mb-3 form-control" name="id_kandidat" value="<?= $swa["id_kandidat"] ?>" id="id_kandidat" readonly>
                </div>

                <div class="form-group col-sm-6">
					<label for="formGroupExampleInput">visi</label>
					<input required type="text" class="mt-1 mb-3 form-control"  name="visi" value="<?= $swa["visi"] ?>" visi="visi">
                </div>

                <div class="form-group col-sm-6">
					<label for="formGroupExampleInput">misi</label>
					<input  type="text" class="mt-1 mb-3 form-control"  name="misi" value="<?= $swa["misi"] ?>" misi="misi">
                </div>

                <div class="form-group col-sm-6">
					<label for="formGroupExampleInput">id ketua</label>
					<input required type="text" class="mt-1 mb-3 form-control"  name="id_ketua" value="<?= $swa["id_ketua"] ?>" id="id_ketua">
                </div>

                <div class="form-group col-sm-6">
					<label for="formGroupExampleInput">id wakil</label>
					<input required type="text" class="mt-1 mb-3 form-control"  name="id_wakil" value="<?= $swa["id_wakil"] ?>" id="id_wakil">
                </div>



				<div class="dasd mt-2 mb-2">
					<br>
					<button type="submit" name="submit" class="btn dasd btn-success">Edit Kandidat</button>
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


