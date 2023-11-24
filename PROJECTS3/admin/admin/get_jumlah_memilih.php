<?php
// File: get_jumlah_memilih.php

// Koneksi database
$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'vosis';
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Query SQL untuk mendapatkan jumlah yang sudah memilih
$querySudahMemilih = "SELECT COUNT(*) AS jumlah_memilih FROM nama_tabel WHERE status = 'Sudah Voting'";
$resultSudahMemilih = $db->query($querySudahMemilih);

$response = ['jumlah_memilih' => 0];

if ($resultSudahMemilih->num_rows > 0) {
    $rowSudahMemilih = $resultSudahMemilih->fetch_assoc();
    $response['jumlah_memilih'] = $rowSudahMemilih['jumlah_memilih'];
}

// Mengembalikan response dalam format JSON
header('Content-Type: application/json');
echo json_encode($response);
?>
