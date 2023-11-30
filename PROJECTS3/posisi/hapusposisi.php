<?php
session_start();
 
if (!isset($_SESSION['nama_lengkap'])) {
    header("Location: ../admin/login.php");
    exit(); // Terminate script execution after the redirect
}


require '../koneksi/koneksi.php';
	
$id = $_GET["id_posisi"];

if (hapusposisi($id) > 0) {
         echo "
        <script>
             
                document.location.href = 'posisi.php';
        </script>
        ";
 } else{
         echo "
        <script>
                alert('data gagal dihapus');
                document.location.href = 'posisi.php';
        </script>
        ";
 }


?>
