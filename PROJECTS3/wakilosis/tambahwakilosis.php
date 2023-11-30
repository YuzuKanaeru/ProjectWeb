
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
  if (tambahwakilosis ($_POST) > 0 ) {
    echo "
    <script>
        alert('data berhasil ditambahkan');
        document.location.href = 'wakilosis.php';
    </script>
    ";
  }else {
    echo "
      <script>
        alert('data gagal ditambahkan');
        document.location.href = 'tambahwakilosis.php';
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
			<h5 class="m-0 text-white">Tambah Wakil Osis</h5>
		</div>
        
		<div class="card-body bg-secondary">
			<div class="form mt-3 row">
                
				<!-- <div class="form-group col-sm-6">
					<label for="formGroupExampleInput2">ID Pengguna</label>
					<input  type="text" class=" mt-1 mb-3 form-control" name="id_pengguna" placeholder="Masukkan Pengguna" id="id_pengguna" readonly>
                </div> -->

				<div class="form-group col-sm-6">
					<label for="formGroupExampleInput">id wakil</label>
					<input required type="text" class="mt-1 mb-3 form-control" name="id_wakil" placeholder="Masukkan id wakil"  >
                </div>

                <div class="form-group col-sm-6">
					<label for="formGroupExampleInput">nis</label>
					<input required type="text" class="mt-1 mb-3 form-control" name="nis" placeholder="Masukkan Nis"  >
                </div>

                <div class="form-group col-sm-6">
					<label for="formGroupExampleInput">nama lengkap</label>
					<input required type="text" class="mt-1 mb-3 form-control" name="nama_wakil" placeholder="Masukkan nama lengkap"  >
                </div>

				<div class="form-group col-sm-6">
                <label for="formGroupExampleInput2 text-dark">Jenis Kelamin</label>
                <select required name="jenis_kelamin" id="jenis_kelamin" class="form-select mt-1 mb-3" aria-label="Default select example">
                <option value="Laki - Laki">Laki - Laki</option>
                <option value="Perempuan">Perempuan</option>
                </select>
                </div>

                <!-- <div class="form-group col-sm-6">
                    <label for="formGroupExampleInput text-dark">Pilih Posisi</label>
                        <select required name="varietas" class="form-select mt-1 mb-3" name="id_posisi" aria-label="Default select example">
                        
                        <?php
                        // Lakukan query untuk mendapatkan data varietas dari database
                        $vari_query = mysqli_query($koneksi, "SELECT id_posisi, jenis_posisi FROM tb_posisi"); //get tabel varietas

                        if ($vari_query) {
                            while ($getdataa = mysqli_fetch_assoc($vari_query)) {
                                echo "<option value='" . $getdataa['id_posisi'] . "'>" . $getdataa["jenis_posisi"] . "</option>";
                        }
                            } else {
                            echo "<option value=''>Poisi tidak tersedia</option>";
                        }

                        ?>
                    </select>
                    </div> -->

                <div class="form-group col-sm-6">
					<label for="formGroupExampleInput">kelas</label>
					<input required type="text" class="mt-1 mb-3 form-control" name="kelas" placeholder="Masukkan kelas"  >
                </div>

                <div class="form-group col-sm-6">
					<label for="formGroupExampleInput">nomor hp</label>
					<input type="number" class="mt-1 mb-3 form-control" name="nomor_hp" placeholder="Masukkan Nomor Hp"  >
                </div>

				<div class="dasd mt-2 mb-2">
					<br>
					<button type="submit" name="submit" class="btn dasd btn-success">Tambah Wakil Osis</button>
				</div>
			</form>
		</div>
	</div>
</div>


<div class="dasd">
<button type="submit" name="submit" class=" mb-5 mt-4 btn dasd btn-danger"><a class="text-white" href="wakilosis.php">Kembali</a> </button>
</div>

<br>
<br>
<br>





<?php
$konten= ob_get_clean();

include '../admin/body.php';

?>