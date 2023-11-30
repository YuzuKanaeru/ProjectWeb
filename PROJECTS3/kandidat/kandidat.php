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

$query = "SELECT k.gambar, k.id_kandidat, k.visi, k.misi, ketua.nama_ketua, wakil.nama_wakil
          FROM tb_kandidat k
          LEFT JOIN tb_ketuaosis ketua ON k.id_ketua = ketua.id_ketua
          LEFT JOIN tb_wakilosis wakil ON k.id_wakil = wakil.id_wakil";
$data = query($query);

?>


<a href="tambahkandidat.php" type="button" class="btn btn-info fw-bold text-white mb-4">Tambah Kandidat</a>

<div class="d-flex flex-wrap justify-content-center">
    <?php foreach ($data as $item): ?>
        <div class="card mb-3 me-3" style="max-width: 20rem;">
            <img src="<?= $item["gambar"]; ?>" class="card-img-top" alt="tidak ada gambar" style="width: 100%; height: 250px; object-fit: cover;">
            <div class="card-body text-center">
                <h5 class="card-title text-dark"><?= $item["nama_ketua"]; ?></h5>
                <h6 class="card-title text-dark"><?= $item["nama_wakil"]; ?></h6>
                <div class="d-flex text-center justify-content-center mt-3">
                    <button data-toggle="modal" data-target="#visi<?= $item["id_kandidat"]; ?>" class="btn btkan btn-success me-2">Visi Misi</button>
                    <a href="editkandidat.php?id_kandidat=<?= $item["id_kandidat"]; ?>" class="btn btn-info me-2">Edit </a>
                    <button data-toggle="modal" data-target="#hapus<?= $item["id_kandidat"]; ?>" class="btn btn-danger">Hapus</button>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div> 
                                   
                            
                                <!-- <?php foreach ($data as $item): ?>  -->
                                <!-- <tr>
                                <td><?= $item["id_kandidat"]; ?></td>
                                <td><?= $item["visi"]; ?></td>
                                <td><?= $item["misi"]; ?></td>
                                <td><?= $item["nama_ketua"]; ?></td>
                                <td><?= $item["nama_wakil"]; ?></td>
                                <td> -->
                                    <!-- <a class="btn btn-success text-white fw-bold" href="editkandidat.php?id_kandidat=<?= $item["id_kandidat"]; ?>">Edit</a> 

                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapus<?=$item["id_kandidat"];?>" >Hapus</button> 
                                                                                                                   
                                </td>
                                </tr> -->
                                 
                                    <!-- <?php endforeach; ?> -->
                                    
                                <!-- </tbody>
                            </table>
                       
                        </div>
                    </div>   -->

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


<!-- Visi Misi Modal -->
<?php foreach ($data as $getdataaa): ?>
<div class="modal fade" id="visi<?= $getdataaa["id_kandidat"]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog ">
            <div class="modal-content bg-secondary">
            <div class="modal-header">
        <h5 class="modal-title">Visi & Misi</h5>
        <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
      </div>
                <div class="modal-body">
                <div class="d-flex">
                    <img src="<?= $getdataaa["gambar"]; ?>" class="me-3" style="width: 150px; height: 150px;">
                    <div class="pp">
                    <h4>Visi</h4>
                <textarea style="border: none;" for="" readonly class="bg-secondary text-white"><?= $getdataaa["visi"]; ?></textarea>
                    <br>
                    <br>
                    <h4>Misi</h4>
                    <textarea style="border: none;" for="" readonly class="bg-secondary text-white"><?= $getdataaa["misi"]; ?></textarea>
                    </div>
  
                </div>
                <div class="d-flex">
                    
                </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-dismiss="modal">Tutup</button>
                    <!-- <a href="hapuskandidat.php?id_kandidat=<?= $getdataa["id_kandidat"]; ?>" class="btn btn-primary">Hapus</a> -->
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

include '../admin/body.php';

?>