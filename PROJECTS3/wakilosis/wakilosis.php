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
$query=query("SELECT * FROM tb_wakilosis");

?>
        
        <a href="tambahwakilosis.php" type="button" class="btn btn-info fw-bold text-white mb-4">Tambah Wakil</a>
        
        <div class="col-sm-12 ">
		<div class="card-header py-3 bg-light">
			<h5 class="m-0 text-white">Data Wakil Osis</h5>
		</div>
                        <div class="bg-secondary rounded h-100 p-3">
                            
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">id wakil</th>
                                        <th scope="col">nis</th>
                                        <th scope="col">nama lengkap</th>
                                        <th scope="col">jenis kelamin</th>
                                        <th scope="col">kelas</th>
                                        <th scope="col">no hp</th>
                                        <th scope="col">Aksi</th>
                                       


                                        
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $a=1; ?>
                                <?php foreach ($query as $getdata): ?>
                                <tr>
                               
                                        <td><?= $getdata["id_wakil"]; ?></td>
                                        <td><?= $getdata["nis"]; ?></td>
                                        <td><?= $getdata["nama_wakil"]; ?></td>
                                        <td><?= $getdata["jenis_kelamin"]; ?></td>
                                        <td><?= $getdata["kelas"]; ?></td>
                                        <td><?= $getdata["nomor_hp"]; ?></td>
                                        <td>
                                        <a class="btn btn-success text-white fw-bold" href="editwakilosis.php?id_wakil=<?= $getdata["id_wakil"]; ?>">Edit</a>

                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapus<?=$getdata["id_wakil"];?>" >Hapus</button>
                                                                                                                   
                                        </td>
                                    </tr>
                                    <?php  $a++; ?>
                                    <?php endforeach; ?>
                                    
                                </tbody>
                            </table>
                       
                        </div>
                    </div>

                    <?php foreach ($query as $getdataa): ?>

    <div class="modal fade" id="hapus<?= $getdataa["id_wakil"]; ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content bg-secondary">
                <div class="modal-body">
                    <h5 class="mt-1 mb-1 text-center">Apakah kamu ingin menghapus nama <?= $getdataa["nama_lengkap"]; ?> </h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-dismiss="modal">Tidak</button>
                    <a href="hapuswakilosis.php?id_wakil=<?= $getdataa["id_wakil"]; ?>" class="btn btn-primary">Hapus</a>
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