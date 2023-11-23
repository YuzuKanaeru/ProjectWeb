<?php
session_start();
 
if (!isset($_SESSION['nama_lengkap'])) {
    header("Location: ../admin/login.php");
    exit(); // Terminate script execution after the redirect
}

?>


<?php
ob_start();
?>

<?php


require '../KONEKSI/koneksi.php';

$query = "SELECT k.id_kandidat, k.visi, k.misi, ketua.nama_ketua, wakil.nama_wakil
          FROM tb_kandidat k
          LEFT JOIN tb_ketuaosis ketua ON k.id_ketua = ketua.id_ketua
          LEFT JOIN tb_wakilosis wakil ON k.id_wakil = wakil.id_wakil";
$data = query($query);

?>


<a href="tambahkandidat.php" type="button" class="btn btn-info fw-bold text-white mb-4">Tambah Data</a>

<div class="d-flex text-center">
<?php foreach ($data as $item): ?>
<div class="card me-3" style="width: 20rem;">
  <img src="../aset/img/gambarosis.webp" class="card-img-top" alt="...">
  <div class="card-body justify-conten-center text-center">
    <h5 class="card-title text-dark"><?= $item["nama_ketua"]; ?></h5>
    <h6 class="card-title text-dark"><?= $item["nama_wakil"]; ?></h6>
    <br>
    <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
    <div class="d-flex text-center justify-content-center">
    <button data-toggle="modal" data-target="#visi<?=$item["id_kandidat"];?>" class="btn btkan btn-success me-2">Visi Misi</button>
    <a href="editkandidat.php?id_kandidat=<?= $item["id_kandidat"]; ?>" class="btn btn-info me-2">Edit </a>
    <button data-toggle="modal" data-target="#hapus<?=$item["id_kandidat"];?>" class="btn btn-danger">Hapus</button>

    </div>

  </div>
</div>
<?php endforeach; ?>

</div>



        
        <br>
        <br>
        <br>
        
        <!-- <div class="col-sm-12 ">
		<div class="card-header py-3 bg-light">
			<h5 class="m-0 text-white">Data Kandidat</h5>
		</div>
                        <div class="bg-secondary rounded h-100 p-3">
                            
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">Id Kandidat</th>
                                        <th scope="col">Visi</th>
                                        <th scope="col">Misi</th>
                                        <th scope="col">Nama Ketua</th>
                                        <th scope="col">Nama Wakil</th>
                                        <th scope="col">Aksi</th>
                                       


                                        
                                    </tr>
                                </thead>
                                <tbody>
                             
                                <?php foreach ($data as $item): ?>
                                <tr>
                                <td><?= $item["id_kandidat"]; ?></td>
                                <td><?= $item["visi"]; ?></td>
                                <td><?= $item["misi"]; ?></td>
                                <td><?= $item["nama_ketua"]; ?></td>
                                <td><?= $item["nama_wakil"]; ?></td>
                                <td>
                                    <a class="btn btn-success text-white fw-bold" href="editkandidat.php?id_kandidat=<?= $item["id_kandidat"]; ?>">Edit</a> -->

                                    <!-- <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapus<?=$item["id_kandidat"];?>" >Hapus</button> -->
                                                                                                                   
                                <!-- </td>
                                </tr>
                                 
                                    <?php endforeach; ?>
                                    
                                </tbody>
                            </table>
                       
                        </div>
                    </div>

                    <?php foreach ($data as $getdataa): ?>

    <div class="modal fade" id="hapus<?= $getdataa["id_kandidat"]; ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content bg-secondary">
                <div class="modal-body">
                    <h5 class="mt-1 mb-1 text-center">Apakah kamu ingin menghapus id kandidat <?= $getdataa["id_kandidat"]; ?> </h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-dismiss="modal">Tidak</button>
                    <a href="hapuskandidat.php?id_kandidat=<?= $getdataa["id_kandidat"]; ?>" class="btn btn-primary">Hapus</a>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?> -->


<!-- Visi Misi Modal -->
<?php foreach ($data as $getdataaa): ?>
<div class="modal fade" id="visi<?= $getdataaa["id_kandidat"]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog ">
            <div class="modal-content bg-secondary">
            <div class="modal-header">
        <h5 class="modal-title">Visi & Misi</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
                <div class="modal-body">
                <div class="d-flex">
                    <img src="../aset/img/gambarosis.webp" class="me-3" style="width: 150px; height: 150px;">
                    <div class="pp">
                    <h4>Visi</h4>
                <label for=""><?= $getdataaa["visi"]; ?></label>
                    <br>
                    <br>
                    <h4>Misi</h4>
                <label for=""><?= $getdataaa["misi"]; ?></label>
                    </div>
  
                </div>
                <div class="d-flex">
                    
                </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-dismiss="modal">Tidak</button>
                    <a href="hapuskandidat.php?id_kandidat=<?= $getdataa["id_kandidat"]; ?>" class="btn btn-primary">Hapus</a>
                </div>
            </div>
        </div>
</div>
<?php endforeach; ?>


                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
       

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

<script>
    const myModal = document.getElementById('myModal')
const myInput = document.getElementById('myInput')

myModal.addEventListener('shown.bs.modal', () => {
  myInput.focus()
})
</script>
<?php
$konten= ob_get_clean();

include '../ADMIN/body.php';

?>