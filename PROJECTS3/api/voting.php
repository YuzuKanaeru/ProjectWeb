<?php
require_once('connection.php');

header('Content-Type: application/json;charset=utf8');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $inputJSON = file_get_contents('php://input');
    $input = json_decode($inputJSON, TRUE);

    if (
        isset($input['nis_nip']) &&
        isset($input['id_kandidat'])
    ) {
        $nisnip = mysqli_real_escape_string($connection, $input['nis_nip']);
        $id_kandidat = mysqli_real_escape_string($connection, $input['id_kandidat']);

        $query = mysqli_query($connection, "INSERT INTO tb_voting (nis_nip, id_kandidat) 
                                            VALUES ($nisnip, '$id_kandidat')");

        if ($query) {
            $response = array('message' => 'Voting Berhasil');
            echo json_encode($response);
        } else {
            $response = array('message' => 'Voting Gagal');
            echo json_encode($response);
        }
    } else {
        $response = array('message' => 'Data tidak lengkap');
        echo json_encode($response);
    }
} else {
    $response = array('message' => 'Metode request tidak valid');
    echo json_encode($response);
}

mysqli_close($connection);


?>