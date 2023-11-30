<?php
if (isset($_POST['download'])) {
    // Koneksi ke database (ganti dengan informasi koneksi Anda)
    $host = 'localhost';
    $username = 'sivosism_db';
    $password = '26Desember2003.';
    $database = 'sivosism_db';
    $koneksi = mysqli_connect($host, $username, $password, $database);

    // Periksa koneksi
    if (!$koneksi) {
        die("Koneksi gagal: " . mysqli_connect_error());
    }

    // Nama kelas yang akan diambil QR-nya
    $kelas = $_POST['kelas'];

    // Query untuk mengambil data dari database
    $query = "SELECT nama_lengkap FROM tb_akun WHERE kelas = '$kelas'";
    $result = mysqli_query($koneksi, $query);

    // Directory tempat menyimpan file ZIP
    $zipFile = '../aset/zip/'.$kelas.'_qrcodes.zip';

    // Buat objek ZipArchive
    $zip = new ZipArchive();

    // Membuka file ZIP untuk ditulis
    if ($zip->open($zipFile, ZipArchive::CREATE | ZipArchive::OVERWRITE) === TRUE) {
        // Loop through the results and add each image to the ZIP
        while ($row = mysqli_fetch_assoc($result)) {
            $namaLengkap = $row['nama_lengkap'];

            // Construct the image URL based on the provided format
            $imageUrl = "../aset/gambarqr/{$namaLengkap} {$kelas}.png";

            // Check if the file exists before adding to the ZIP
            if (file_exists($imageUrl)) {
                // Add the image to the ZIP with a new name
                $zip->addFile($imageUrl, $namaLengkap.'_qrcode.png');
            } else {
                echo "File not found: $imageUrl<br>";
            }
        }

        // Tutup file ZIP
        $zip->close();

        // Set headers for force download
        header('Content-Type: application/zip');
        header('Content-disposition: attachment; filename='.$kelas.'_qrcodes.zip');
        header('Content-Length: ' . filesize($zipFile));
        readfile($zipFile);

        // Hapus file ZIP setelah di-download
        unlink($zipFile);

        // Tutup koneksi database
        mysqli_close($koneksi);
    } else {
        echo 'Gagal membuat file ZIP';
    }
}
?>