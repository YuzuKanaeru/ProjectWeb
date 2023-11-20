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

				<div class="form-group col-sm-6">
					<label for="formGroupExampleInput">Id Kandidat</label>
					<input required type="text" class="mt-1 mb-3 form-control" name="id_kandidat" placeholder="Masukkan id kandidat"  >
                </div>

                <div class="form-group col-sm-6">
					<label for="formGroupExampleInput">Visi</label>
					<input required type="text" class="mt-1 mb-3 form-control" name="visi" placeholder="Masukkan visi baru"  >
                </div>

                <div class="form-group col-sm-6">
					<label for="formGroupExampleInput">Misi</label>
					<input required type="text" class="mt-1 mb-3 form-control" name="misi" placeholder="Masukkan misi baru"  >
                </div>

                <div class="form-group col-sm-6">
					<label for="formGroupExampleInput">Id Ketua</label>
					<input type="text" class="mt-1 mb-3 form-control" name="id_ketua" placeholder="Masukkan id ketua"  >
                </div>

                <div class="form-group col-sm-6">
					<label for="formGroupExampleInput">Id Wakil</label>
					<input required type="text" class="mt-1 mb-3 form-control" name="id_wakil" placeholder="Masukkan id wakil"  >
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