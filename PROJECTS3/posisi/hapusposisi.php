<?php
session_start();
 
if (!isset($_SESSION['nama_lengkap'])) {
    header("Location: ../ADMIN/login.php");
    exit(); // Terminate script execution after the redirect
}


require '../koneksi/koneksi.php';
	
$id = $_GET["id_pengguna"];

if (hapusposisi($id) > 0) {
         echo "
        <script>
             
                document.location.href = 'pengguna.php';
        </script>
        ";
 } else{
         echo "
        <script>
                alert('data gagal dihapus');
                document.location.href = 'pengguna.php';
        </script>
        ";
 }


?>
