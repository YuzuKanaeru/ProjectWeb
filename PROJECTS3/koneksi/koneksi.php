<?php 
$koneksi = mysqli_connect("localhost", "root", "", "vosis");

if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

function query($query)
{
    global $koneksi;
    $result = mysqli_query($koneksi, $query);
    $tempat = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $tempat[] = $row;
    }
    return $tempat;
}



//	// C-R-U-D / AKUN  //  //
function hapusakun($nis_nip){
    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM tb_akun WHERE `tb_akun`.`nis_nip` = '$nis_nip'");
    return mysqli_affected_rows($koneksi);
}


	function ubahakun($data){
		global $koneksi;
	
		$nisnip = $data["nis_nip"];
		$namalengkap = htmlspecialchars($data["nama_lengkap"]);
		$jeniskelamin = htmlspecialchars($data["jenis_kelamin"]);
		$kelas = htmlspecialchars($data["kelas"]);
		$idposisi = htmlspecialchars($data["id_posisi"]);
		$status = htmlspecialchars($data["status"]);
		$pass = htmlspecialchars($data["pass"]);

	
		$query = "UPDATE `tb_akun` SET 
		`nis_nip` = '$nisnip', 
		`nama_lengkap` = '$namalengkap', 
		`jenis_kelamin` = '$jeniskelamin',
		`kelas` = '$kelas',
		`id_posisi` = '$idposisi', 
		`status` = '$status', 
		`pass` = '$pass' 
		WHERE `tb_akun`.`nis_nip` = '$nisnip';";
	
		mysqli_query($koneksi, $query);
	
		return mysqli_affected_rows($koneksi);
	}



	function tambahakun($data){
		global $koneksi;
	
		$nisnip = htmlspecialchars($data["nis_nip"]);
		$namalengkap = htmlspecialchars($data["nama_lengkap"]);
		$jeniskelamin = htmlspecialchars($data["jenis_kelamin"]);
		$kelas = htmlspecialchars($data["kelas"]);
		$idposisi = htmlspecialchars($data["id_posisi"]);
		$status = htmlspecialchars($data["status"]);
		$pass = htmlspecialchars($data["pass"]);


		$query = "INSERT INTO `tb_akun` (`nis_nip`, `nama_lengkap`, `jenis_kelamin`, `kelas`, `id_posisi`, `status`, `pass`) 
		VALUES ('$nisnip', '$namalengkap', '$jeniskelamin', '$kelas', '$idposisi', '$status', '$pass');";
		
		mysqli_query($koneksi, $query);
	
		return mysqli_affected_rows($koneksi);
	}




//	// C-R-U-D / posisi  //  //
function tambahposisi($data){
	global $koneksi;

	$nama = htmlspecialchars($data["id_posisi"]);

		$query = "INSERT INTO tb_posisi ( `jenis_posisi`)
				VALUES
				('$nama')";

	mysqli_query($koneksi, $query);

	return mysqli_affected_rows($koneksi);
}

function hapusposisi($id){
    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM tb_posisi WHERE id_posisi=$id");
    return mysqli_affected_rows($koneksi);
}

function ubahposisi($data){
	global $koneksi;

	$id_posisi = $data["id_posisi"];
	$jenis_posisi = htmlspecialchars($data["jenis_posisi"]);


	$query = "UPDATE `tb_posisi` SET `jenis_posisi` = '$jenis_posisi' WHERE `tb_posisi`.`id_posisi` = '$id_posisi'";

	mysqli_query($koneksi, $query);

	return mysqli_affected_rows($koneksi);
}





//	// C-R-U-D / ketuaosis  //  //
function hapusketuaosis($id_ketua){
    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM tb_ketuaosis WHERE `tb_ketuaosis`.`id_ketua` = '$id_ketua'");
    return mysqli_affected_rows($koneksi);
}


	function ubahketuaosis($data){
		global $koneksi;
	
		$id_ketua = $data["id_ketua"];
		$nis = htmlspecialchars($data["nis"]);
		$nama_ketua = htmlspecialchars($data["nama_ketua"]);
		$jenis_kelamin = htmlspecialchars($data["jenis_kelamin"]);
		$kelas = htmlspecialchars($data["kelas"]);
		$nomor_hp = htmlspecialchars($data["nomor_hp"]);

	
		$query = "UPDATE `tb_ketuaosis` SET 
		`id_ketua` = '$id_ketua', 
		`nis` = '$nis', 
		`nama_ketua` = '$nama_ketua',
		`jenis_kelamin` = '$jenis_kelamin', 
		`kelas` = '$kelas', 
		`nomor_hp` = '$nomor_hp' 
		WHERE `tb_ketuaosis`.`id_ketua` = '$id_ketua';";
	
		mysqli_query($koneksi, $query);
	
		return mysqli_affected_rows($koneksi);
	}



	function tambahketuaosis($data){
		global $koneksi;
	
		$id_ketua = htmlspecialchars($data["id_ketua"]);
		$nis = htmlspecialchars($data["nis"]);
		$nama_ketua = htmlspecialchars($data["nama_ketua"]);
		$jenis_kelamin = htmlspecialchars($data["jenis_kelamin"]);
		$kelas = htmlspecialchars($data["kelas"]);
		$nomor_hp = htmlspecialchars($data["nomor_hp"]);


		$query = "INSERT INTO `tb_ketuaosis` (`id_ketua`, `nis`, `nama_ketua`, `jenis_kelamin`, `kelas`, `nomor_hp`) 
		VALUES ('$id_ketua', '$nis', '$nama_ketua', '$jenis_kelamin', '$kelas', '$nomor_hp');";
		
		mysqli_query($koneksi, $query);
	
		return mysqli_affected_rows($koneksi);
	}





	//	// C-R-U-D / wakilosis  //  //
function hapuswakilosis($id_wakil){
    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM tb_wakilosis WHERE `tb_wakilosis`.`id_wakil` = '$id_wakil'");
    return mysqli_affected_rows($koneksi);
}


	function ubahwakilosis($data){
		global $koneksi;
	
		$id_wakil = $data["id_wakil"];
		$nis = htmlspecialchars($data["nis"]);
		$nama_wakil = htmlspecialchars($data["nama_wakil"]);
		$jenis_kelamin = htmlspecialchars($data["jenis_kelamin"]);
		$kelas = htmlspecialchars($data["kelas"]);
		$nomor_hp = htmlspecialchars($data["nomor_hp"]);

	
		$query = "UPDATE `tb_wakilosis` SET 
		`id_wakil` = '$id_wakil', 
		`nis` = '$nis', 
		`nama_wakil` = '$nama_wakil',
		`jenis_kelamin` = '$jenis_kelamin', 
		`kelas` = '$kelas', 
		`nomor_hp` = '$nomor_hp' 
		WHERE `tb_wakilosis`.`id_wakil` = '$id_wakil';";
	
		mysqli_query($koneksi, $query);
	
		return mysqli_affected_rows($koneksi);
	}



	function tambahwakilosis($data){
		global $koneksi;
	
		$id_wakil = htmlspecialchars($data["id_wakil"]);
		$nis = htmlspecialchars($data["nis"]);
		$nama_wakil = htmlspecialchars($data["nama_wakil"]);
		$jenis_kelamin = htmlspecialchars($data["jenis_kelamin"]);
		$kelas = htmlspecialchars($data["kelas"]);
		$nomor_hp = htmlspecialchars($data["nomor_hp"]);


		$query = "INSERT INTO `tb_wakilosis` (`id_wakil`, `nis`, `nama_wakil`, `jenis_kelamin`, `kelas`, `nomor_hp`) 
		VALUES ('$id_wakil', '$nis', '$nama_wakil', '$jenis_kelamin', '$kelas', '$nomor_hp');";
		
		mysqli_query($koneksi, $query);
	
		return mysqli_affected_rows($koneksi);
	}



	//	// C-R-U-D / kandidat  //  //
function hapuskandidat($id_kandidat){
    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM tb_kandidat WHERE `tb_kandidat`.`id_kandidat` = '$id_kandidat'");
    return mysqli_affected_rows($koneksi);
}


	function ubahkandidat($data){
		global $koneksi;
	
		$id_kandidat = $data["id_kandidat"];
		$visi = htmlspecialchars($data["visi"]);
		$misi = htmlspecialchars($data["misi"]);
		$id_ketua = htmlspecialchars($data["id_ketua"]);
		$id_wakil = htmlspecialchars($data["id_wakil"]);

	
		$query = "UPDATE `tb_kandidat` SET 
		`id_kandidat` = '$id_kandidat', 
		`visi` = '$visi', 
		`misi` = '$misi',
		`id_ketua` = '$id_ketua', 
		`id_wakil` = '$id_wakil',  
		WHERE `tb_kandidat`.`id_kandidat` = '$id_kandidat';";
	
		mysqli_query($koneksi, $query);
	
		return mysqli_affected_rows($koneksi);
	}



	function tambahkandidat($data){
		global $koneksi;
	
		$id_kandidat = htmlspecialchars($data["id_kandidat"]);
		$visi = htmlspecialchars($data["visi"]);
		$misi = htmlspecialchars($data["misi"]);
		$id_ketua = htmlspecialchars($data["id_ketua"]);
		$id_wakil = htmlspecialchars($data["id_wakil"]);


		$query = "INSERT INTO `tb_kandidat` (`id_kandidat`, `visi`, `misi`, `id_ketua`, `id_wakil`) 
		VALUES ('$id_kandidat', '$visi', '$misi', '$id_ketua', '$id_wakil');";
		
		mysqli_query($koneksi, $query);
	
		return mysqli_affected_rows($koneksi);
	}
?>