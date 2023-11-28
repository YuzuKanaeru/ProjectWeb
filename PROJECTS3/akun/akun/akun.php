<?php
session_start();

if (!isset($_SESSION['nama_lengkap'])) {
    header("Location: ../admin/login.php");
    exit(); // Hentikan eksekusi skrip setelah pengalihan
}

ob_start(); // Mulai output buffering
?>

<?php
require '../KONEKSI/koneksi.php';
$query = query("SELECT * FROM tb_akun");
?>

<a href="tambahakun.php" type="button" class="btn btn-info fw-bold text-white mb-4">Tambah data</a>

<div class="col-sm-12">
    <div class="card-header py-3 bg-light">
        <h5 class="m-0 text-white">Data Pengguna</h5>
        <div class="col-sm-12 search-container-left">
        <input class="form-control text-right bg-dark border-0 mb-2" id="searchInput" placeholder="Cari...">
    </div>
    </div>
    <div class="bg-secondary rounded h-100 p-3">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Nis</th>
                    <th scope="col">Nama Lengkap</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">Kelas</th>
                    <th scope="col">Id Posisi</th>
                    <th scope="col">Status</th>
                    <th scope="col">Pasword</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $a = 1; ?>
                <?php foreach ($query as $getdata) : ?>
                    <tr>
                        <td><?= $getdata["nis_nip"]; ?></td>
                        <td><?= $getdata["nama_lengkap"]; ?></td>
                        <td><?= $getdata["jenis_kelamin"]; ?></td>
                        <td><?= $getdata["kelas"]; ?></td>
                        <td><?= $getdata["id_posisi"]; ?></td>
                        <td><?= $getdata["status"]; ?></td>
                        <td><?= $getdata["pass"]; ?></td>
                        <td>
                            <a class="btn btn-success text-white fw-bold" href="editakun.php?nis_nip=<?= $getdata["nis_nip"]; ?>">Edit</a>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapus<?= $getdata["nis_nip"]; ?>">Hapus</button>
                        </td>
                    </tr>
                    <?php $a++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php foreach ($query as $getdataa) : ?>

    <div class="modal fade" id="hapus<?= $getdataa["nis_nip"]; ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content bg-secondary">
                <div class="modal-body">
                    <h5 class="mt-1 mb-1 text-center">Apakah kamu ingin menghapus nama <?= $getdataa["nama_lengkap"]; ?> </h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-dismiss="modal">Tidak</button>
                    <a href="hapusakun.php?nis_nip=<?= $getdataa["nis_nip"]; ?>" class="btn btn-primary">Hapus</a>
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
$konten = ob_get_clean();

include '../ADMIN/body.php';
?>
