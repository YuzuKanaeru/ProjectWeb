<?php
  require_once('connection.php');
  header ('Content-Type: application/json;charset=utf8');
  if(empty($_GET)){
    $query = mysqli_query($connection, "SELECT
    tb_kandidat.id_kandidat,
    tb_kandidat.visi,
    tb_kandidat.misi,
    tb_ketuaosis.nama_ketua,
    tb_wakilosis.nama_wakil,
    tb_kandidat.gambar
FROM
    tb_kandidat
    INNER JOIN tb_ketuaosis ON tb_kandidat.id_ketua = tb_ketuaosis.id_ketua
    INNER JOIN tb_wakilosis ON tb_kandidat.id_wakil = tb_wakilosis.id_wakil;");
  
    $result = array();
    while($row = mysqli_fetch_assoc($query)){
      $result[] = array(
        'id_kandidat' => $row['id_kandidat'],
        'visi'=> $row['visi'],
        'misi'=> $row['misi'],
        'nama_ketua'=> $row['nama_ketua'],
        'nama_wakil'=> $row['nama_wakil'],
        'gambar'=> $row['gambar']
      );
    }
    echo json_encode($result);
  } else {
    // Note: Always use prepared statements for security.
    $id_kandidat = mysqli_real_escape_string($connection, $_GET['id_kandidat']);
    $query = mysqli_query($connection, "SELECT
    tb_kandidat.id_kandidat,
    tb_kandidat.visi,
    tb_kandidat.misi,
    tb_ketuaosis.nama_ketua,
    tb_wakilosis.nama_wakil,
    tb_kandidat.gambar
FROM
    tb_kandidat
    INNER JOIN tb_ketuaosis ON tb_kandidat.id_ketua = tb_ketuaosis.id_ketua
    INNER JOIN tb_wakilosis ON tb_kandidat.id_wakil = tb_wakilosis.id_wakil WHERE id_kandidat='$id_kandidat'");
    
    $result = array();
    while($row = mysqli_fetch_assoc($query)){
      $result[] = array(
        'id_kandidat' => $row['id_kandidat'],
        'visi'=> $row['visi'],
        'misi'=> $row['misi'],
        'nama_ketua'=> $row['nama_ketua'],
        'nama_wakil'=> $row['nama_wakil'],
        'gambar'=> $row['gambar']
      );
    }
    echo json_encode($result);
  }

  $jsonString = json_encode($result, JSON_PRETTY_PRINT);

  file_put_contents('encode.json', $jsonString);

  
  mysqli_close($connection);

  
?>