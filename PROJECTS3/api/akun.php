<?php
  require_once('connection.php');
  header ('Content-Type: application/json;charset=utf8');
  if(empty($_GET)){
    $query = mysqli_query($connection, "SELECT * FROM tb_akun");
  
    $result = array();
    while($row = mysqli_fetch_assoc($query)){
      $result[] = array(
        'nis_nip' => $row['nis_nip'],
        'nama_lengkap'=> $row['nama_lengkap'],
        'jenis_kelamin'=> $row['jenis_kelamin'],
        'kelas'=> $row['kelas'],
        'id_posisi'=> $row['id_posisi'],
        'status'=> $row['status'],
        'pass'=> $row['pass'],
        'qr'=> $row['qr']
      );
    }
    echo json_encode($result);
  } else {
    // Note: Always use prepared statements for security.
    $username = mysqli_real_escape_string($connection, $_GET['nama_lengkap']);
    $query = mysqli_query($connection, "SELECT * FROM tb_akun WHERE nama_lengkap='$username'");
    
    $result = array();
    while($row = mysqli_fetch_assoc($query)){
      $result[] = array(
        'nis_nip' => $row['nis_nip'],
        'nama_lengkap'=> $row['nama_lengkap'],
        'jenis_kelamin'=> $row['jenis_kelamin'],
        'kelas'=> $row['kelas'],
        'id_posisi'=> $row['id_posisi'],
        'status'=> $row['status'],
        'pass'=> $row['pass'],
        'qr'=> $row['qr']
      );
    }
    echo json_encode($result);
  }

  $jsonString = json_encode($result, JSON_PRETTY_PRINT);

  file_put_contents('encode.json', $jsonString);

  
  mysqli_close($connection);

  
?>