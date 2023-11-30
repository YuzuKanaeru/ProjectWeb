
<?php
ob_start();
?>


<?php
session_start();
 
if (!isset($_SESSION['nama_lengkap'])) {
    header("Location: ../admin/login.php");
    exit(); // Terminate script execution after the redirect
}

require '../koneksi/koneksi.php';


// ambil data 
if( isset($_POST["submit"]) ) {
		
  // hubungkan metod dan jika data > 0 / maka terisi succes paham!!
  if (tambahvoting ($_POST) > 0 ) {
    echo "
    <script>
        alert('data berhasil ditambahkan');
        document.location.href = 'voting.php';
    </script>
    ";
  }else {
    echo "
      <script>
        alert('data gagal ditambahkan');
        document.location.href = 'tambahvoting.php';
      </script>
    ";
  }		
}


?>



<style>
  .form-control{color: #fff;
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
			<h5 class="m-0 text-white">Tambah Data Voting</h5>
		</div>
        
		<div class="card-body bg-secondary">
			<div class="form text-white mt-3 row">
                
				<!-- <div class="form-group col-sm-6">
					<label for="formGroupExampleInput2">ID Pengguna</label>
					<input  type="text" class=" mt-1 mb-3 form-control" name="id_pengguna" placeholder="Masukkan Pengguna" id="id_pengguna" readonly>
                </div> -->

				<!-- <div class="form-group col-sm-6">
					<label for="formGroupExampleInput">Tanggal Memilih</label>
					<input required type="text" class="mt-1 mb-3 form-control" name="tgl_memilih" placeholder="Masukkan tanggal memilih" >
                </div> -->

                <div class="form-group col-sm-6">
					<label for="formGroupExampleInput">Nama Ketua</label>
					<select required name="nis_nip" class="form-select form-control mt-1 mb-3 bg-dark" aria-label="Default select example">
                 <?php
                $pere_query = mysqli_query($koneksi, "SELECT nis_nip, nama_lengkap FROM tb_akun where status = 'Belum Voting'"); // Ganti dengan nama kolom yang sesuai
                                  
                if ($pere_query) {
                  while ($getdataa = mysqli_fetch_assoc($pere_query)) {
                   echo "<option value='" . $getdataa["nis_nip"] . "'>" . $getdataa["nama_lengkap"] . "</option>";
                  }
                } else {
                   echo "<option value=''>Data lahan tidak tersedia</option>";
                  }
                  ?>
                  </select>
                </div>

                <div class="form-group col-sm-6">
					<label for="formGroupExampleInput">Id Kandidat</label>
					<select required name="id_kandidat" class="form-select form-control mt-1 mb-3 bg-dark" aria-label="Default select example">
                 <?php
                $pere_query = mysqli_query($koneksi, "SELECT id_kandidat, id_ketua FROM tb_kandidat"); // Ganti  dengan nama kolom yang sesuai
                                  
                if ($pere_query) {
                  while ($getdataa = mysqli_fetch_assoc($pere_query)) {
                   echo "<option value='" . $getdataa["id_kandidat"] . "'>" . $getdataa["id_ketua"] . "</option>";
                  }
                } else {
                   echo "<option value=''>Data lahan tidak tersedia</option>";
                  }
                  ?>
                  </select>
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
<button type="submit" name="submit" class=" mb-5 mt-4 btn dasd btn-danger"><a class="text-white" href="voting.php">Kembali</a> </button>
</div>

<br>
<br>
<br>





<?php
$konten= ob_get_clean();

include '../admin/body.php';

?>