<?php
// File: get_jumlah_belum_memilih.php

// Koneksi database
$dbHost = 'localhost';
$dbUsername = 'sivosism_db';
$dbPassword = '26Desember2003.';
$dbName = 'sivosism_db';
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Query SQL untuk mendapatkan jumlah yang belum memilih
$queryBelumMemilih = "SELECT COUNT(*) AS jumlah_belum_memilih FROM nama_tabel WHERE status != 'Sudah Voting'";
$resultBelumMemilih = $db->query($queryBelumMemilih);

$response = ['jumlah_belum_memilih' => 0];

if ($resultBelumMemilih->num_rows > 0) {
    $rowBelumMemilih = $resultBelumMemilih->fetch_assoc();
    $response['jumlah_belum_memilih'] = $rowBelumMemilih['jumlah_belum_memilih'];
}

// Mengembalikan response dalam format JSON
header('Content-Type: application/json');
echo json_encode($response);
?>
