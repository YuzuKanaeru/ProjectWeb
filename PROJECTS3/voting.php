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

$query = "SELECT
tb_akun.nama_lengkap,
MAX(tb_akun.kelas) AS kelas,
tb_kandidat.id_kandidat,
MAX(tb_voting.tgl_memilih) AS tgl_memilih
FROM tb_voting
JOIN tb_akun ON tb_voting.nis_nip = tb_akun.nis_nip
JOIN tb_kandidat ON tb_voting.id_kandidat = tb_kandidat.id_kandidat
GROUP BY tb_akun.nama_lengkap, tb_kandidat.id_kandidat
";

$data = query($query);

?>
        
        <a href="tambahvoting.php" type="button" class="btn btn-info fw-bold text-white mb-4">Tambah Voting</a>
        
        <div class="col-sm-12 ">
		<div class="card-header py-3 bg-light">
			<h5 class="m-0 text-white">Data Voting</h5>
		</div>
                        <div class="bg-secondary rounded h-100 p-3">
                            
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">Tanggal Memilih</th>
                                        <th scope="col">Nama Lengkap</th>
                                        <th scope="col">Kelas</th>
                                        <th scope="col">Kandidat Yang Dipilih</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                             
                                <?php foreach ($data as $item): ?>
                                <tr>
                                <td><?= $item["tgl_memilih"]; ?></td>
                                <td><?= $item["nama_lengkap"]; ?></td>
                                <td><?= $item["kelas"]; ?></td>
                                <td><?= $item["id_kandidat"]; ?></td>
                                
                                <!-- <td>
                                    <a class="btn btn-success text-white fw-bold" href="editkandidat.php?id_kandidat=<?= $item["id_kandidat"]; ?>">Edit</a>

                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapus<?=$item["id_kandidat"];?>" >Hapus</button>
                                                                                                                   
                                </td> -->
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