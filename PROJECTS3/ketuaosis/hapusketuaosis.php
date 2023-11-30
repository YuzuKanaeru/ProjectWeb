<?php
session_start();
 
if (!isset($_SESSION['nama_lengkap'])) {
    header("Location: ../admin/login.php");
    exit(); // Terminate script execution after the redirect
}


require '../koneksi/koneksi.php';
	
$id_ketua = $_GET["id_ketua"];

if (hapusketuaosis($id_ketua) > 0) {
         echo "
        <script>
             
                document.location.href = 'ketuaosis.php';
        </script>
        ";
 } else{
         echo "
        <script>
                alert('data gagal dihapus');
                document.location.href = 'ketuaosis.php';
        </script>
        ";
 }


?>
