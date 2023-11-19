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
$query=query("SELECT * FROM tb_kandidat");

?>
        
        <a href="tambahkandidat.php" type="button" class="btn btn-info fw-bold text-white mb-4">Tambah Kandidat</a>
        
        <div class="col-sm-12 ">
		<div class="card-header py-3 bg-light">
			<h5 class="m-0 text-white">Data Kandidat</h5>
		</div>
                        <div class="bg-secondary rounded h-100 p-3">
                            
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">id_kandidat</th>
                                        <th scope="col">visi</th>
                                        <th scope="col">misi</th>
                                        <th scope="col">id_ketua</th>
                                        <th scope="col">id_wakil</th>
                                        <th scope="col">Aksi</th>
                                       


                                        
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $a=1; ?>
                                <?php foreach ($query as $getdata): ?>
                                <tr>
                               
                                        <td><?= $getdata["id_kandidat"]; ?></td>
                                        <td><?= $getdata["visi"]; ?></td>
                                        <td><?= $getdata["misi"]; ?></td>
                                        <td><?= $getdata["id_ketua"]; ?></td>
                                        <td><?= $getdata["id_wakil"]; ?></td>
                                        <td>
                                        <a class="btn btn-success text-white fw-bold" href="editkandidat.php?id_kandidat=<?= $getdata["id_kandidat"]; ?>">Edit</a>

                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapus<?=$getdata["id_kandidat"];?>" >Hapus</button>
                                                                                                                   
                                        </td>
                                    </tr>
                                    <?php  $a++; ?>
                                    <?php endforeach; ?>
                                    
                                </tbody>
                            </table>
                       
                        </div>
                    </div>

                    <?php foreach ($query as $getdataa): ?>

    <div class="modal fade" id="hapus<?= $getdataa["id_kandidat"]; ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content bg-secondary">
                <div class="modal-body">
                    <h5 class="mt-1 mb-1 text-center">Apakah kamu ingin menghapus nama <?= $getdataa["nama_lengkap"]; ?> </h5>
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


<?php
$konten= ob_get_clean();

include '../ADMIN/body.php';

?>