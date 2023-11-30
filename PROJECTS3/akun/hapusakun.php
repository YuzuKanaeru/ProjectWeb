<?php
session_start();
 
if (!isset($_SESSION['nama_lengkap'])) {
    header("Location: ../admin/login.php");
    exit(); // Terminate script execution after the redirect
}


require '../koneksi/koneksi.php';
	
$nis_nip = $_GET["nis_nip"];

if (hapusakun($nis_nip) > 0) {
         echo "
        <script>
             
                document.location.href = 'akun.php';
        </script>
        ";
 } else{
         echo "
        <script>
                alert('data gagal dihapus');
                document.location.href = 'akun.php';
        </script>
        ";
 }


?>
