<?php
session_start();
 
if (!isset($_SESSION['nama_lengkap'])) {
    header("Location: ../admin/login.php");
    exit(); // Terminate script execution after the redirect
}


require '../koneksi/koneksi.php';
	
$id_wakil = $_GET["id_wakil"];

if (hapuswakilosis($id_wakil) > 0) {
         echo "
        <script>
             
                document.location.href = 'wakilosis.php';
        </script>
        ";
 } else{
         echo "
        <script>
                alert('data gagal dihapus');
                document.location.href = 'wakilosis.php';
        </script>
        ";
 }


?>
