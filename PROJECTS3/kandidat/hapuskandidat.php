<?php
session_start();
 
if (!isset($_SESSION['nama_lengkap'])) {
    header("Location: ../ADMIN/login.php");
    exit(); // Terminate script execution after the redirect
}


require '../koneksi/koneksi.php';
	
$id_kandidat = $_GET["id_kandidat"];

if (hapuskandidat($id_kandidat) > 0) {
         echo "
        <script>
             
                document.location.href = 'kandidat.php';
        </script>
        ";
 } else{
         echo "
        <script>
                alert('data gagal dihapus');
                document.location.href = 'kandidat.php';
        </script>
        ";
 }


?>
