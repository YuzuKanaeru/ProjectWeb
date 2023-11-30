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
  if (tambahakun ($_POST) > 0 ) {
    echo "
    <script>
        alert('data berhasil ditambahkan');
        document.location.href = 'akun.php';
    </script>
    ";
  }else {
    echo "
      <script>
        alert('data gagal ditambahkan');
        document.location.href = 'tambahakun.php';
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
			<h5 class="m-0 text-white">Tambah Data Pengguna</h5>
		</div>
        
		<div class="card-body bg-secondary">
			<div class="form text-white mt-3 row">
                
				<!-- <div class="form-group col-sm-6">
					<label for="formGroupExampleInput2">ID Pengguna</label>
					<input  type="text" class=" mt-1 mb-3 form-control" name="id_pengguna" placeholder="Masukkan Pengguna" id="id_pengguna" readonly>
                </div> -->

				<div class="form-group col-sm-6">
					<label for="formGroupExampleInput">Nis</label>
					<input required type="text" class="mt-1 mb-3 form-control" name="nis_nip" placeholder="Masukkan Nis Atau Nip"  >
                </div>

                <div class="form-group col-sm-6">
					<label for="formGroupExampleInput">Nama lengkap</label>
					<input required type="text" class="mt-1 mb-3 form-control" name="nama_lengkap" placeholder="Masukkan Nama Lengkap"  >
                </div>

				<div class="form-group col-sm-6">
                <label for="formGroupExampleInput2 text-dark">Jenis Kelamin</label>
                <select required name="jenis_kelamin" id="jenis_kelamin" class="form-select mt-1 mb-3" aria-label="Default select example">
                <option value="Laki - Laki">Laki - Laki</option>
                <option value="Perempuan">Perempuan</option>
                </select>
                </div>

                <div class="form-group col-sm-6">
					<label for="formGroupExampleInput">Kelas</label>
					<input required type="text" class="mt-1 mb-3 form-control" name="kelas" placeholder="Masukkan Kelas"  >
                </div>

                <input hidden required type="text" class="mt-1 mb-3 form-control" name="status" value="Belum Voting">

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
					<label for="formGroupExampleInput">Id Posisi</label>
					<select required name="id_posisi" class="form-select form-control mt-1 mb-3 bg-dark" aria-label="Default select example">
          <option value="03">Murid</option>
          <option value="01">Admin</option>
    </select>
                </div>

                <!-- <div class="form-group col-sm-6">
					<label for="formGroupExampleInput">Status</label>
					<input type="text" class="mt-1 mb-3 form-control" name="status" placeholder="Masukkan Status"  >
                </div> -->

                <div class="form-group col-sm-6">
					<label for="formGroupExampleInput">Pasword</label>
					<input required type="text" class="mt-1 mb-3 form-control" name="pass" placeholder="Masukkan Pasword"  >
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
<button type="submit" name="submit" class=" mb-5 mt-4 btn dasd btn-danger"><a class="text-white" href="akun.php">Kembali</a> </button>
</div>

<br>
<br>
<br>





<?php
$konten= ob_get_clean();

include '../admin/body.php';

?>