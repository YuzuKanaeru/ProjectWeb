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
require '../koneksi/koneksi.php';
$query=query("SELECT * FROM tb_posisi");

?>
        
        <a href="tambahposisi.php" type="button" class="btn btn-info fw-bold text-white mb-4">Tambah posisi</a>
        
        <div class="col-sm-12">
    <div class="card-header py-2 bg-light d-flex justify-content-between align-items-center">
        <h5 class="m-0 text-white">Data Posisi</h5>
        <div class="col-sm-2">
            <input class="form-control text-right bg-dark border-0 mb-1" id="searchInput" placeholder="Cari...">
        </div>
    </div>
    <div class="bg-secondary rounded h-100 p-4">
                            
                            <table class="table table-hover text-white">
                                <thead>
                                    <tr>
                                        <th scope="col">id_posisi</th>
                                        <th scope="col">jenis_posisi</th>
                                        <th scope="col">Aksi</th>
                                       


                                        
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($query as $getdata): ?>
                                <tr>
                                  
                                        <td><?= $getdata["id_posisi"]; ?></td>
                                        <td><?= $getdata["jenis_posisi"]; ?></td>
                                        <td>
                                        <a class="btn btn-success text-white fw-bold" href="editposisi.php?id_posisi=<?= $getdata["id_posisi"]; ?>">Edit</a>

                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapus<?=$getdata["id_posisi"];?>" >Hapus</button>
                                                                                                                   
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                    
                                </tbody>
                            </table>
                       
                        </div>
                    </div>

                    <?php foreach ($query as $getdataa): ?>
   
    <div class="modal fade" id="hapus<?= $getdataa["id_posisi"]; ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content bg-secondary">
                <div class="modal-body">
                    <h5 class="mt-1 mb-1 text-center">Apakah kamu ingin menghapus jenis posisi <?= $getdataa["jenis_posisi"]; ?> </h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-dismiss="modal">Tidak</button>
                    <a href="hapusposisi.php?id_posisi=<?= $getdataa["id_posisi"]; ?>" class="btn btn-primary">Hapus</a>
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

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function() {
        $("#searchInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("table tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>


<?php
$konten= ob_get_clean();

include '../admin/body.php';

?>