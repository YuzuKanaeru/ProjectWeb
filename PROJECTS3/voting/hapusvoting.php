<?php
session_start();
 
if (!isset($_SESSION['nama_lengkap'])) {
    header("Location: ../admin/login.php");
    exit(); // Terminate script execution after the redirect
}


require '../koneksi/koneksi.php';
	
$id = $_GET["nis_nip"];

if (hapusvoting($id) > 0) {
         echo "
        <script>
             
                document.location.href = 'voting.php';
        </script>
        ";
 } else{
         echo "
        <script>
                alert('data gagal dihapus');
                document.location.href = 'voting.php';
        </script>
        ";
 }


?>
